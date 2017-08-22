<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string(dbconnect(), $theValue) : mysqli_escape_string(dbconnect(), $theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form-update")) {

  $colname_Recordset1_stu = "-1";
  if (isset($_GET['s_id'])) {
  $prm = $_GET['s_id'];
  $prmii = $_GET['s_id'];
  }

  $updateSQL_stu = sprintf("UPDATE student_info AS stu
    SET stu.s_fname=%s, stu.s_lname=%s, stu.thai_fname=%s, stu.thai_lname=%s, stu.s_dob=%s, stu.remark=%s, stu.origin_id=%s, stu.type_id=%s, stu.status_id=%s, stu.ref_id=%s, stu.national_id=%s, stu.title_title_id=%s 
    WHERE stu.s_id=%s",
                       GetSQLValueString($_POST['s_fname'], "text"),
                       GetSQLValueString($_POST['s_lname'], "text"),
                       GetSQLValueString($_POST['thai_fname'], "text"),
                       GetSQLValueString($_POST['thai_lname'], "text"),
                       GetSQLValueString($_POST['s_dob'], "date"),
                       GetSQLValueString($_POST['remark'], "text"),
                       GetSQLValueString($_POST['origin_id'], "int"),
                       GetSQLValueString($_POST['type_id'], "int"),
                       GetSQLValueString($_POST['status_id'], "int"),
                       GetSQLValueString($_POST['ref_id'], "int"),
                       GetSQLValueString($_POST['national_id'], "int"),
                       GetSQLValueString($_POST['title_title_id'], "int"),
                       GetSQLValueString($_POST['s_id'], "int"));

    $updateSQL_scd = sprintf("UPDATE student_contact_details 
    SET contact_no=%s, email_adress=%s
    WHERE scd_s_id=$prm",
                 GetSQLValueString($_POST['contact_no'], "text"),
                 GetSQLValueString($_POST['email_adress'], "text"),
                 GetSQLValueString($_POST['contact_id'], "int"),
                 GetSQLValueString($_POST['scd_s_id'], "int"));

    $updateSQL_sec = sprintf("UPDATE student_emergency_contact AS sec
      INNER JOIN student_contact_details AS scd ON scd.contact_id = sec.contact_id
      SET emc_fname=%s, emc_lname=%s, emc_relation=%s, emc_contact=%s
      WHERE scd.scd_s_id=$prm",
                  GetSQLValueString($_POST['emc_fname'], "text"),
                  GetSQLValueString($_POST['emc_lname'], "text"),
                  GetSQLValueString($_POST['emc_relation'], "text"),
                  GetSQLValueString($_POST['emc_contact'], "text"),
                  GetSQLValueString($_POST['emc_id'], "int"),
                  GetSQLValueString($_POST['contact_id'], "int"));

    $updateSQL_sad = sprintf("UPDATE student_address 
      INNER JOIN student_info ON student_info.s_id=student_address.s_id
      SET no=%s, sub_district=%s, province_name=%s, place_name=%s, district=%s, zip_code=%s, road_name=%s, city=%s, country_id=%s
      WHERE student_address.s_id=$prm",
                 GetSQLValueString($_POST['no'], "text"),
                 GetSQLValueString($_POST['sub_district'], "text"),
                 GetSQLValueString($_POST['province_name'], "text"),
                 GetSQLValueString($_POST['place_name'], "text"),
                 GetSQLValueString($_POST['district'], "text"),
                 GetSQLValueString($_POST['zip_code'], "int"),
                 GetSQLValueString($_POST['road_name'], "text"),
                 GetSQLValueString($_POST['city'], "text"),
                 GetSQLValueString($_POST['country_id'], "int"),
                 GetSQLValueString($_POST['address_Id'], "int"),
                 GetSQLValueString($_POST['s_id'], "int")); 

    $updateSQL_sre = sprintf("UPDATE student_relationship
      INNER JOIN student_info ON student_info.s_id=student_relationship.s_id
      SET relation_type=%s, relation_fname=%s, relation_lname=%s, relation_occupation=%s, relation_contact=%s
      WHERE student_relationship.s_id=$prm",
                 GetSQLValueString($_POST['relation_type'], "text"),
                 GetSQLValueString($_POST['relation_fname'], "text"),
                 GetSQLValueString($_POST['relation_lname'], "text"),
                 GetSQLValueString($_POST['relation_occupation'], "text"),
                 GetSQLValueString($_POST['relation_contact'], "text"),
                 GetSQLValueString($_POST['relation_id'], "int"),
                 GetSQLValueString($_POST['s_id'], "int")); 

    $updateSQL_edu = sprintf("UPDATE education_info
      LEFT JOIN major_info ON major_info.major_id = education_info.major_id
      LEFT JOIN degree_info ON degree_info.degree_id = education_info.degree_id
      LEFT JOIN institute ON institute.ins_id = education_info.edu_institute
      INNER JOIN student_info ON student_info.s_id=education_info.s_id
      SET education_info.edu_institute=%s, education_info.major_id=%s, education_info.degree_id=%s
      WHERE education_info.s_id=$prm ",
                 GetSQLValueString($_POST['edu_institute'], "int"),
                 GetSQLValueString($_POST['major_id'], "int"),
                 GetSQLValueString($_POST['degree_id'], "int"),
                 GetSQLValueString($_POST['education_name'], "text"),
                 GetSQLValueString($_POST['education_id'], "int"),
                 GetSQLValueString($_POST['s_id'], "int"));  
                     
    $updateSQL_edb = sprintf("UPDATE education_blackgrounf 
      LEFT JOIN degree_info ON degree_info.degree_id = education_blackgrounf.bg_degree
      LEFT JOIN student_info ON student_info.s_id = education_blackgrounf.student_info_s_id
      SET bg_durationS=%s, bg_durationE=%s, bg_degree=%s, bg_major=%s, bg_institute_name=%s, bg_gpax=%s
      WHERE education_blackgrounf.student_info_s_id = $prm",
                 GetSQLValueString($_POST['bg_durationS'], "date"),
                 GetSQLValueString($_POST['bg_durationE'], "date"),
                 GetSQLValueString($_POST['bg_degree'], "int"),
                 GetSQLValueString($_POST['bg_major'], "text"),
                 GetSQLValueString($_POST['bg_institute_name'], "text"),
                 GetSQLValueString($_POST['bg_gpax'], "text"),
                 GetSQLValueString($_POST['bg_id'], "int"),
                 GetSQLValueString($_POST['student_info_s_id'], "int")); 


    $updateSQL_wex = sprintf("UPDATE work_experience  
      LEFT JOIN student_info ON student_info.s_id=work_experience.student_info_s_id
      SET wex_dateS=%s, wex_dateE=%s, wex_organ=%s, wex_detail=%s
      WHERE work_experience.student_info_s_id = $prm",
                       GetSQLValueString($_POST['wex_dateS'], "date"),
                       GetSQLValueString($_POST['wex_dateE'], "date"),
                       GetSQLValueString($_POST['wex_organ'], "text"),
                       GetSQLValueString($_POST['wex_detail'], "text"),
                       GetSQLValueString($_POST['wex_id'], "int"),
                       GetSQLValueString($_POST['student_info_s_id'], "int"));


    $updateSQL_ext = sprintf("UPDATE extracurricular_act  
      LEFT JOIN student_info ON student_info.s_id=extracurricular_act.student_info_s_id
      SET ext_dateS=%s, ext_dateE=%s, exact_name=%s, exact_detail=%s
      WHERE extracurricular_act.student_info_s_id = $prm",
                       GetSQLValueString($_POST['ext_dateS'], "date"),
                       GetSQLValueString($_POST['ext_dateE'], "date"),
                       GetSQLValueString($_POST['exact_name'], "text"),
                       GetSQLValueString($_POST['exact_detail'], "text"),
                       GetSQLValueString($_POST['exact_id'], "int"),
                       GetSQLValueString($_POST['student_info_s_id'], "int"));


    $updateSQL_hob = sprintf("UPDATE hobby_info  
      LEFT JOIN student_info ON student_info.s_id=hobby_info.s_id
      SET hobby_desc=%s
      WHERE hobby_info.s_id = $prm",
                       GetSQLValueString($_POST['hobby_desc'], "text"),
                       GetSQLValueString($_POST['hobby_id'], "int"),
                       GetSQLValueString($_POST['s_id'], "int"));


/*
    $updateSQL_lhl = sprintf("UPDATE lgInfo_has_lg  
      LEFT JOIN language_info ON language_info.lg_info_id = lgInfo_has_lg.lgInfo_id
      INNER JOIN student_info ON student_info.s_id = language_info.s_id
      SET lgInfo_has_lg.lg_id=%s
      WHERE student_info.s_id = $prm",
                       GetSQLValueString($_POST['lg_id'], "int")); 

    $updateSQL_lhv = sprintf("UPDATE lgInfo_has_lv  
      LEFT JOIN language_info ON language_info.lg_info_id = lgInfo_has_lv.lgINfo_has_lv_id
      INNER JOIN student_info ON student_info.s_id = language_info.s_id
      SET lgInfo_has_lv.lv_id=%s
      WHERE student_info.s_id = $prm",
                       GetSQLValueString($_POST['lv_id'], "int"),
                       GetSQLValueString($_POST['lgINfo_has_lv_id'], "int"),
                       GetSQLValueString($_POST['lgInfo_id'], "int")); */



    $updateSQL_tni = sprintf("UPDATE trainee_info AS tni
      LEFT JOIN department_info ON department_info.dep_id = tni.dep_id
      LEFT JOIN location ON location.location_id = tni.location_id
      LEFT JOIN plant_info ON plant_info.plant_id = tni.plant_id
      LEFT JOIN trainee_account ON trainee_account.trainee_acc_id = tni.tac_acc_id 
      LEFT JOIN trainee_job ON trainee_job.job_id = tni.job_id
      LEFT JOIN trainee_transportation ON trainee_transportation.transportation_id = tni.transportation_id
      INNER JOIN student_info ON student_info.s_id = tni.s_id
      SET tni.trainee_code = %s, tni.location_id = %s, tni.plant_id = %s, tni.dep_id = %s, tni.transportation_id = %s
      WHERE student_info.s_id = $prm",
              GetSQLValueString($_POST['trainee_code'],"text"),
              GetSQLValueString($_POST['location_id'],"int"),
              GetSQLValueString($_POST['plant_id'],"int"),
              GetSQLValueString($_POST['dep_id'],"int"),
              GetSQLValueString($_POST['transportation_id'],"int"),
              GetSQLValueString($_POST['tac_acc_id'],"int"),
              GetSQLValueString($_POST['job_id'],"int"),
              GetSQLValueString($_POST['s_id'],"int"),
              GetSQLValueString($_POST['trainee_id'],"text"));


    $updateSQL_tac = sprintf("UPDATE trainee_account
      INNER JOIN trainee_info ON trainee_info.tac_acc_id = trainee_account.trainee_acc_id
      INNER JOIN student_info ON student_info.s_id = trainee_info.s_id
      SET keycard_id=%s, trainee_email=%s
      WHERE student_info.s_id = $prm",
                       GetSQLValueString($_POST['keycard_id'], "text"),
                       GetSQLValueString($_POST['trainee_email'], "text"),
                       GetSQLValueString($_POST['account_name'], "text"),
                       GetSQLValueString($_POST['trainee_acc_id'], "int"));

    $updateSQL_bac = sprintf("UPDATE bank_acc_info
            LEFT JOIN bank_has_banch ON  bank_has_banch.bnk_has_bch_id = bank_acc_info.bnk_has_id
            LEFT JOIN bank ON bank.bnk_id = bank_has_banch.bnk_id 
            LEFT JOIN bnk_banch ON bnk_banch.bch_id = bank_has_banch.bch_id
            INNER JOIN trainee_info ON trainee_info.trainee_id = bank_acc_info.trainee_id
            INNER JOIN student_info ON student_info.s_id = trainee_info.s_id
            SET bank_acc_info.bac_no=%s, bank_acc_info.bac_name=%s, bank_has_banch.bnk_id=%s, bank_has_banch.bch_id=%s
            WHERE student_info.s_id = $prm",
                       GetSQLValueString($_POST['bac_no'], "int"),
                       GetSQLValueString($_POST['bac_name'], "text"),
                       GetSQLValueString($_POST['bnk_id'], "int"),
                       GetSQLValueString($_POST['bch_id'], "int"));

    $updateSQL_thp = sprintf("UPDATE trainee_has_project
      LEFT JOIN trainee_project ON trainee_project.project_id = trainee_has_project.project_id
      INNER JOIN trainee_info ON trainee_info.trainee_id = trainee_has_project.trainee_id
      INNER JOIN student_info ON student_info.s_id = trainee_info.s_id
      SET trainee_project.project_name=%s, trainee_project.project_detail=%s
      WHERE student_info.s_id = $prm",
                       GetSQLValueString($_POST['project_name'], "text"),
                       GetSQLValueString($_POST['project_detail'], "text"));

   $updateSQL_shs = sprintf("UPDATE supervisor_info_has_student_info AS shs
      RIGHT JOIN student_info ON student_info.s_id = shs.student_info_s_id
      SET shs.supervisor_info_spv_id=%s
      WHERE student_info.s_id = $prm",
                       GetSQLValueString($_POST['supervisor_info_spv_id'], "int"));

    $updateSQL_lgi = sprintf("UPDATE language_info  
      INNER JOIN student_info ON student_info.s_id = language_info.s_id
      SET language_info.lg_id=%s, language_info.lv_id=%s
      WHERE student_info.s_id = $prm",
                       GetSQLValueString($_POST['lg_id'], "int"),
                       GetSQLValueString($_POST['lv_id'], "int"),
                       GetSQLValueString($_POST['lg_info_id'], "int"),
                       GetSQLValueString($_POST['s_id'], "int"));



    $updateSQL_app = sprintf("UPDATE application  
      INNER JOIN student_info ON student_info.s_id = application.s_id
      SET application_dateS=%s, application_dateE=%s
      WHERE student_info.s_id = $prm",
                       GetSQLValueString($_POST['application_dateS'], "date"),
                       GetSQLValueString($_POST['application_dateE'], "date"),
                       GetSQLValueString($_POST['application_id'], "int"),
                       GetSQLValueString($_POST['s_id'], "int")); 




    $updateSQL_eva = sprintf("UPDATE evaluation 
      INNER JOIN student_info ON student_info.s_id = evaluation.stu_id
      SET eva_onlineTest=%s, eva_leonard=%s, eva_preTest=%s, eva_postTest=%s, eva_finalPre_score=%s, eva_finalPre_comment=%s
      WHERE student_info.s_id = $prm",
                       GetSQLValueString($_POST['eva_onlineTest'], "int"),
                       GetSQLValueString($_POST['eva_leonard'], "int"),
                       GetSQLValueString($_POST['eva_preTest'], "int"),
                       GetSQLValueString($_POST['eva_postTest'], "int"),
                       GetSQLValueString($_POST['eva_finalPre_score'], "int"),
                       GetSQLValueString($_POST['eva_finalPre_comment'], "text"),
                       GetSQLValueString($_POST['eva_id'], "int"),
                       GetSQLValueString($_POST['stu_id'], "int")); 



  mysqli_select_db($MyConnect, $database_MyConnect);
  $Result1_stu = mysqli_query($MyConnect, $updateSQL_stu) or die(mysqli_error($MyConnect));
  $Result1_scd = mysqli_query($MyConnect, $updateSQL_scd) or die(mysqli_error($MyConnect));
  $Result1_sec = mysqli_query($MyConnect, $updateSQL_sec) or die(mysqli_error());
  $Result1_sad = mysqli_query($MyConnect, $updateSQL_sad) or die(mysqli_error());
  $Result1_sre = mysqli_query($MyConnect, $updateSQL_sre) or die(mysqli_error());
  $Result1_edu = mysqli_query($MyConnect, $updateSQL_edu) or die(mysqli_error($MyConnect));
  $Result1_edb = mysqli_query($MyConnect, $updateSQL_edb) or die(mysqli_error($MyConnect));
  $Result1_wex = mysqli_query($MyConnect, $updateSQL_wex) or die(mysqli_error());
  $Result1_ext = mysqli_query($MyConnect, $updateSQL_ext) or die(mysqli_error());
  $Result1_hob = mysqli_query($MyConnect, $updateSQL_hob) or die(mysqli_error());
  //$Result1_lhl = mysqli_query($MyConnect, $updateSQL_lhl) or die(mysqli_error($MyConnect));
  //$Result1_lhv = mysqli_query($MyConnect, $updateSQL_lhv) or die(mysqli_error($MyConnect));

  $Result1_tni = mysqli_query($MyConnect, $updateSQL_tni) or die(mysqli_error($MyConnect));
  $Result1_tac = mysqli_query($MyConnect, $updateSQL_tac) or die(mysqli_error());
  $Result1_bac = mysqli_query($MyConnect, $updateSQL_bac) or die(mysqli_error());
  $Result1_thp = mysqli_query($MyConnect, $updateSQL_thp) or die(mysqli_error());
  $Result1_app = mysqli_query($MyConnect, $updateSQL_app) or die(mysqli_error());
  $Result1_eva = mysqli_query($MyConnect, $updateSQL_eva) or die(mysqli_error());

  $Result1_shs = mysqli_query($MyConnect, $updateSQL_shs) or die(mysqli_error($MyConnect));
  $Result1_lgi = mysqli_query($MyConnect, $updateSQL_lgi) or die(mysqli_error());




  $updateGoTo = "../../ui_connect/student_management/Student_Management.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1_stu = "-1";
if (isset($_GET['s_id'])) {
  $colname_Recordset1_stu = $_GET['s_id'];
}
mysqli_select_db($MyConnect, $database_MyConnect);


$query_Recordset1_stu = sprintf("SELECT * FROM student_info WHERE s_id = %s", GetSQLValueString($colname_Recordset1_stu, "int"));
$Recordset1_stu = mysqli_query($MyConnect, $query_Recordset1_stu) or die(mysqli_error());
$row_Recordset1_stu = mysqli_fetch_assoc($Recordset1_stu);
$totalRows_Recordset1_stu = mysqli_num_rows($Recordset1_stu);

$query_Recordset1_scd = sprintf("SELECT * FROM student_contact_details WHERE scd_s_id=%s", GetSQLValueString($colname_Recordset1_stu, "int"));
$Recordset1_scd = mysqli_query($MyConnect, $query_Recordset1_scd) or die(mysqli_error());
$row_Recordset1_scd = mysqli_fetch_assoc($Recordset1_scd);
$totalRows_Recordset1_scd = mysqli_num_rows($Recordset1_scd);

$thistitle = $row_Recordset1_stu['title_title_id'];
//mysqli_select_db($MyConnect, $database_MyConnect);
    $query_title_rec = "SELECT * FROM title WHERE title_id=$thistitle";
    $title_rec = mysqli_query($MyConnect, $query_title_rec) or die(mysqli_error());
    $row_title_rec = mysqli_fetch_assoc($title_rec);
    $totalRows_title_rec = mysqli_num_rows($title_rec);
    $query_titleSet = "SELECT * FROM title";
    $titleSet = mysqli_query($MyConnect, $query_titleSet) or die(mysqli_error());
    $row_titleSet = mysqli_fetch_assoc($titleSet);
    $totalRows_titleSet = mysqli_num_rows($titleSet);

$thisstatus = $row_Recordset1_stu['status_id'];
//mysqli_select_db($MyConnect, $database_MyConnect);
$query_status_rec = "SELECT * FROM student_status WHERE status_id=$thisstatus";
$status_rec = mysqli_query($MyConnect, $query_status_rec) or die(mysqli_error());
$row_status_rec = mysqli_fetch_assoc($status_rec);
$totalRows_status_rec = mysqli_num_rows($status_rec);
$query_statusSet = "SELECT * FROM student_status";
$statusSet = mysqli_query($MyConnect, $query_statusSet) or die(mysqli_error());
$row_statusSet = mysqli_fetch_assoc($statusSet);
$totalRows_statusSet = mysqli_num_rows($statusSet);

$thiscontact = $row_Recordset1_scd['contact_id'];
$query_Recordset1_sec = sprintf("SELECT * FROM student_emergency_contact WHERE contact_id=$thiscontact", GetSQLValueString($colname_Recordset1_stu, "int"));
$Recordset1_sec = mysqli_query($MyConnect, $query_Recordset1_sec) or die(mysqli_error($MyConnect));
$row_Recordset1_sec = mysqli_fetch_assoc($Recordset1_sec);
$totalRows_Recordset1_sec = mysqli_num_rows($Recordset1_sec);

$thisstu = $row_Recordset1_stu['s_id'];
$query_Recordset1_sad = sprintf("SELECT * FROM student_address WHERE s_id=$thisstu", GetSQLValueString($colname_Recordset1_stu, "int"));
$Recordset1_sad = mysqli_query($MyConnect, $query_Recordset1_sad) or die(mysqli_error($MyConnect));
$row_Recordset1_sad = mysqli_fetch_assoc($Recordset1_sad);
$totalRows_Recordset1_sad = mysqli_num_rows($Recordset1_sad);



//mysqli_select_db($MyConnect, $database_MyConnect);
$query_country_rec = "SELECT * FROM country_list 
  LEFT JOIN student_address ON student_address.s_id=$thisstu
  LEFT JOIN student_info ON student_info.s_id=$thisstu
  WHERE country_list.country_id=student_address.country_id";
$country_rec = mysqli_query($MyConnect, $query_country_rec) or die(mysqli_error($MyConnect));
$row_country_rec = mysqli_fetch_assoc($country_rec);
$totalRows_country_rec = mysqli_num_rows($country_rec);
$query_countrySet = "SELECT * FROM country_list";
$countrySet = mysqli_query($MyConnect, $query_countrySet) or die(mysqli_error());
$row_countrySet = mysqli_fetch_assoc($countrySet);
$totalRows_countrySet = mysqli_num_rows($countrySet); 

$query_Recordset1_sre = sprintf("SELECT * FROM student_relationship WHERE s_id=$thisstu", GetSQLValueString($colname_Recordset1_stu, "int"));
$Recordset1_sre = mysqli_query($MyConnect, $query_Recordset1_sre) or die(mysqli_error($MyConnect));
$row_Recordset1_sre = mysqli_fetch_assoc($Recordset1_sre);
$totalRows_Recordset1_sre = mysqli_num_rows($Recordset1_sre); 


$query_Recordset1_edu = sprintf("SELECT * FROM education_info 
  LEFT JOIN major_info ON major_info.major_id = education_info.major_id
  LEFT JOIN degree_info ON degree_info.degree_id = education_info.degree_id
  WHERE education_info.s_id=$thisstu", GetSQLValueString($colname_Recordset1_stu, "int"));
$Recordset1_edu = mysqli_query($MyConnect, $query_Recordset1_edu) or die(mysqli_error());
$row_Recordset1_edu = mysqli_fetch_assoc($Recordset1_edu);
$totalRows_Recordset1_edu = mysqli_num_rows($Recordset1_edu); 

$query_degree_info_rec = "SELECT * FROM degree_info 
  LEFT JOIN education_info ON education_info.s_id=$thisstu
  LEFT JOIN student_info ON student_info.s_id=$thisstu
  WHERE degree_info.degree_id=education_info.degree_id";
$degree_info_rec = mysqli_query($MyConnect, $query_degree_info_rec) or die(mysqli_error($MyConnect));
$row_degree_info_rec = mysqli_fetch_assoc($degree_info_rec);
$totalRows_degree_info_rec = mysqli_num_rows($degree_info_rec);
$query_degree_edb_rec = "SELECT * FROM degree_info 
  LEFT JOIN education_blackgrounf ON education_blackgrounf.student_info_s_id=$thisstu
  LEFT JOIN student_info ON student_info.s_id=$thisstu
  WHERE degree_info.degree_id=education_blackgrounf.bg_degree";
$degree_edb_rec = mysqli_query($MyConnect, $query_degree_edb_rec) or die(mysqli_error($MyConnect));
$row_degree_edb_rec = mysqli_fetch_assoc($degree_edb_rec);
$totalRows_degree_edb_rec = mysqli_num_rows($degree_edb_rec);
$query_degree_infoSet = "SELECT * FROM degree_info";
$degree_infoSet = mysqli_query($MyConnect, $query_degree_infoSet) or die(mysqli_error());
$row_degree_infoSet = mysqli_fetch_assoc($degree_infoSet);
$totalRows_degree_infoSet = mysqli_num_rows($degree_infoSet); 


$query_major_rec = "SELECT * FROM major_info 
LEFT JOIN education_info ON education_info.s_id=$thisstu
LEFT JOIN student_info ON student_info.s_id=$thisstu
WHERE major_info.major_id=education_info.major_id";
$major_rec = mysqli_query($MyConnect, $query_major_rec) or die(mysqli_error($MyConnect));
$row_major_rec = mysqli_fetch_assoc($major_rec);
$totalRows_major_rec = mysqli_num_rows($major_rec);
$query_majorSet = "SELECT * FROM major_info";
$majorSet = mysqli_query($MyConnect, $query_majorSet) or die(mysqli_error());
$row_majorSet = mysqli_fetch_assoc($majorSet);
$totalRows_majorSet = mysqli_num_rows($majorSet); 

$query_institute_rec = "SELECT * FROM institute 
LEFT JOIN education_info ON education_info.s_id=$thisstu
LEFT JOIN student_info ON student_info.s_id=$thisstu
WHERE institute.ins_id=education_info.edu_institute";
$institute_rec = mysqli_query($MyConnect, $query_institute_rec) or die(mysqli_error($MyConnect));
$row_institute_rec = mysqli_fetch_assoc($institute_rec);
$totalRows_institute_rec = mysqli_num_rows($institute_rec);
$query_instituteSet = "SELECT * FROM institute";
$instituteSet = mysqli_query($MyConnect, $query_instituteSet) or die(mysqli_error());
$row_instituteSet = mysqli_fetch_assoc($instituteSet);
$totalRows_instituteSet = mysqli_num_rows($instituteSet); 
/*170816
$query_uni_rec = "SELECT * FROM university_info 
LEFT JOIN education_info ON education_info.s_id=$thisstu
LEFT JOIN student_info ON student_info.s_id=$thisstu
WHERE university_info.uni_id=education_info.uni_id";
$uni_rec = mysqli_query($MyConnect, $query_uni_rec) or die(mysqli_error($MyConnect));
$row_uni_rec = mysqli_fetch_assoc($uni_rec);
$totalRows_uni_rec = mysqli_num_rows($uni_rec);
//mysqli_select_db($MyConnect, $database_MyConnect);
$query_universitySet = "SELECT * FROM university_info";
$universitySet = mysqli_query($MyConnect, $query_universitySet) or die(mysqli_error());
$row_universitySet = mysqli_fetch_assoc($universitySet);
$totalRows_universitySet = mysqli_num_rows($universitySet);

$query_col_rec = "SELECT * FROM collage_info 
LEFT JOIN education_info ON education_info.s_id=$thisstu
LEFT JOIN student_info ON student_info.s_id=$thisstu
WHERE collage_info.collage_id=education_info.collage_id";
$col_rec = mysqli_query($MyConnect, $query_col_rec) or die(mysqli_error($MyConnect));
$row_col_rec = mysqli_fetch_assoc($col_rec);
$totalRows_col_rec = mysqli_num_rows($col_rec);
//mysqli_select_db($MyConnect, $database_MyConnect);
$query_collageSet = "SELECT * FROM collage_info";
$collageSet = mysqli_query($MyConnect, $query_collageSet) or die(mysqli_error());
$row_collageSet = mysqli_fetch_assoc($collageSet);
$totalRows_collageSet = mysqli_num_rows($collageSet); 
170816*/

$query_edb_rec = "SELECT * FROM education_blackgrounf 
      WHERE  education_blackgrounf.student_info_s_id=$thisstu";
$edb_rec = mysqli_query($MyConnect, $query_edb_rec) or die(mysqli_error());
$row_edb_rec = mysqli_fetch_assoc($edb_rec);
$totalRows_edb_rec = mysqli_num_rows($edb_rec);


$query_wex_rec = "SELECT * FROM work_experience 
  LEFT JOIN student_info ON student_info.s_id=work_experience.student_info_s_id
  WHERE  work_experience.student_info_s_id=$thisstu";
$wex_rec = mysqli_query($MyConnect, $query_wex_rec) or die(mysqli_error());
$row_wex_rec = mysqli_fetch_assoc($wex_rec);
$totalRows_wex_rec = mysqli_num_rows($wex_rec);


$query_ext_rec = "SELECT * FROM extracurricular_act 
  LEFT JOIN student_info ON student_info.s_id=extracurricular_act.student_info_s_id
  WHERE  extracurricular_act.student_info_s_id=$thisstu";
$ext_rec = mysqli_query($MyConnect, $query_ext_rec) or die(mysqli_error());
$row_ext_rec = mysqli_fetch_assoc($ext_rec);
$totalRows_ext_rec = mysqli_num_rows($ext_rec);


$query_hob_rec = "SELECT * FROM hobby_info 
  LEFT JOIN student_info ON student_info.s_id=hobby_info.s_id
  WHERE  hobby_info.s_id=$thisstu";
$hob_rec = mysqli_query($MyConnect, $query_hob_rec) or die(mysqli_error());
$row_hob_rec = mysqli_fetch_assoc($hob_rec);
$totalRows_hob_rec = mysqli_num_rows($hob_rec);
                  
                    $query_lgInSet = "SELECT * FROM language_info
                      ORDER BY lg_info_id DESC";
                    $lgInSet = mysqli_query($MyConnect, $query_lgInSet) or die(mysqli_error());
                    $row_lgInSet = mysqli_fetch_assoc($lgInSet);
                    $totalRows_lgInSet = mysqli_num_rows($lgInSet); 
                    $query_lgIn_rec = "SELECT * FROM language_info 
                      LEFT JOIN student_info ON student_info.s_id = language_info.s_id
                      WHERE student_info.s_id = $thisstu";
                    $lgIn_rec = mysqli_query($MyConnect, $query_lgIn_rec) or die(mysqli_error());
                    $row_lgIn_rec = mysqli_fetch_assoc($lgIn_rec);
                    $totalRows_lgIn_rec = mysqli_num_rows($lgIn_rec); 
/*170816
                    $query_lhlSet = "SELECT * FROM lgInfo_has_lg";
                    $lhlSet = mysqli_query($MyConnect, $query_lhlSet) or die(mysqli_error($MyConnect));
                    $row_lhlSet = mysqli_fetch_assoc($lhlSet);
                    $totalRows_lhlSet = mysqli_num_rows($lhlSet);     
                    $query_lhl_rec = "SELECT lgInfo_has_lg.lgInfo_id, lgInfo_has_lg.lg_id FROM lgInfo_has_lg
                      LEFT JOIN language ON language.lg_id = lgInfo_has_lg.lg_id 
                      LEFT JOIN language_info ON language_info.lg_info_id = lgInfo_has_lg.lgInfo_id
                      INNER JOIN student_info ON student_info.s_id = language_info.s_id
                      WHERE student_info.s_id = $thisstu";
                    $lhl_rec = mysqli_query($MyConnect, $query_lhl_rec) or die(mysqli_error());
                    $row_lhl_rec = mysqli_fetch_assoc($lhl_rec);
                    $totalRows_lhl_rec= mysqli_num_rows($lhl_rec); 
170816*/

                    $query_lgSet = "SELECT * FROM language";
                    $lgSet = mysqli_query($MyConnect, $query_lgSet) or die(mysqli_error());
                    $row_lgSet = mysqli_fetch_assoc($lgSet);
                    $totalRows_lgSet = mysqli_num_rows($lgSet); 
                    $query_lg_rec = "SELECT * FROM language 
                      LEFT JOIN language_info ON language_info.lg_id = language.lg_id
                      LEFT JOIN student_info ON student_info.s_id = language_info.s_id
                      WHERE student_info.s_id = $thisstu";
                    $lg_rec = mysqli_query($MyConnect, $query_lg_rec) or die(mysqli_error());
                    $row_lg_rec = mysqli_fetch_assoc($lg_rec);
                    $totalRows_lg_rec = mysqli_num_rows($lg_rec); 
/*170816
                    $query_lhvSet = "SELECT * FROM lgInfo_has_lv";
                    $lhvSet = mysqli_query($MyConnect, $query_lhvSet) or die(mysqli_error());
                    $row_lhvSet = mysqli_fetch_assoc($lhvSet);
                    $totalRows_lhvSet = mysqli_num_rows($lhvSet);     
                    $query_lhv_rec = "SELECT lgInfo_has_lv.lgInfo_id, lgInfo_has_lv.lv_id FROM lgInfo_has_lv
                      LEFT JOIN language_lv ON language_lv.lv_id = lgInfo_has_lv.lv_id 
                      LEFT JOIN language_info ON language_info.lg_info_id = lgInfo_has_lv.lgInfo_id
                      INNER JOIN student_info ON student_info.s_id = language_info.s_id
                      WHERE student_info.s_id = $thisstu";
                    $lhv_rec = mysqli_query($MyConnect, $query_lhv_rec) or die(mysqli_error());
                    $row_lhv_rec = mysqli_fetch_assoc($lhv_rec);
                    $totalRows_lhv_rec= mysqli_num_rows($lhv_rec); 
170816*/

                    $query_lvSet = "SELECT * FROM language_lv";
                    $lvSet = mysqli_query($MyConnect, $query_lvSet) or die(mysqli_error());
                    $row_lvSet = mysqli_fetch_assoc($lvSet);
                    $totalRows_lvSet = mysqli_num_rows($lvSet); 
                    $query_lv_rec = "SELECT * FROM language_lv 
                      LEFT JOIN language_info ON language_info.lv_id = language_lv.lv_id
                      LEFT JOIN student_info ON student_info.s_id = language_info.s_id
                      WHERE student_info.s_id = $thisstu";
                    $lv_rec = mysqli_query($MyConnect, $query_lv_rec) or die(mysqli_error());
                    $row_lv_rec = mysqli_fetch_assoc($lv_rec);
                    $totalRows_lv_rec = mysqli_num_rows($lv_rec); 

  $query_tniRec = "SELECT * FROM trainee_info
      LEFT JOIN department_info ON department_info.dep_id = trainee_info.dep_id
      LEFT JOIN location ON location.location_id = trainee_info.location_id
      LEFT JOIN plant_info ON plant_info.plant_id = trainee_info.plant_id
      LEFT JOIN trainee_account ON trainee_account.trainee_acc_id = trainee_info.tac_acc_id 
      LEFT JOIN trainee_job ON trainee_job.job_id = trainee_info.job_id
      LEFT JOIN trainee_transportation ON trainee_transportation.transportation_id = trainee_info.transportation_id
      INNER JOIN student_info ON student_info.s_id = trainee_info.s_id
      WHERE student_info.s_id = $thisstu";
  $tniRec = mysqli_query($MyConnect, $query_tniRec) or die(mysqli_error($MyConnect));
  $row_tniRec = mysqli_fetch_assoc($tniRec);
  $totalRows_tniRec = mysqli_num_rows($tniRec); 
  $query_tniSet = "SELECT * FROM trainee_info";
  $tniSet = mysqli_query($MyConnect, $query_tniSet) or die(mysqli_error());
  $row_tniSet = mysqli_fetch_assoc($tniSet);
  $totalRows_tniSet = mysqli_num_rows($tniSet); 
    $query_tni_depRec = "SELECT * FROM department_info
        LEFT JOIN trainee_info ON trainee_info.dep_id = department_info.dep_id
        LEFT JOIN student_info ON student_info.s_id = trainee_info.s_id
        WHERE student_info.s_id = $thisstu";
    $tni_depRec = mysqli_query($MyConnect, $query_tni_depRec) or die(mysqli_error());
    $row_tni_depRec = mysqli_fetch_assoc($tni_depRec);
    $totalRows_tni_depRec = mysqli_num_rows($tni_depRec); 
    $query_tni_locRec = "SELECT * FROM location
        LEFT JOIN trainee_info ON trainee_info.location_id = location.location_id
        LEFT JOIN student_info ON student_info.s_id = trainee_info.s_id
        WHERE student_info.s_id = $thisstu";
    $tni_locRec = mysqli_query($MyConnect, $query_tni_locRec) or die(mysqli_error());
    $row_tni_locRec = mysqli_fetch_assoc($tni_locRec);
    $totalRows_tni_locRec = mysqli_num_rows($tni_locRec);  
    $query_tni_tspRec = "SELECT * FROM trainee_transportation AS tsp
        LEFT JOIN trainee_info ON trainee_info.transportation_id = tsp.transportation_id
        LEFT JOIN student_info ON student_info.s_id = trainee_info.s_id
        WHERE student_info.s_id = $thisstu";
    $tni_tspRec = mysqli_query($MyConnect, $query_tni_tspRec) or die(mysqli_error());
    $row_tni_tspRec = mysqli_fetch_assoc($tni_tspRec);
    $totalRows_tni_tspRec = mysqli_num_rows($tni_tspRec);  
    $query_tni_plaRec = "SELECT * FROM plant_info AS pla
        LEFT JOIN trainee_info ON trainee_info.plant_id = pla.plant_id
        LEFT JOIN student_info ON student_info.s_id = trainee_info.s_id
        WHERE student_info.s_id = $thisstu";
    $tni_plaRec = mysqli_query($MyConnect, $query_tni_plaRec) or die(mysqli_error());
    $row_tni_plaRec = mysqli_fetch_assoc($tni_plaRec);
    $totalRows_tni_plaRec = mysqli_num_rows($tni_plaRec); 

  $query_depSet = "SELECT * FROM department_info";
  $depSet = mysqli_query($MyConnect, $query_depSet) or die(mysqli_error());
  $row_depSet = mysqli_fetch_assoc($depSet);
  $totalRows_depSet = mysqli_num_rows($depSet); 

  $query_locSet = "SELECT * FROM location";
  $locSet = mysqli_query($MyConnect, $query_locSet) or die(mysqli_error());
  $row_locSet = mysqli_fetch_assoc($locSet);
  $totalRows_locSet = mysqli_num_rows($locSet); 

  $query_tspSet = "SELECT * FROM trainee_transportation";
  $tspSet = mysqli_query($MyConnect, $query_tspSet) or die(mysqli_error());
  $row_tspSet = mysqli_fetch_assoc($tspSet);
  $totalRows_tspSet = mysqli_num_rows($tspSet); 

  $query_plaSet = "SELECT * FROM plant_info";
  $plaSet = mysqli_query($MyConnect, $query_plaSet) or die(mysqli_error());
  $row_plaSet = mysqli_fetch_assoc($plaSet);
  $totalRows_plaSet = mysqli_num_rows($plaSet); 

  $query_tacRec = "SELECT * FROM trainee_account
      INNER JOIN trainee_info ON trainee_info.tac_acc_id = trainee_account.trainee_acc_id
      INNER JOIN student_info ON student_info.s_id = trainee_info.s_id
      WHERE student_info.s_id = $thisstu";
  $tacRec = mysqli_query($MyConnect, $query_tacRec) or die(mysqli_error());
  $row_tacRec = mysqli_fetch_assoc($tacRec);
  $totalRows_tacRec = mysqli_num_rows($tacRec); 

        $query_bacRec = "SELECT * FROM bank_acc_info
            LEFT JOIN bank_has_banch ON  bank_has_banch.bnk_has_bch_id = bank_acc_info.bnk_has_id
            LEFT JOIN bank ON bank.bnk_id = bank_has_banch.bnk_id 
            LEFT JOIN bnk_banch ON bnk_banch.bch_id = bank_has_banch.bch_id
            INNER JOIN trainee_info ON trainee_info.trainee_id = bank_acc_info.trainee_id
            INNER JOIN student_info ON student_info.s_id = trainee_info.s_id
            WHERE student_info.s_id = $thisstu";
        $bacRec = mysqli_query($MyConnect, $query_bacRec) or die(mysqli_error());
        $row_bacRec = mysqli_fetch_assoc($bacRec);
        $totalRows_bacRec = mysqli_num_rows($bacRec); 

        $query_bnkSet = "SELECT * FROM bank";
        $bnkSet = mysqli_query($MyConnect, $query_bnkSet) or die(mysqli_error());
        $row_bnkSet = mysqli_fetch_assoc($bnkSet);
        $totalRows_bnkSet = mysqli_num_rows($bnkSet); 

        $query_bchSet = "SELECT * FROM bnk_banch";
        $bchSet = mysqli_query($MyConnect, $query_bchSet) or die(mysqli_error());
        $row_bchSet = mysqli_fetch_assoc($bchSet);
        $totalRows_bchSet = mysqli_num_rows($bchSet); 


  $query_thpRec = "SELECT * FROM trainee_has_project
      LEFT JOIN trainee_project ON trainee_project.project_id = trainee_has_project.project_id
      INNER JOIN trainee_info ON trainee_info.trainee_id = trainee_has_project.trainee_id
      INNER JOIN student_info ON student_info.s_id = trainee_info.s_id
      WHERE student_info.s_id = $thisstu";
  $thpRec = mysqli_query($MyConnect, $query_thpRec) or die(mysqli_error());
  $row_thpRec = mysqli_fetch_assoc($thpRec);
  $totalRows_thpRec = mysqli_num_rows($thpRec); 
  
  /*$query_tacRec = "SELECT * FROM trainee_account
      INNER JOIN trainee_info ON trainee_info.trainee_acc_id = trainee_account.trainee_acc_id
      INNER JOIN student_info ON student_info.s_id = trainee_info.s_id
      WHERE student_info.s_id = $thisstu";
  $tacRec = mysqli_query($MyConnect, $query_tacRec) or die(mysqli_error());
  $row_tacRec = mysqli_fetch_assoc($tacRec);
  $totalRows_tacRec = mysqli_num_rows($tacRec); */


          $query_spvSet = "SELECT * FROM supervisor_info
            ORDER BY spv_id DESC";
          $spvSet = mysqli_query($MyConnect, $query_spvSet) or die(mysqli_error());
          $row_spvSet = mysqli_fetch_assoc($spvSet);
          $totalRows_spvSet = mysqli_num_rows($spvSet);

          $query_shsRec = "SELECT * FROM supervisor_info_has_student_info AS shs
              RIGHT JOIN student_info ON student_info.s_id = shs.student_info_s_id
              RIGHT JOIN supervisor_info ON supervisor_info.spv_id = shs.supervisor_info_spv_id
              WHERE student_info.s_id = $thisstu";
          $shsRec = mysqli_query($MyConnect, $query_shsRec) or die(mysqli_error());
          $row_shsRec = mysqli_fetch_assoc($shsRec);
          $totalRows_shsRec = mysqli_num_rows($shsRec);



  $query_appRec = "SELECT * FROM application 
      INNER JOIN student_info ON student_info.s_id = application.s_id
      WHERE student_info.s_id = $thisstu";
  $appRec = mysqli_query($MyConnect, $query_appRec) or die(mysqli_error());
  $row_appRec = mysqli_fetch_assoc($appRec);
  $totalRows_appRec = mysqli_num_rows($appRec); 
        


  $query_evaRec = "SELECT * FROM evaluation 
      INNER JOIN student_info ON student_info.s_id = evaluation.stu_id
      LEFT JOIN characteristic ON characteristic.ch_id = evaluation.eva_leonard
      WHERE student_info.s_id = $thisstu";
  $evaRec = mysqli_query($MyConnect, $query_evaRec) or die(mysqli_error($MyConnect));
  $row_evaRec = mysqli_fetch_assoc($evaRec);
  $totalRows_evaRec = mysqli_num_rows($evaRec); 
        

  $query_chaSet = "SELECT * FROM characteristic";
  $chaSet = mysqli_query($MyConnect, $query_chaSet) or die(mysqli_error());
  $row_chaSet = mysqli_fetch_assoc($chaSet);
  $totalRows_chaSet = mysqli_num_rows($chaSet);



/*
          $query_spvSet = "SELECT * FROM supervisor_info
            ORDER BY spv_id DESC";
          $spvSet = mysqli_query($MyConnect, $query_spvSet) or die(mysqli_error());
          $row_spvSet = mysqli_fetch_assoc($spvSet);
          $totalRows_spvSet = mysqli_num_rows($spvSet);

          $query_shiSet = "SELECT * FROM supervisor_info_has_student_info";
          $shiSet = mysqli_query($MyConnect, $query_shiSet) or die(mysqli_error());
          $row_shiSet = mysqli_fetch_assoc($shiSet);
          $totalRows_shiSet = mysqli_num_rows($shiSet); */



  
$query_itpSet = "SELECT * FROM institute_type";
$itpSet = mysqli_query($MyConnect, $query_itpSet) or die(mysqli_error());
$row_itpSet = mysqli_fetch_assoc($itpSet);
$totalRows_itpSet = mysqli_num_rows($itpSet);


$query_bldSet = "SELECT * FROM building_info";
$bldSet = mysqli_query($MyConnect, $query_bldSet) or die(mysqli_error());
$row_bldSet = mysqli_fetch_assoc($bldSet);
$totalRows_bldSet = mysqli_num_rows($bldSet);


$query_pvnSet = "SELECT * FROM province";
$pvnSet = mysqli_query($MyConnect, $query_pvnSet) or die(mysqli_error());
$row_pvnSet = mysqli_fetch_assoc($pvnSet);
$totalRows_pvnSet = mysqli_num_rows($pvnSet);





/*




*/






/*
mysqli_select_db($MyConnect, $database_MyConnect);
$query_instituteSet = "SELECT * FROM intitute_type";
$instituteSet = mysqli_query($MyConnect, $query_instituteSet) or die(mysqli_error());
$row_instituteSet = mysqli_fetch_assoc($instituteSet);
$totalRows_instituteSet = mysqli_num_rows($instituteSet); */

?>






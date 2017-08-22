

<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 8) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string(dbconnect(),$theValue) : mysqli_escape_string(dbconnect(),$theValue);

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

$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

		/*-- Reccordset Student_Info [S]--*/
		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  	$insertSQL_stu = sprintf("INSERT INTO student_info (s_id, s_fname, s_lname, thai_fname, thai_lname, s_dob, remark, origin_id, type_id, status_id, ref_id, national_id, title_title_id) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['s_id'], "int"),
                       GetSQLValueString($_POST['s_fname'], "text"),
                       GetSQLValueString($_POST['s_lname'], "text"),
                       GetSQLValueString($_POST['thai_fname'], "text"),
                       GetSQLValueString($_POST['thai_lname'], "text"),
                       GetSQLValueString($_POST['s_dob'], "int"),
                       GetSQLValueString($_POST['remark'], "text"),
                       GetSQLValueString($_POST['origin_id'], "int"),
                       GetSQLValueString($_POST['type_id'], "int"),
                       GetSQLValueString($_POST['status_id'], "int"),
                       GetSQLValueString($_POST['ref_id'], "int"),
                       GetSQLValueString($_POST['national_id'], "int"),
                       GetSQLValueString($_POST['title_title_id'], "int"));


    $insertSQL_edt = sprintf("INSERT INTO education_info (education_id, edu_institute, major_id, degree_id, s_id) VALUES (%s, %s, %s, %s, %s)",
                 GetSQLValueString($_POST['education_id'], "int"),
                 GetSQLValueString($_POST['edu_institute'], "int"),
                 GetSQLValueString($_POST['major_id'], "int"),
                 GetSQLValueString($_POST['degree_id'], "int"),
                 GetSQLValueString($_POST['s_id'], "int"));
  
  $insertSQL_sct = sprintf("INSERT INTO student_contact_details (contact_id, scd_s_id, contact_no, email_adress) VALUES (%s, %s, %s, %s)",
                 GetSQLValueString($_POST['contact_id'], "int"),
                 GetSQLValueString($_POST['scd_s_id'], "int"),
                 GetSQLValueString($_POST['contact_no'], "text"),
                 GetSQLValueString($_POST['email_adress'], "text"));
    

  $insertSQL_app = sprintf("INSERT INTO `application` (application_id, s_id, application_dateS, application_dateE) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['application_id'], "int"),
                       GetSQLValueString($_POST['s_id'], "int"),
                       GetSQLValueString($_POST['application_dateS'], "date"),
                       GetSQLValueString($_POST['application_dateE'], "date")); 
             
  $insertSQL_sec = sprintf("INSERT INTO student_emergency_contact (emc_id, emc_fname, emc_lname, emc_relation, emc_contact, contact_id) VALUES (%s, %s, %s, %s, %s, %s)",
                 GetSQLValueString($_POST['emc_id'], "int"),
                 GetSQLValueString($_POST['emc_fname'], "text"),
                 GetSQLValueString($_POST['emc_lname'], "text"),
                 GetSQLValueString($_POST['emc_relation'], "text"),
                 GetSQLValueString($_POST['emc_contact'], "text"),
                 GetSQLValueString($_POST['contact_id'], "int"));
  
  $insertSQL_sad = sprintf("INSERT INTO student_address (address_Id, s_id, no, place_name, road_name, sub_district, district, city, zip_code, province_name, country_id) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                 GetSQLValueString($_POST['address_Id'], "int"),
                 GetSQLValueString($_POST['s_id'], "int"),
                 GetSQLValueString($_POST['no'], "text"),
                 GetSQLValueString($_POST['place_name'], "text"),
                 GetSQLValueString($_POST['road_name'], "text"),
                 GetSQLValueString($_POST['sub_district'], "text"),
                 GetSQLValueString($_POST['district'], "text"),
                 GetSQLValueString($_POST['city'], "text"),
                 GetSQLValueString($_POST['zip_code'], "int"),
                 GetSQLValueString($_POST['province_name'], "text"),
                 GetSQLValueString($_POST['country_id'], "int"));
  
  $insertSQL_sre = sprintf("INSERT INTO student_relationship (relation_id, s_id, relation_type, relation_fname, relation_lname, relation_occupation, relation_contact) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                 GetSQLValueString($_POST['relation_id'], "int"),
                 GetSQLValueString($_POST['s_id'], "int"),
                 GetSQLValueString($_POST['relation_type'], "text"),
                 GetSQLValueString($_POST['relation_fname'], "text"),
                 GetSQLValueString($_POST['relation_lname'], "text"),
                 GetSQLValueString($_POST['relation_occupation'], "text"),
                 GetSQLValueString($_POST['relation_contact'], "text"));
                 
  $insertSQL_ebg = sprintf("INSERT INTO education_blackgrounf (bg_id, student_info_s_id, bg_durationS, bg_durationE, bg_degree, bg_major, bg_institute_name, bg_gpax) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                 GetSQLValueString($_POST['bg_id'], "int"),
                 GetSQLValueString($_POST['student_info_s_id'], "int"),
                 GetSQLValueString($_POST['bg_durationS'], "date"),
                 GetSQLValueString($_POST['bg_durationE'], "date"),
                 GetSQLValueString($_POST['bg_degree'], "int"),
                 GetSQLValueString($_POST['bg_major'], "text"),
                 GetSQLValueString($_POST['bg_institute_name'], "text"),
                 GetSQLValueString($_POST['bg_gpax'], "text")); 
                 
  /*$insertSQL_vdo = sprintf("INSERT INTO video (video_name, video_file, application_id) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['video_name'], "text"),
                       GetSQLValueString(upload($_FILES['video_file'],'./vdo-source/'), "text"),
                       GetSQLValueString($_POST['application_id'], "int"));
             
  $insertSQL_res = sprintf("INSERT INTO resume (resume_name, resume_file, application_id) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['resume_name'], "text"),
                       GetSQLValueString(upload($_FILES['resume_file'],'./resume-source/'), "text"),
                       GetSQLValueString($_POST['application_id'], "int"));

    $insertSQL_tra = sprintf("INSERT INTO transcript (transcript_name, transcript_file, application_id) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['transcript_name'], "text"),
             GetSQLValueString(upload($_FILES['transcript_file'],'./transcript-source/'), "text"),
                       GetSQLValueString($_POST['application_id'], "int"));

    $insertSQL_vis = sprintf("INSERT INTO visa (visa_name, visa_file, application_application_id) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['visa_name'], "text"),
             GetSQLValueString(upload($_FILES['visa_file'],'./visa-source/'), "text"),
                       GetSQLValueString($_POST['application_application_id'], "int"));

    $insertSQL_oth = sprintf("INSERT INTO other_doc (other_name, other_file, application_application_id) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['other_name'], "text"),
             GetSQLValueString(upload($_FILES['other_file'],'./other-source/'), "text"),
                       GetSQLValueString($_POST['application_application_id'], "int")); */

    $insertSQL_wex = sprintf("INSERT INTO work_experience (wex_id, wex_dateS, wex_dateE, wex_organ, wex_detail, student_info_s_id) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['wex_id'], "int"),
                       GetSQLValueString($_POST['wex_dateS'], "date"),
                       GetSQLValueString($_POST['wex_dateE'], "date"),
                       GetSQLValueString($_POST['wex_organ'], "text"),
                       GetSQLValueString($_POST['wex_detail'], "text"),
                       GetSQLValueString($_POST['student_info_s_id'], "int")); 


    $insertSQL_ext = sprintf("INSERT INTO extracurricular_act (exact_id, ext_dateS, ext_dateE, exact_name, exact_detail, student_info_s_id) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['exact_id'], "int"),
                       GetSQLValueString($_POST['ext_dateS'], "date"),
                       GetSQLValueString($_POST['ext_dateE'], "date"),
                       GetSQLValueString($_POST['exact_name'], "text"),
                       GetSQLValueString($_POST['exact_detail'], "text"),
                       GetSQLValueString($_POST['student_info_s_id'], "int")); 


    $insertSQL_hob = sprintf("INSERT INTO hobby_info (hobby_id, s_id, hobby_desc) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['hobby_id'], "int"),
                       GetSQLValueString($_POST['s_id'], "int"),
                       GetSQLValueString($_POST['hobby_desc'], "text")); 


    $insertSQL_lgIn = sprintf("INSERT INTO language_info (lg_id, lv_id, lg_info_id, s_id) VALUES (%s, %s, %s, %s)", 
                       GetSQLValueString($_POST['lg_id'], "int"),
                       GetSQLValueString($_POST['lv_id'], "int"),
                       GetSQLValueString($_POST['lg_info_id'], "int"),
                       GetSQLValueString($_POST['s_id'], "int"));
    /*
    $insertSQL_lgIn_has_lg = sprintf("INSERT INTO lgInfo_has_lg (lgINfo_has_lg_id, lgInfo_id, lg_id) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['lgINfo_has_lg_id'], "int"),
                       GetSQLValueString($_POST['lgInfo_id'], "int"),
                       GetSQLValueString($_POST['lg_id'], "int")); 

    $insertSQL_LgIn_has_lv = sprintf("INSERT INTO lgInfo_has_lv (lgINfo_has_lv_id, lgInfo_id, lv_id) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['lgINfo_has_lv_id'], "int"),
                       GetSQLValueString($_POST['lgInfo_id'], "int"),
                       GetSQLValueString($_POST['lv_id'], "int")); */


    $insertSQL_tni = sprintf("INSERT INTO trainee_info (trainee_id, trainee_code, s_id, job_id, tac_acc_id, location_id, plant_id, dep_id, transportation_id) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
              GetSQLValueString($_POST['trainee_id'],"text"),
              GetSQLValueString($_POST['trainee_code'],"text"),
              GetSQLValueString($_POST['s_id'],"int"),
              GetSQLValueString($_POST['job_id'],"int"),
              GetSQLValueString($_POST['tac_acc_id'],"int"),
              GetSQLValueString($_POST['location_id'],"int"),
              GetSQLValueString($_POST['plant_id'],"int"),
              GetSQLValueString($_POST['dep_id'],"int"),
              GetSQLValueString($_POST['transportation_id'],"int"));

    $insertSQL_tac = sprintf("INSERT INTO trainee_account (trainee_acc_id, account_name, trainee_email, keycard_id) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['trainee_acc_id'], "int"),
                       GetSQLValueString($_POST['account_name'], "text"),
                       GetSQLValueString($_POST['trainee_email'], "text"),
                       GetSQLValueString($_POST['keycard_id'], "text")); 

    /*$insertSQL_pre = sprintf("INSERT INTO trainee_presentation (presentation_id, presentation_date, presentation_stime, presentation_ftime, presentation_duration, remark, presentation_score, created_details, room_id) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['presentation_id'], "int"),
                       GetSQLValueString($_POST['presentation_date'], "date"),
                       GetSQLValueString($_POST['presentation_stime'], "time"),
                       GetSQLValueString($_POST['presentation_ftime'], "time"),
                       GetSQLValueString($_POST['presentation_duration'], "time"),
                       GetSQLValueString($_POST['remark'], "text"),
                       GetSQLValueString($_POST['presentation_score'], "float"),
                       GetSQLValueString($_POST['created_details'], "timstamp"),
                       GetSQLValueString($_POST['room_id'], "int"));*/

    $insertSQL_bhb = sprintf("INSERT INTO bank_has_banch (bnk_has_bch_id, bnk_id, bch_id) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['bnk_has_bch_id'], "int"),
                       GetSQLValueString($_POST['bnk_id'], "int"),
                       GetSQLValueString($_POST['bch_id'], "int")); 

    $insertSQL_bac = sprintf("INSERT INTO bank_acc_info (bac_id, bac_no, bac_name, trainee_id, bnk_has_id) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['bac_id'], "int"),
                       GetSQLValueString($_POST['bac_no'], "int"),
                       GetSQLValueString($_POST['bac_name'], "text"),
                       GetSQLValueString($_POST['trainee_id'], "int"),
                       GetSQLValueString($_POST['bnk_has_id'], "int"));
    $insertSQL_prj = sprintf("INSERT INTO trainee_project (project_id, project_name, project_detail) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['project_id'], "int"),
                       GetSQLValueString($_POST['project_name'], "text"),
                       GetSQLValueString($_POST['project_detail'], "text")); 
    $insertSQL_thp = sprintf("INSERT INTO trainee_has_project (project_id, trainee_id) VALUES (%s, %s)",
                       GetSQLValueString($_POST['project_id'], "int"),
                       GetSQLValueString($_POST['trainee_id'], "int")); 
    /*
    $insertSQL_pre = sprintf("INSERT INTO trainee_presentation (presentation_date, presentation_stime , presentation_ftime, room_id, remark) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['presentation_date'], "date(format)"),
                       GetSQLValueString($_POST['presentation_stime'], "time"),
                       GetSQLValueString($_POST['presentation_ftime'], "time"),
                       GetSQLValueString($_POST['room_id'], "int"),
                       GetSQLValueString($_POST['remark'], "text")); 
    */             
    /*
    $insertSQL_ = sprintf("INSERT INTO xxx (x1, x2, x3) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['x1'], "int"),
                       GetSQLValueString($_POST['x2'], "int"),
                       GetSQLValueString($_POST['x3'], "int")); 
                       */


    $insertSQL_shs = sprintf("INSERT INTO supervisor_info_has_student_info (supervisor_info_spv_id, student_info_s_id) VALUES (%s, %s)",
                       GetSQLValueString($_POST['supervisor_info_spv_id'], "int"),
                       GetSQLValueString($_POST['student_info_s_id'], "int"));




    $insertSQL_eva = sprintf("INSERT INTO evaluation (eva_id, eva_onlineTest, eva_leonard, eva_preTest, eva_postTest, eva_finalPre_score, eva_finalPre_comment, stu_id) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['eva_id'], "int"),
                       GetSQLValueString($_POST['eva_onlineTest'], "int"),
                       GetSQLValueString($_POST['eva_leonard'], "int"),
                       GetSQLValueString($_POST['eva_preTest'], "int"),
                       GetSQLValueString($_POST['eva_postTest'], "int"),
                       GetSQLValueString($_POST['eva_finalPre_score'], "int"),
                       GetSQLValueString($_POST['eva_finalPre_comment'], "text"),
                       GetSQLValueString($_POST['stu_id'], "int")); 


					   

  
		  mysqli_select_db($MyConnect, $database_MyConnect);
		  /*
		  $Result1_ = mysqli_query($MyConnect, $insertSQL_) or die(mysqli_error());
		  */
		  $Result1_stu = mysqli_query($MyConnect, $insertSQL_stu) or die(mysqli_error($MyConnect));

      $Result1_edt = mysqli_query($MyConnect, $insertSQL_edt) or die(mysqli_error($MyConnect));
      $Result1_sct = mysqli_query($MyConnect, $insertSQL_sct) or die(mysqli_error($MyConnect));
      $Result1_app = mysqli_query($MyConnect, $insertSQL_app) or die(mysqli_error($MyConnect));
      $Result1_sec = mysqli_query($MyConnect, $insertSQL_sec) or die(mysqli_error());
      $Result1_sad = mysqli_query($MyConnect, $insertSQL_sad) or die(mysqli_error()); 
      $Result1_sre = mysqli_query($MyConnect, $insertSQL_sre) or die(mysqli_error());
      $Result1_ebg = mysqli_query($MyConnect, $insertSQL_ebg) or die(mysqli_error($MyConnect));

      
     /* $Result1_vdo = mysqli_query($MyConnect, $insertSQL_vdo) or die(mysqli_error());
      $Result1_res = mysqli_query($MyConnect, $insertSQL_res) or die(mysqli_error());   
      $Result1_tra = mysqli_query($MyConnect, $insertSQL_tra) or die(mysqli_error());
      $Result1_vis = mysqli_query($MyConnect, $insertSQL_vis) or die(mysqli_error());
      $Result1_oth = mysqli_query($MyConnect, $insertSQL_oth) or die(mysqli_error());*/

      $Result1_wex = mysqli_query($MyConnect, $insertSQL_wex) or die(mysqli_error());
      $Result1_ext = mysqli_query($MyConnect, $insertSQL_ext) or die(mysqli_error($MyConnect));
      $Result1_hob = mysqli_query($MyConnect, $insertSQL_hob) or die(mysqli_error($MyConnect));
      $Result1_lgIn = mysqli_query($MyConnect, $insertSQL_lgIn) or die(mysqli_error());
      //$Result1_lgIn_has_lg = mysqli_query($MyConnect, $insertSQL_lgIn_has_lg) or die(mysqli_error($MyConnect));
      //$Result1_LgIn_has_lv = mysqli_query($MyConnect, $insertSQL_LgIn_has_lv) or die(mysqli_error($MyConnect));

      $Result1_tac = mysqli_query($MyConnect, $insertSQL_tac) or die(mysqli_error());
      $Result1_tni = mysqli_query($MyConnect, $insertSQL_tni) or die(mysqli_error());
      //$Result1_pre = mysqli_query($MyConnect, $insertSQL_pre) or die(mysqli_error());
      $Result1_bhb = mysqli_query($MyConnect, $insertSQL_bhb) or die(mysqli_error());
      $Result1_bac = mysqli_query($MyConnect, $insertSQL_bac) or die(mysqli_error());
      $Result1_prj = mysqli_query($MyConnect, $insertSQL_prj) or die(mysqli_error());
      $Result1_thp = mysqli_query($MyConnect, $insertSQL_thp) or die(mysqli_error($MyConnect)); 
      //$Result1_pre = mysqli_query($MyConnect, $insertSQL_pre) or die(mysqli_error($MyConnect));


      $Result1_eva = mysqli_query($MyConnect, $insertSQL_eva) or die(mysqli_error());





          $Result1_shs = mysqli_query($MyConnect, $insertSQL_shs) or die(mysqli_error($MyConnect));



		
		  $insertGoTo = "stu-insert-all.php";
		  if (isset($_SERVER['QUERY_STRING'])) {
			$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
			$insertGoTo .= $_SERVER['QUERY_STRING'];
		  }
		  header(sprintf("Location: %s", $insertGoTo));
		}



		/*-- Reccordset Student_Info [E]--*/
		

		$maxRows_studentSet = 10;
		$pageNum_studentSet = 0;
		if (isset($_GET['pageNum_studentSet'])) {
		  $pageNum_studentSet = $_GET['pageNum_studentSet'];
		}
		$startRow_studentSet = $pageNum_studentSet * $maxRows_studentSet;
		
		mysqli_select_db($MyConnect,$database_MyConnect);
			$query_studentSet = "SELECT student_info.s_id, title.title_name, student_info.s_fname, student_info.s_lname, student_status.status_desc, major_info.major_name , degree_info.degree_name
			FROM student_info
			INNER JOIN title ON title.title_id = student_info.title_title_id
			INNER JOIN student_status ON student_status.status_id = student_info.status_id
			LEFT JOIN education_info ON student_info.s_id = education_info.s_id
			LEFT JOIN major_info ON major_info.major_id = education_info.major_id
			LEFT JOIN degree_info ON degree_info.degree_id = education_info.degree_id
			ORDER BY student_info.s_id DESC";
		$query_limit_studentSet = sprintf("%s LIMIT %d, %d", $query_studentSet, $startRow_studentSet, $maxRows_studentSet);
		$studentSet = mysqli_query($MyConnect, $query_limit_studentSet) or die(mysqli_error());
		$row_studentSet = mysqli_fetch_assoc($studentSet);
		
		if (isset($_GET['totalRows_studentSet'])) {
		  $totalRows_studentSet = $_GET['totalRows_studentSet'];
		} else {
		  $all_studentSet = mysqli_query(dbconnect(), $query_studentSet);
		  $totalRows_studentSet = mysqli_num_rows($all_studentSet);
		}

		$totalPages_studentSet = ceil($totalRows_studentSet/$maxRows_studentSet)-1;
	
		$queryString_studentSet = "";
		if (!empty($_SERVER['QUERY_STRING'])) {
		  $params = explode("&", $_SERVER['QUERY_STRING']);
		  $newParams = array();
		  foreach ($params as $param) {
			if (stristr($param, "pageNum_studentSet") == false && 
				stristr($param, "totalRows_studentSet") == false) {
			  array_push($newParams, $param);
			}
		  }
		  if (count($newParams) != 0) {
			$queryString_studentSet = "&" . htmlentities(implode("&", $newParams));
		  }
		}
		$queryString_studentSet = sprintf("&totalRows_studentSet=%d%s", $totalRows_studentSet, $queryString_studentSet); 


		


mysqli_select_db($MyConnect, $database_MyConnect);
$query_countrySet = "SELECT * FROM country_list";
$countrySet = mysqli_query($MyConnect, $query_countrySet) or die(mysqli_error());
$row_countrySet = mysqli_fetch_assoc($countrySet);
$totalRows_countrySet = mysqli_num_rows($countrySet);


/*if (isset($_GET['totalRows_countrySet'])) {
  $totalRows_countrySet = $_GET['totalRows_countrySet'];
} else {
  $all_countrySet = mysqli_query($query_countrySet);
  $totalRows_countrySet = mysqli_num_rows($all_countrySet);
}
$totalPages_countrySet = ceil($totalRows_countrySet/$maxRows_countrySet)-1;

*/




$currentPage_studentInfo = $_SERVER["PHP_SELF"];

$query_degreeSet = "SELECT * FROM degree_info";
$degreeSet = mysqli_query($MyConnect, $query_degreeSet) or die(mysqli_error());
$row_degreeSet = mysqli_fetch_assoc($degreeSet);
$totalRows_degreeSet = mysqli_num_rows($degreeSet);

$query_majorSet = "SELECT * FROM major_info";
$majorSet = mysqli_query($MyConnect, $query_majorSet) or die(mysqli_error());
$row_majorSet = mysqli_fetch_assoc($majorSet);
$totalRows_majorSet = mysqli_num_rows($majorSet);

/*$query_resumeSet = "SELECT resume_name FROM resume";
$resumeSet = mysqli_query($MyConnect, $query_resumeSet) or die(mysqli_error());
$row_resumeSet = mysqli_fetch_assoc($resumeSet);
$totalRows_resumeSet = mysqli_num_rows($resumeSet); */

$query_RecordsetStudentInfo = "SELECT * FROM `application`";
$RecordsetStudentInfo = mysqli_query($MyConnect, $query_RecordsetStudentInfo) or die(mysqli_error());
$row_RecordsetStudentInfo = mysqli_fetch_assoc($RecordsetStudentInfo);
$totalRows_RecordsetStudentInfo = mysqli_num_rows($RecordsetStudentInfo);


		/*-- titleSet [S]--*/
		$query_titleSet = "SELECT * FROM title";
		$titleSet = mysqli_query($MyConnect, $query_titleSet) or die(mysqli_error());
		$row_titleSet = mysqli_fetch_assoc($titleSet);
		$totalRows_titleSet = mysqli_num_rows($titleSet);
		/*-- titleSet [E]--*/



$query_statusSet = "SELECT * FROM student_status";
$statusSet = mysqli_query($MyConnect, $query_statusSet) or die(mysqli_error());
$row_statusSet = mysqli_fetch_assoc($statusSet);
$totalRows_statusSet = mysqli_num_rows($statusSet);

$query_educationSet = "SELECT * FROM education_info";
$educationSet = mysqli_query($MyConnect, $query_educationSet) or die(mysqli_error());
$row_educationSet = mysqli_fetch_assoc($educationSet);
$totalRows_educationSet = mysqli_num_rows($educationSet);

$query_instituteSet = "SELECT * FROM institute";
$instituteSet = mysqli_query($MyConnect, $query_instituteSet) or die(mysqli_error());
$row_instituteSet = mysqli_fetch_assoc($instituteSet);
$totalRows_instituteSet = mysqli_num_rows($instituteSet);
/*170814
$query_universitySet = "SELECT * FROM university_info";
$universitySet = mysqli_query($MyConnect, $query_universitySet) or die(mysqli_error());
$row_universitySet = mysqli_fetch_assoc($universitySet);
$totalRows_universitySet = mysqli_num_rows($universitySet);

$query_collageSet = "SELECT * FROM collage_info";
$collageSet = mysqli_query($MyConnect, $query_collageSet) or die(mysqli_error());
$row_collageSet = mysqli_fetch_assoc($collageSet);
$totalRows_collageSet = mysqli_num_rows($collageSet);
*/
/*
mysqli_select_db($MyConnect, $database_MyConnect);
$query_newstudentnSet = "SELECT * FROM student_info
  ORDER BY student_info.s_id DESC";
$studentSet = mysqli_query($MyConnect, $query_studentSet) or die(mysqli_error($MyConnect));
$row_studentSet = mysqli_fetch_assoc($studentSet);
$totalRows_studentSet = mysqli_num_rows($studentSet); */

$query_stu_addressSet = "SELECT * FROM student_address";
$stu_addressSet = mysqli_query($MyConnect, $query_stu_addressSet) or die(mysqli_error());
$row_stu_addressSet = mysqli_fetch_assoc($stu_addressSet);
$totalRows_stu_addressSet = mysqli_num_rows($stu_addressSet);

$query_stu_relationshipSet = "SELECT * FROM student_relationship";
$stu_relationshipSet = mysqli_query($MyConnect, $query_stu_relationshipSet) or die(mysqli_error());
$row_stu_relationshipSet = mysqli_fetch_assoc($stu_relationshipSet);
$totalRows_stu_relationshipSet = mysqli_num_rows($stu_relationshipSet);

$query_ed_bgSet = "SELECT * FROM education_blackgrounf";
$ed_bgSet = mysqli_query($MyConnect, $query_ed_bgSet) or die(mysqli_error());
$row_ed_bgSet = mysqli_fetch_assoc($ed_bgSet);
$totalRows_ed_bgSet = mysqli_num_rows($ed_bgSet);

$query_appSet = "SELECT * FROM `application`
	ORDER BY application.application_id DESC";
$appSet = mysqli_query($MyConnect, $query_appSet) or die(mysqli_error());
$row_appSet = mysqli_fetch_assoc($appSet);
$totalRows_appSet = mysqli_num_rows($appSet);

$query_videoSet = "SELECT * FROM video";
$videoSet = mysqli_query($MyConnect, $query_videoSet) or die(mysqli_error());
$row_videoSet = mysqli_fetch_assoc($videoSet);
$totalRows_videoSet = mysqli_num_rows($videoSet);

$query_transcriptSet = "SELECT * FROM transcript";
$transcriptSet = mysqli_query($MyConnect, $query_transcriptSet) or die(mysqli_error());
$row_transcriptSet = mysqli_fetch_assoc($transcriptSet);
$totalRows_transcriptSet = mysqli_num_rows($transcriptSet);

$query_visaSet = "SELECT * FROM visa";
$visaSet = mysqli_query($MyConnect, $query_visaSet) or die(mysqli_error());
$row_visaSet = mysqli_fetch_assoc($visaSet);
$totalRows_visaSet = mysqli_num_rows($visaSet);

$query_other_docSet = "SELECT * FROM other_doc";
$other_docSet = mysqli_query($MyConnect, $query_other_docSet) or die(mysqli_error());
$row_other_docSet = mysqli_fetch_assoc($other_docSet);
$totalRows_other_docSet = mysqli_num_rows($other_docSet);

$query_stu_contactSet = "SELECT * FROM student_contact_details
	ORDER BY student_contact_details.contact_id DESC";
$stu_contactSet = mysqli_query($MyConnect, $query_stu_contactSet) or die(mysqli_error());
$row_stu_contactSet = mysqli_fetch_assoc($stu_contactSet);
$totalRows_stu_contactSet = mysqli_num_rows($stu_contactSet);

$query_secSet = "SELECT * FROM student_emergency_contact
	ORDER BY student_emergency_contact.contact_id DESC";
$secSet = mysqli_query($MyConnect, $query_secSet) or die(mysqli_error());
$row_secSet = mysqli_fetch_assoc($secSet);
$totalRows_secSet = mysqli_num_rows($secSet);

		$query_lgSet = "SELECT * FROM language";
		$lgSet = mysqli_query($MyConnect, $query_lgSet) or die(mysqli_error());
		$row_lgSet = mysqli_fetch_assoc($lgSet);
		$totalRows_lgSet = mysqli_num_rows($lgSet);		


		$query_lgInSet = "SELECT * FROM language_info
			ORDER BY lg_info_id DESC";
		$lgInSet = mysqli_query($MyConnect, $query_lgInSet) or die(mysqli_error());
		$row_lgInSet = mysqli_fetch_assoc($lgInSet);
		$totalRows_lgInSet = mysqli_num_rows($lgInSet);	
    
		$query_lgLvSet = "SELECT * FROM language_lv";
		$lgLvSet = mysqli_query($MyConnect, $query_lgLvSet) or die(mysqli_error());
		$row_lgLvSet = mysqli_fetch_assoc($lgLvSet);
		$totalRows_lgLvSet = mysqli_num_rows($lgLvSet);


	$query_tniSet = "SELECT * FROM trainee_info
		ORDER BY trainee_id DESC";
	$tniSet = mysqli_query($MyConnect, $query_tniSet) or die(mysqli_error());
	$row_tniSet = mysqli_fetch_assoc($tniSet);
	$totalRows_tniSet = mysqli_num_rows($tniSet);	

	$query_locSet = "SELECT * FROM location";
	$locSet = mysqli_query($MyConnect, $query_locSet) or die(mysqli_error());
	$row_locSet = mysqli_fetch_assoc($locSet);
	$totalRows_locSet = mysqli_num_rows($locSet);	

	$query_depSet = "SELECT * FROM department_info";
	$depSet = mysqli_query($MyConnect, $query_depSet) or die(mysqli_error());
	$row_depSet = mysqli_fetch_assoc($depSet);
	$totalRows_depSet = mysqli_num_rows($depSet);	

	$query_plaSet = "SELECT * FROM plant_info";
	$plaSet = mysqli_query($MyConnect, $query_plaSet) or die(mysqli_error());
	$row_plaSet = mysqli_fetch_assoc($plaSet);
	$totalRows_plaSet = mysqli_num_rows($plaSet);

	$query_rmSet = "SELECT * FROM room";
	$rmSet = mysqli_query($MyConnect, $query_rmSet) or die(mysqli_error());
	$row_rmSet = mysqli_fetch_assoc($rmSet);
	$totalRows_rmSet = mysqli_num_rows($rmSet);

	$query_tspSet = "SELECT * FROM trainee_transportation";
	$tspSet = mysqli_query($MyConnect, $query_tspSet) or die(mysqli_error());
	$row_tspSet = mysqli_fetch_assoc($tspSet);
	$totalRows_tspSet = mysqli_num_rows($tspSet);

	$query_bhbSet = "SELECT * FROM bank_has_banch
		ORDER BY bnk_has_bch_id DESC";
	$bhbSet = mysqli_query($MyConnect, $query_bhbSet) or die(mysqli_error());
	$row_bhbSet = mysqli_fetch_assoc($bhbSet);
	$totalRows_bhbSet = mysqli_num_rows($bhbSet);

  
  $query_bhbSet = "SELECT * FROM bank_has_banch
    ORDER BY bnk_has_bch_id DESC";
  $bhbSet = mysqli_query($MyConnect, $query_bhbSet) or die(mysqli_error());
  $row_bhbSet = mysqli_fetch_assoc($bhbSet);
  $totalRows_bhbSet = mysqli_num_rows($bhbSet);

	$query_bnkSet = "SELECT * FROM bank";
	$bnkSet = mysqli_query($MyConnect, $query_bnkSet) or die(mysqli_error());
	$row_bnkSet = mysqli_fetch_assoc($bnkSet);
	$totalRows_bnkSet = mysqli_num_rows($bnkSet);

	$query_bchSet = "SELECT * FROM bnk_banch";
	$bchSet = mysqli_query($MyConnect, $query_bchSet) or die(mysqli_error($MyConnect));
	$row_bchSet = mysqli_fetch_assoc($bchSet);
	$totalRows_bchSet = mysqli_num_rows($bchSet);

	$query_prjSet = "SELECT * FROM trainee_project
		ORDER BY project_id DESC";
	$prjSet = mysqli_query($MyConnect, $query_prjSet) or die(mysqli_error());
	$row_prjSet = mysqli_fetch_assoc($prjSet);
	$totalRows_prjSet = mysqli_num_rows($prjSet);

	$query_tacSet = "SELECT * FROM trainee_account
		ORDER BY trainee_acc_id DESC";
	$tacSet = mysqli_query($MyConnect, $query_tacSet) or die(mysqli_error());
	$row_tacSet = mysqli_fetch_assoc($tacSet);
	$totalRows_tacSet = mysqli_num_rows($tacSet);
/*
  $query_preSet = "SELECT * FROM trainee_presentation
    ORDER BY presentation_id DESC";
  $preSet = mysqli_query($MyConnect, $query_preSet) or die(mysqli_error());
  $row_preSet = mysqli_fetch_assoc($preSet);
  $totalRows_preSet = mysqli_num_rows($preSet);
*/  


          $query_spvSet = "SELECT * FROM supervisor_info
            ORDER BY spv_id DESC";
          $spvSet = mysqli_query($MyConnect, $query_spvSet) or die(mysqli_error());
          $row_spvSet = mysqli_fetch_assoc($spvSet);
          $totalRows_spvSet = mysqli_num_rows($spvSet);

          $query_shiSet = "SELECT * FROM supervisor_info_has_student_info";
          $shiSet = mysqli_query($MyConnect, $query_shiSet) or die(mysqli_error());
          $row_shiSet = mysqli_fetch_assoc($shiSet);
          $totalRows_shiSet = mysqli_num_rows($shiSet);



  $query_chaSet = "SELECT * FROM characteristic";
  $chaSet = mysqli_query($MyConnect, $query_chaSet) or die(mysqli_error());
  $row_chaSet = mysqli_fetch_assoc($chaSet);
  $totalRows_chaSet = mysqli_num_rows($chaSet);

  
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
$queryString_countrySet = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_countrySet") == false && 
        stristr($param, "totalRows_countrySet") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_countrySet = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_countrySet = sprintf("&totalRows_countrySet=%d%s", $totalRows_countrySet, $queryString_countrySet);
*/

/*if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO video (video_name, video_file, application_id) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['video_name'], "text"),
                       GetSQLValueString(dwUploadv($_FILES['video_file'],'./vdo-source/'), "text"),
                       GetSQLValueString($_POST['application_id'], "int"));

  mysqli_select_db($MyConnect, $database_MyConnect);
  $Result1 = mysqli_query($insertSQL, $MyConnect) or die(mysqli_error());

}*/	



?>


<?php
/*mysqli_free_result($countrySet);


mysqli_free_result($degreeSet);

mysqli_free_result($majorSet);

mysqli_free_result($resumeSet);

mysqli_free_result($RecordsetStudentInfo);

mysqli_free_result($titleSet);

mysqli_free_result($statusSet);

mysqli_free_result($universitySet);

mysqli_free_result($educationSet);

mysqli_free_result($collageSet);
  
mysqli_free_result($instituteSet);



mysqli_free_result($stu_addressSet);

mysqli_free_result($stu_relationshipSet);

mysqli_free_result($ed_bgSet);

mysqli_free_result($appSet);

mysqli_free_result($videoSet);

mysqli_free_result($transcriptSet);

mysqli_free_result($visaSet);

mysqli_free_result($other_docSet);



mysqli_free_result($stu_contactSet);

mysqli_free_result($secSet);*/


?>
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

        $updateSQL_sad = sprintf("UPDATE student_relationship
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



  mysqli_select_db($MyConnect, $database_MyConnect);
  $Result1_stu = mysqli_query($MyConnect, $updateSQL_stu) or die(mysqli_error($MyConnect));
  $Result1_scd = mysqli_query($MyConnect, $updateSQL_scd) or die(mysqli_error($MyConnect));
  $Result1_sec = mysqli_query($MyConnect, $updateSQL_sec) or die(mysql_error());
  $Result1_sad = mysqli_query($MyConnect, $updateSQL_sad) or die(mysql_error());

  $updateGoTo = "../Student_Management.php";
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
  LEFT JOIN university_info ON university_info.uni_id = education_info.uni_id
  LEFT JOIN collage_info ON collage_info.collage_id = education_info.collage_id
  WHERE education_info.s_id=$thisstu", GetSQLValueString($colname_Recordset1_stu, "int"));
$Recordset1_edu = mysqli_query($MyConnect, $query_Recordset1_edu) or die(mysqli_error());
$row_Recordset1_edu = mysqli_fetch_assoc($Recordset1_edu);
$totalRows_Recordset1_edu = mysqli_num_rows($Recordset1_edu);

$query_major_info_rec = "SELECT * FROM major_info 
LEFT JOIN education_info ON education_info.s_id=$thisstu
LEFT JOIN student_info ON student_info.s_id=$thisstu";
$major_info_rec = mysqli_query($MyConnect, $query_major_info_rec) or die(mysqli_error($MyConnect));
$row_major_info_rec = mysqli_fetch_assoc($major_info_rec);
$totalRows_major_info_rec = mysqli_num_rows($major_info_rec);
$query_major_infoSet = "SELECT * FROM major_info";
$major_infoSet = mysqli_query($MyConnect, $query_major_infoSet) or die(mysqli_error());
$row_major_infoSet = mysqli_fetch_assoc($major_infoSet);
$totalRows_major_infoSet = mysqli_num_rows($major_infoSet); 

$query_degree_info_rec = "SELECT * FROM degree_info 
LEFT JOIN education_info ON education_info.s_id=$thisstu
LEFT JOIN student_info ON student_info.s_id=$thisstu";
$degree_info_rec = mysqli_query($MyConnect, $query_degree_info_rec) or die(mysqli_error($MyConnect));
$row_degree_info_rec = mysqli_fetch_assoc($degree_info_rec);
$totalRows_degree_info_rec = mysqli_num_rows($degree_info_rec);
$query_degree_infoSet = "SELECT * FROM degree_info";
$degree_infoSet = mysqli_query($MyConnect, $query_degree_infoSet) or die(mysqli_error());
$row_degree_infoSet = mysqli_fetch_assoc($degree_infoSet);
$totalRows_degree_infoSet = mysqli_num_rows($degree_infoSet); 


?>



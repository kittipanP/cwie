

<?php


$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

		/*-- Reccordset  [S]--*/
		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "majorForm")) {
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



					   

  
		  mysqli_select_db($MyConnect, $database_MyConnect);
		  /*
		  $Result1_ = mysqli_query($MyConnect, $insertSQL_) or die(mysqli_error());
		  */
		  $Result1_stu = mysqli_query($MyConnect, $insertSQL_stu) or die(mysqli_error($MyConnect));



		  $insertGoTo = "stu-insert-all.php";
		  if (isset($_SERVER['QUERY_STRING'])) {
			$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
			$insertGoTo .= $_SERVER['QUERY_STRING'];
		  }
		  header(sprintf("Location: %s", $insertGoTo));
		}

		/*-- Reccordset  [E]--*/
		

?>

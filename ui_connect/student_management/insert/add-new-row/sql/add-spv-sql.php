

<?php

$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

		/*-- Reccordset  [S]--*/
		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "spvForm")) {


  	$insertSQL_spv = sprintf("INSERT INTO supervisor_info (spv_fname, spv_lname, spv_job, spv_ext, spv_mobile, spv_email, spv_dept, spv_bdg) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['spv_fname'], "text"),
                       GetSQLValueString($_POST['spv_lname'], "text"),
                       GetSQLValueString($_POST['spv_job'], "text"),
                       GetSQLValueString($_POST['spv_ext'], "int"),
                       GetSQLValueString($_POST['spv_mobile'], "int"),
                       GetSQLValueString($_POST['spv_email'], "text"),
                       GetSQLValueString($_POST['spv_dept'], "int"),
                       GetSQLValueString($_POST['spv_bdg'], "int"));

	
		  mysqli_select_db($MyConnect, $database_MyConnect);
		  /*
		  $Result1_ = mysqli_query($MyConnect, $insertSQL_) or die(mysqli_error());
		  */
		  $Result1_spv = mysqli_query($MyConnect, $insertSQL_spv) or die(mysqli_error($MyConnect));


      $insertGoTo = "stu-insert-all.php";
      if (isset($_SERVER['QUERY_STRING'])) {

      $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
      $insertGoTo .= $_SERVER['QUERY_STRING'];
      }
      header(sprintf("Location: %s", $insertGoTo));

		}

		/*-- Reccordset  [E]--*/
		
?>



<?php

$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

		/*-- Reccordset  [S]--*/
		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "majorForm")) {


  	$insertSQL_maj = sprintf("INSERT INTO major_info (major_id, major_name) VALUES (%s, %s)",
                       GetSQLValueString($_POST['major_id'], "int"),
                       GetSQLValueString($_POST['major_name'], "text"));

	
		  mysqli_select_db($MyConnect, $database_MyConnect);
		  /*
		  $Result1_ = mysqli_query($MyConnect, $insertSQL_) or die(mysqli_error());
		  */
		  $Result1_maj = mysqli_query($MyConnect, $insertSQL_maj) or die(mysqli_error($MyConnect));


      $insertGoTo = "stu-insert-all.php";
      if (isset($_SERVER['QUERY_STRING'])) {

      $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
      $insertGoTo .= $_SERVER['QUERY_STRING'];
      }
      header(sprintf("Location: %s", $insertGoTo));
        
      





		}

		/*-- Reccordset  [E]--*/
		
?>

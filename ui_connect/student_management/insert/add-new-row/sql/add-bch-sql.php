

<?php

$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

		/*-- Reccordset  [S]--*/
		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "bchForm")) {


  	$insertSQL_bch = sprintf("INSERT INTO bnk_banch (bch_name, province_id) VALUES (%s, %s)",
                       GetSQLValueString($_POST['bch_name'], "text"),
                       GetSQLValueString($_POST['province_id'], "int"));

	
		  mysqli_select_db($MyConnect, $database_MyConnect);
		  /*
		  $Result1_ = mysqli_query($MyConnect, $insertSQL_) or die(mysqli_error());
		  */
		  $Result1_bch = mysqli_query($MyConnect, $insertSQL_bch) or die(mysqli_error($MyConnect));


      $insertGoTo = "stu-insert-all.php";
      if (isset($_SERVER['QUERY_STRING'])) {

      $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
      $insertGoTo .= $_SERVER['QUERY_STRING'];
      }
      header(sprintf("Location: %s", $insertGoTo));

		}

		/*-- Reccordset  [E]--*/
		
?>

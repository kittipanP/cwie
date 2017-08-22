

<?php

$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

		/*-- Reccordset  [S]--*/
		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "depForm")) {


  	$insertSQL_dep = sprintf("INSERT INTO department_info (dep_name, cost_centre, dep_ext, bldg_id) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['dep_name'], "text"),
                       GetSQLValueString($_POST['cost_centre'], "text"),
                       GetSQLValueString($_POST['dep_ext'], "int"),
                       GetSQLValueString($_POST['bldg_id'], "int"));

	
		  mysqli_select_db($MyConnect, $database_MyConnect);
		  /*
		  $Result1_ = mysqli_query($MyConnect, $insertSQL_) or die(mysqli_error());
		  */
		  $Result1_dep = mysqli_query($MyConnect, $insertSQL_dep) or die(mysqli_error($MyConnect));


      $insertGoTo = "stu-insert-all.php";
      if (isset($_SERVER['QUERY_STRING'])) {

      $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
      $insertGoTo .= $_SERVER['QUERY_STRING'];
      }
      header(sprintf("Location: %s", $insertGoTo));

		}

		/*-- Reccordset  [E]--*/
		
?>

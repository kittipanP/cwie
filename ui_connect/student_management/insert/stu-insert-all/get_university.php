<?php require_once('../../../../Connections/MyConnect.php'); ?>
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

/*mysqli_select_db($database_myConnect, $myConnect);
$query_uniSet = "SELECT * FROM university_info";
$uniSet = mysqli_query($query_uniSet, $myConnect) or die(mysqli_error());
$row_uniSet = mysqli_fetch_assoc($uniSet);
$totalRows_uniSet = mysqli_num_rows($uniSet);

mysqli_select_db($database_myConnect, $myConnect);
$query_insSet = "SELECT * FROM intitute_type";
$insSet = mysqli_query($query_insSet, $myConnect) or die(mysqli_error());
$row_insSet = mysqli_fetch_assoc($insSet);
$totalRows_insSet = mysqli_num_rows($insSet);

mysqli_select_db($database_myConnect, $myConnect);
$query_collageSet = "SELECT * FROM collage_info";
$collageSet = mysqli_query($query_collageSet, $myConnect) or die(mysqli_error());
$row_collageSet = mysqli_fetch_assoc($collageSet);
$totalRows_collageSet = mysqli_num_rows($collageSet);*/

mysqli_select_db($MyConnect, $database_MyConnect);
$query_instituteSet = "SELECT * FROM intitute_type";
$instituteSet = mysqli_query($MyConnect, $query_instituteSet) or die(mysqli_error());
$row_instituteSet = mysqli_fetch_assoc($instituteSet);
$totalRows_instituteSet = mysqli_num_rows($instituteSet);

mysqli_select_db($MyConnect, $database_MyConnect);
$query_universitySet = "SELECT * FROM university_info";
$universitySet = mysqli_query($MyConnect, $query_universitySet) or die(mysqli_error());
$row_universitySet = mysqli_fetch_assoc($universitySet);
$totalRows_universitySet = mysqli_num_rows($universitySet);

mysqli_select_db($MyConnect, $database_MyConnect);
$query_collageSet = "SELECT * FROM collage_info";
$collageSet = mysqli_query($MyConnect, $query_collageSet) or die(mysqli_error());
$row_collageSet = mysqli_fetch_assoc($collageSet);
$totalRows_collageSet = mysqli_num_rows($collageSet);
?>
<?php
require_once("../../../../ui_connect/student_management/insert/stu-insert-all/dbcontroller.php");
$db_handle = new DBController();
	
if(!empty($_POST["ins_id"])) {
	//$query ="SELECT * FROM intitute_type WHERE intitute_id = '" . $_POST["ins_id"] . "'";
	$results = $db_handle->runQuery($query);
?>  
	
	<?php if($_POST["ins_id"]=='2'){?>
    <option value=""><i class="fa fa-thumbs-up w3-margin-right"></i>Cannot Select University</option>
    
    <?php }elseif($_POST["ins_id"]=='1'){?> 
    <option value="">Select University</option>
	<?php
    do {  
    ?>
		<option value="<?php echo $row_universitySet['uni_id']?>"><?php echo $row_universitySet['uni_name']?></option>
    <?php
    } while ($row_universitySet = mysqli_fetch_assoc($universitySet));
      $rows = mysqli_num_rows($universitySet);
      if($rows > 0) {
          mysqli_data_seek($universitySet, 0);
          $row_universitySet = mysqli_fetch_assoc($universitySet);
      }
    ?><?php }else{ ?>
	<option value="">Select Institute Type First</option>	
	<?php	}
} ?>





<?php

mysqli_free_result($universitySet);
mysqli_free_result($instituteSet);

mysqli_free_result($collageSet);
 
?>



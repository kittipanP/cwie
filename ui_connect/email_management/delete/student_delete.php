<?php require_once('../../Connections/dbconnection.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  
  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
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


if ((isset($_GET['sch_email_id'])) && ($sch_id = $_GET['sch_email_id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM schedule_email WHERE sch_email_id=%s",
                       GetSQLValueString($_GET['sch_email_id'], "int"));

  
  $Result1 = mysql_query($deleteSQL, $link) or die(mysql_error());

  $deleteGoTo = "Email_Management.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}
?>

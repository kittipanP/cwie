<?php require_once('../../Connections/MyConnect.php'); ?>
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



  mysqli_select_db($MyConnect, $database_MyConnect);
  $Result1_stu = mysqli_query($MyConnect, $updateSQL_stu) or die(mysqli_error($MyConnect));
  $Result1_scd = mysqli_query($MyConnect, $updateSQL_scd) or die(mysqli_error($MyConnect));

  $updateGoTo = "Student_Management.php";
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form-update" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">SCD_S_id:</td>
      <td><?php echo $row_Recordset1_scd['scd_s_id']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">S_id:</td>
      <td><?php echo $row_Recordset1_stu['s_id']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">S_fname:</td>
      <td><input type="text" name="s_fname" value="<?php echo htmlentities($row_Recordset1_stu['s_fname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">S_lname:</td>
      <td><input type="text" name="s_lname" value="<?php echo htmlentities($row_Recordset1_stu['s_lname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Thai_fname:</td>
      <td><input type="text" name="thai_fname" value="<?php echo htmlentities($row_Recordset1_stu['thai_fname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Thai_lname:</td>
      <td><input type="text" name="thai_lname" value="<?php echo htmlentities($row_Recordset1_stu['thai_lname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">S_dob:</td>
      <td><input type="text" name="s_dob" value="<?php echo htmlentities($row_Recordset1_stu['s_dob'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Remark:</td>
      <td><input type="text" name="remark" value="<?php echo htmlentities($row_Recordset1_stu['remark'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Origin_id:</td>
      <td><input type="text" name="origin_id" value="<?php echo htmlentities($row_Recordset1_stu['origin_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Type_id:</td>
      <td><input type="text" name="type_id" value="<?php echo htmlentities($row_Recordset1_stu['type_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Status_id:</td>
      <td><input type="text" name="status_id" value="<?php echo htmlentities($row_Recordset1_stu['status_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Ref_id:</td>
      <td><input type="text" name="ref_id" value="<?php echo htmlentities($row_Recordset1_stu['ref_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">National_id:</td>
      <td><input type="text" name="national_id" value="<?php echo htmlentities($row_Recordset1_stu['national_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Title_title_id:</td>
      <td><input type="text" name="title_title_id" value="<?php echo htmlentities($row_Recordset1_stu['title_title_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>


    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Contact id :</td>
      <td><input type="text" name="contact_id" value="<?php echo htmlentities($row_Recordset1_scd['contact_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tel :</td>
      <td><input type="text" name="contact_no" value="<?php echo htmlentities($row_Recordset1_scd['contact_no'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">E-mail address :</td>
      <td><input type="text" name="email_adress" value="<?php echo htmlentities($row_Recordset1_scd['email_adress'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    
    



    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form-update" />
  <input type="hidden" name="scd_s_id" value="<?php echo $row_Recordset1_scd['scd_s_id'];?>" /> <!--do not need-->
  <input type="hidden" name="s_id" value="<?php echo $row_Recordset1_stu['s_id'];?>" />

</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Recordset1_stu);
mysqli_free_result($Recordset1_scd);
?>

<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_MyConnect = "localhost";
$database_MyConnect = "cwie_db";
$username_MyConnect = "root";
$password_MyConnect = "Kp5610761!";
$MyConnect = mysqli_connect($hostname_MyConnect, $username_MyConnect, $password_MyConnect) or trigger_error(mysqli_error(),E_USER_ERROR); 
//mysqli_query("Set Names UTF8");

function dbconnect()
{
  $hostname_PrintSchedDataCn = 'localhost';
  $database_PrintSchedDataCn = 'cwie_db';
  $username_PrintSchedDataCn = 'root';
  $password_PrintSchedDataCn = 'Kp5610761!';
  $PrintSchedDataCn = mysqli_connect($hostname_PrintSchedDataCn, $username_PrintSchedDataCn, $password_PrintSchedDataCn, $database_PrintSchedDataCn) or trigger_error(mysqli_error(),E_USER_ERROR);
  return $PrintSchedDataCn;
}
?>
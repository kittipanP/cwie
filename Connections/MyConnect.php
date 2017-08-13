<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_MyConnect = "localhost";
$database_MyConnect = "cwie_db";
$username_MyConnect = "root";
$password_MyConnect = "Kp5610761!";
$MyConnect = mysqli_connect($hostname_MyConnect, $username_MyConnect, $password_MyConnect) or trigger_error(mysqli_error(),E_USER_ERROR); 
mysqli_set_charset($MyConnect, "utf-8");
//mysqli_query("Set Names UTF8");

mysqli_query($MyConnect, "SET character_set_results=utf8");
mysqli_query($MyConnect, "SET character_set_client=utf8");
mysqli_query($MyConnect, "SET character_set_connection=utf8"); 

$conn = new mysqli($hostname_MyConnect, $username_MyConnect, $password_MyConnect);

function dbconnect()
{
  $hostname_PrintSchedDataCn = 'localhost';
  $database_PrintSchedDataCn = 'cwie_db';
  $username_PrintSchedDataCn = 'root';
  $password_PrintSchedDataCn = 'Kp5610761!';
  $PrintSchedDataCn = mysqli_connect($hostname_PrintSchedDataCn, $username_PrintSchedDataCn, $password_PrintSchedDataCn, $database_PrintSchedDataCn) or trigger_error(mysqli_error(),E_USER_ERROR);
  mysqli_set_charset($PrintSchedDataCn, "utf-8");
  return $PrintSchedDataCn;
}


 $DBhost = "localhost";
 $DBuser = "root";
 $DBpass = "Kp5610761!";
 $DBname = "cwie_db";
 
 try {
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch(PDOException $ex){
  die($ex->getMessage());
 }
?>


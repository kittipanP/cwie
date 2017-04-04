<?php
    //Session Query
    require_once '../../ui_connect/login/query/session.php';?>

<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';

$id =$_REQUEST['login_id'];
	
	
	// sending query
	$delete = mysqli_query($link, "DELETE FROM login_info WHERE login_id = '$id' AND login_id !=".$_SESSION['user']." ");
	header("Location: update.php");
?>
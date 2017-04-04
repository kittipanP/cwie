<?php

require_once '../../../db_connect/dbconnection.php';

$id =$_REQUEST['sch_email_id'];
	
	
	// sending query
	$delete = mysqli_query($link, "DELETE FROM schedule_email_act WHERE sch_email_id = '$id'");
	header("Location: ../email_management.php");
?>

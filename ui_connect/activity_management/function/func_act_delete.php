<?php
    //Database Connection
    require_once '../../../db_connect/dbconnection.php';
    
    //Request ID FROM activity Page
    $id =$_REQUEST['activity_id'];
	
    // sending query
    $delete = mysqli_query($link, "DELETE FROM trainee_activity WHERE activity_id = '$id'");
    //After excute the query, redirect to the activity page.
    header("Location: ../activity.php");

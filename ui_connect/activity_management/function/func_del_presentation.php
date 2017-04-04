<?php
    //Database Connection
    require_once '../../../db_connect/dbconnection.php';
    //Request ID FROM presentation Page
    $pre_id =$_REQUEST['presentation_id'];
    
// sending query
    $delete = mysqli_query($link, "DELETE FROM trainee_presentation WHERE presentation_id = '$pre_id'");
    //After excute the query, redirect to the activity page.
    header("Location: ../presentation.php");

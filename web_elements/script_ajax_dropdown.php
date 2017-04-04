<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';

if(isset($_POST["type_id"]) && !empty($_POST["type_id"])){
    //Get all Status data
    $query = mysqli_query($link, "SELECT * FROM student_status WHERE type_id = ".$_POST['type_id']." ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display Status list
    if($rowCount > 0){
        echo '<option value="">Select Status</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['status_id'].'">'.$row['status_desc'].'</option>';
        }
    }else{
        echo '<option value="">Status not available</option>';
    }
}?>
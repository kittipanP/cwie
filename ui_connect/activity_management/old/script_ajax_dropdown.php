<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';
    

if(isset($_POST["status_id"]) && !empty($_POST["status_id"])){
    //Get all Status data
    $query = mysqli_query($link, "SELECT student_status.status_desc, student_info.s_id, trainee_info.trainee_id "
            . "FROM student_status INNER JOIN student_info "
            . "INNER JOIN trainee_info ON student_info.s_id = trainee_info.s_id WHERE status_id =  ".$_POST['status_id']." ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display Status list
    if($rowCount > 0){
        //echo '<option value="">Select ID</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['s_id'].'">'.$row['s_id'].'</option>';
        }
    }else{
        echo '<option value="">Status not available</option>';
    }
}?>
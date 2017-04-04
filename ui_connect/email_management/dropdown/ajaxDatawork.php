<?php
//Include database configuration file
$link = mysqli_connect('localhost', 'root' , 'Ag5509066', 'urr_dbv');/*DB connection*/



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
}

if(isset($_POST["status_id"]) && !empty($_POST["status_id"])){
    //Get all ID data
    $query = mysqli_query($link,"SELECT student_info.s_id, trainee_id FROM student_info INNER JOIN trainee_info ON student_info.s_id = trainee_info.s_id 
                                WHERE status_id =  ".$_POST['status_id']." ORDER BY trainee_id ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display ID list
    if($rowCount > 0){
        echo '<option value="">Select ID</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['trainee_id'].'">'.$row['trainee_id'].'</option>';
        }
    }else{
        echo '<option value="">ID not available</option>';
    }
}
//Id shows First Name
if(isset($_POST["trainee_id"]) && !empty($_POST["trainee_id"])){
    //Get all city data
    $query = mysqli_query($link,"SELECT student_info.s_id, student_info.s_fname, student_info.s_lname, trainee_info.trainee_id "
                                . "FROM student_info INNER JOIN trainee_info ON student_info.s_id = trainee_info.s_id "
                                . "WHERE trainee_info.trainee_id = ".$_POST['trainee_id']." "); 
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display Fname list
    if($rowCount > 0){
                while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['trainee_id'].'">'.$row['s_fname']. ' '.$row['s_lname'].'</option>';
        }
    }else{
       echo '<option value="">Name not available</option>'; 
    }
}
if ( isset($_POST['btn'])) {
    
    echo '<input id ="try" value="'.$row['trainee_id'].'"></option>'; 
    
}
?>
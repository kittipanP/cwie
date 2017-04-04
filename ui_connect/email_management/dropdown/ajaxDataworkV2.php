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
    $query = mysqli_query($link,"SELECT * FROM student_info WHERE status_id = ".$_POST['status_id']." ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display ID list
    if($rowCount > 0){
        echo '<option value="">Select ID</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['s_id'].'">'.$row['s_id'].'</option>';
        }
    }else{
        echo '<option value="">ID not available</option>';
    }
}
//Id shows First Name
if(isset($_POST["s_id"]) && !empty($_POST["s_id"])){
    //Get all city data
    $query = mysqli_query($link,"SELECT * FROM student_info WHERE s_id = ".$_POST['s_id']." ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display Fname list
    if($rowCount > 0){
                while($row = $query->fetch_assoc()){ 
            echo '<input value="'.$row['s_id'].'">'.$row['s_fname'].'</input>';
        }
    }else{
        
    }
}

if(isset($_POST["s_id"]) && !empty($_POST["s_id"])){
    //Get all Lname data
    $query = mysqli_query($link,"SELECT * FROM student_info WHERE s_id = ".$_POST['s_id']." ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display Lname list
    if($rowCount > 0){
                while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['s_id'].'">'.$row['l_fname'].'</option>';
        }
    }else{
        
    }
}
?>
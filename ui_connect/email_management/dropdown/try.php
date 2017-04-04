
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <?php require_once 'workperfect.php';?>     
</head>
<body>
    <div class="select-boxes">
        
    <?php
   
    
    //Get all country data
    $query = mysqli_query($link, "SELECT * FROM student_type");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
    <select name="type" id="type">
        <option value="">Select Type</option>        
		<?php
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<option value="'.$row['type_id'].'">'.$row['type_name'].'</option>';
            }
        }else{
            echo '<option value="">Type not available</option>';
        }
        ?>
    </select>
    
    <select name="status" id="status">
        <option value="">Select Status</option>
    </select>
    
    <select name="id" id="id">
        <option value="">Select ID</option>
    </select>
        
    <select name="fname" id="fname">
        <option value="">First Name</option>
    </select>
    
        <input type="text" name ="text" id ="try" />
        <input type="submit" name = "btn" id="btn" />
       
    </div>
</body>
</html>
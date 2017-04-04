<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';?>
        
<?php
   //Error
    $error = false;
    //Adding an activity
    if ( isset($_POST['btn-updateemail'])) {
        //Name
        $e_subjet     = mysqli_real_escape_string($link, $_POST[e_subject]);
        $e_type       = mysqli_real_escape_string($link,$_POST[e_type]);
        $a_type       = mysqli_real_escape_string($link,$_POST[type_ed]);
        $e_date       = mysqli_real_escape_string($link,$_POST[e_date]);
        $e_time       = mysqli_real_escape_string($link,$_POST[e_time]);
        
       if (!$error){  
            $id =$_REQUEST['sch_email_id'];
           $update_query = mysqli_query($link, "UPDATE schedule_email_act
                    SET schedule_email_act.email_id = '$e_type',
                        schedule_email_act.status_id = '$a_type',
                        schedule_email_act.sch_time = '$e_time',
                        schedule_email_act.sch_date = '$e_date'
                        WHERE sch_email_id = '$id'");
                    }
                    
        If($update_query){
            $errTyp = 'success';
            $updateerror = 'Email has been updated successfully 🙂 ';
            header("Refresh: 1; url = email_management.php");
        }else{
            $updateerror = 'Something went wrong ☹️';
            
        } 
       }
    
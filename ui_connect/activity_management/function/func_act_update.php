<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';?>
        
<?php
   //Create variable Error
    $error = false;
    
    if ( isset($_POST['btn-update'])) {
        //Preventing SQL Injection
        $a_name     = mysqli_real_escape_string($link, $_POST[act_name_ed]);
        $a_detail   = mysqli_real_escape_string($link,$_POST[act_detail]);
        $a_str_time = mysqli_real_escape_string($link,$_POST[act_str_time_ed]);
        $a_end_time = mysqli_real_escape_string($link,$_POST[act_end_time_ed]);
        $a_date     = mysqli_real_escape_string($link,$_POST[act_date_ed]);
        $a_room     = mysqli_real_escape_string($link,$_POST[act_room_ed]);
        $a_bldg     = mysqli_real_escape_string($link,$_POST[bldg_ed]);
        $a_type     = mysqli_real_escape_string($link,$_POST[type_ed]);
        $a_sch_date = mysqli_real_escape_string($link,$_POST[sch_date_ed]);
        $a_sch_time = mysqli_real_escape_string($link,$_POST[sch_time_ed]);
        $ed_email_type = mysqli_real_escape_string($link,$_POST[ed_e_type]);
        
        //Checking the empty field
        if (empty($a_sch_date && $a_sch_time)){
                $error = true;
                $fieldError = "Please select all the fields";
        }
        //If no error, so excute the queries
        if (!$error){
            //Get ID from activity page to update the activity
            $act_id =$_REQUEST['activity_id'];
            //Update Query
            $update_query = mysqli_query($link, "UPDATE trainee_activity SET "
                    . "activity_name = '".$a_name."', start_time = '".$a_str_time."', end_time = '".$a_end_time."', activity_date = '".$a_date."', "
                    . "activity_room = '".$a_room."', bldg_id = '".$a_bldg."', activity_detail = '".$a_detail."' WHERE activity_id = $act_id");
            //Search $id into tabe
            $searchactquery = mysqli_query($link, "SELECT * FROM trainee_info_has_trainee_activity WHERE trainee_activity_id = $act_id ");
            
            if(mysqli_num_rows($searchactquery)==0){
                //If no found, insert a new record
                $insertquery = mysqli_query($link, "INSERT INTO trainee_info_has_trainee_activity (trainee_activity_id, student_status_id)"
                        . "VALUES ('$act_id', '$a_type')");
            }
            else{
                //If found, update that record
                $updateassign_query = mysqli_query($link, "UPDATE trainee_info_has_trainee_activity
                    SET student_status_id = '$a_type'
                    WHERE trainee_activity_id = '$act_id'");
            }
            //Search in Schedule email
            $searchemailquery = mysqli_query($link, "SELECT * FROM schedule_email_act WHERE activity_id = $act_id ");
            
            if(mysqli_num_rows($searchemailquery)==0){
                //If no found, insert a new record
                
                $update_sch_email_query = mysqli_query($link, "INSERT INTO schedule_email_act (activity_id, email_id, status_id, sch_date, sch_time)
                                                        SELECT trainee_info_has_trainee_activity.trainee_activity_id, email_info.email_id, trainee_info_has_trainee_activity.student_status_id ,'$a_sch_date', '$a_sch_time'
                                                        FROM trainee_info_has_trainee_activity
                                                        INNER JOIN email_info 
                                                        WHERE trainee_info_has_trainee_activity.trainee_activity_id = '$act_id' 
                                                        AND email_info.email_id = '$ed_email_type'");
            }else{
                //If found, update that record
               $update_sch_email_query = mysqli_query($link, "UPDATE schedule_email_act
                        SET schedule_email_act.sch_date = '$a_sch_date',
                        schedule_email_act.sch_time = '$a_sch_time',
                        schedule_email_act.email_id = '$ed_email_type'
                        WHERE activity_id = '$act_id'");
            }
        //Check Query Result    
        If($update_query && $update_sch_email_query){
            $errTyp = 'success';
            $updateerror = 'Activity has been updated successfully 🙂';
            header("Refresh: 1; url = activity.php");
        }else{
            $updateerror = 'Something went wrong ☹️';
            
            }
        }
    }

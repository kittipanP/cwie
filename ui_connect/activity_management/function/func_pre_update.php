<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';
    
    //Create variable Error
    $error = false;
    
    if (isset($_POST['pre_update'])) {
        //Preventing SQL Injection
        $pre_sf_name     = mysqli_real_escape_string($link, $_POST[pre_name_ed]);
        $pre_stime       = mysqli_real_escape_string($link,$_POST[pre_str_time_ed]);
        $pre_ftime       = mysqli_real_escape_string($link,$_POST[pre_end_time_ed]);
        $pre_dtime       = mysqli_real_escape_string($link,$_POST[pre_dur_ed]);
        $pre_date        = mysqli_real_escape_string($link,$_POST[pre_date_ed]);
        $pre_room        = mysqli_real_escape_string($link,$_POST[pre_room_ed]);
        $pre_bldg_id     = mysqli_real_escape_string($link,$_POST[bldg_ed]);
        $pre_remark      = mysqli_real_escape_string($link,$_POST[pre_remark]);
        $pre_score       = mysqli_real_escape_string($link,$_POST[pre_score]);
        $pr_sch_date     = mysqli_real_escape_string($link,$_POST[pre_sch_date_ed]);
        $pre_sch_time    = mysqli_real_escape_string($link,$_POST[pre_sch_time_ed]);
        $pr_email_id     = mysqli_real_escape_string($link,$_POST[pre_ed_e_type]);
    
        
        if (empty($pre_remark)){
                $error = true;
                $fieldError = "Please select all the fields";
        }
        //If no error, so excute the queries
        if (!$error){
            //Get ID from presentation page to update the activity
            $pr_id = $_REQUEST['presentation_id'];
            //Update Query
            $pre_update_query = mysqli_query($link, "UPDATE trainee_presentation SET
                                                    remark = '".$pre_remark."', presentation_score = '".$pre_score."', presentation_date = '".$pre_date."',
                                                    presentation_stime = '".$pre_stime."', presentation_ftime = '".$pre_ftime."', presentation_duration = '".$pre_dtime."',
                                                    presentation_room = '".$pre_room."', bldg_id = '".$pre_bldg_id."'    
                                                    where presentation_id = $pr_id");
            //Update Schedule Email Presentation
            $pre_sch_email_update = mysqli_query($link, "UPDATE schedule_email_pre SET
                                                        pre_email_id = '".$pr_email_id."', pre_sch_date = '".$pr_sch_date."' , pre_sch_time = '".$pre_sch_time."'
                                                        WHERE present_id = $pr_id"); 
        //Check Query Result    
        If($pre_update_query && $pre_sch_email_update){
            $errTyp = 'success';
            $update = 'Updated successfully 🙂';
            header("Refresh: 1; url = presentation.php");
        }else{
            $update = 'Something went wrong ☹️';
            }
        }
    }
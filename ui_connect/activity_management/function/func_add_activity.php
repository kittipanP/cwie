<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';?>
        
<?php
    //Create variable Error
    $error = false;
    //Preventing SQL Injection
    if ( isset($_POST['btn-add'])) {
        $a_name     = mysqli_real_escape_string($link, $_POST[act_name]);
        $a_str_time = mysqli_real_escape_string($link,$_POST[act_str_time]);
        $a_end_time = mysqli_real_escape_string($link,$_POST[act_end_time]);
        $a_date     = mysqli_real_escape_string($link,$_POST[act_date]);
        $a_room     = mysqli_real_escape_string($link,$_POST[act_room]);
        $a_detail   = mysqli_real_escape_string($link,$_POST[act_detail]);
        $a_bldg     = mysqli_real_escape_string($link,$_POST[bldg]);
        $s_type     = mysqli_real_escape_string($link,$_POST[type]);
        $email_time = mysqli_real_escape_string($link,$_POST[sch_time]);
        $email_date = mysqli_real_escape_string($link,$_POST[sch_date]);
        $email_type = mysqli_real_escape_string($link,$_POST[a_e_type]);
        
        
        //Checking the empty field
        if (empty($a_name && $a_detail && $a_str_time && $a_end_time && $a_date && $a_room && $a_bldg && $s_type && $email_time && $email_date && $email_type)){
                $error = true;
                $fieldError = "Please complete all fileds";
        }           
        //If no error, so excute the queries
        if (!$error){    
            //Insert Activity Query   
            $insert_activity_query= mysqli_query($link, "INSERT into trainee_activity (activity_name, activity_detail, start_time, end_time, activity_date, activity_room, bldg_id)
                VALUES ('$a_name','$a_detail','$a_str_time','$a_end_time','$a_date','$a_room', '$a_bldg' )");
            //Assign to Students Query
            $insert_student_query = mysqli_query($link, "INSERT INTO trainee_info_has_trainee_activity (trainee_activity_id, student_status_id)
                                                        SELECT MAX(activity_id) , status_id
                                                        FROM student_info
                                                        INNER JOIN trainee_activity  
                                                        WHERE status_id = '$s_type'
                                                        ORDER BY activity_id LIMIT 1");
            //Insert into schedule email
            $insert_email_query = mysqli_query($link, "INSERT INTO schedule_email_act (activity_id, status_id, sch_date, sch_time)
                                                        SELECT  (trainee_info_has_trainee_activity.trainee_activity_id), '$s_type',  '$email_date', '$email_time'
                                                        FROM trainee_info_has_trainee_activity
                                                        ORDER BY trainee_info_has_trainee_activity.trainee_activity_id DESC
                                                        LIMIT 1");
            //Update email type in schedule
            $updateschemail = mysqli_query($link, "UPDATE schedule_email_act
                                            SET email_id = '$email_type'
                                            WHERE sch_email_id = sch_email_id
                                            ORDER BY sch_email_id DESC LIMIT 1");
        //Check query result        
        if ($insert_activity_query && $insert_student_query && $insert_email_query && $updateschemail){
            $errTyp = 'Success';
            $query_error = "Activity has been added successfully";
            //Unset all fields
            unset($a_name);
            unset($a_detail);   
            unset($a_str_time);
            unset($a_end_time);
            unset($a_date);
            unset($a_room);
            unset($email_date);
            unset($email_date);
            unset($email_type);
            //Redirect to Activity Page
            header("Refresh: 2; url= activity.php");
          }else{
             $errTyp = 'Danger';
             $query_error = "Something went wrong!";
            }
        }        
    }
<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';?>

<?php
    //Create variable Error
    $error = false;
    //Preventing SQL Injection
    if(isset($_POST['btn-addpre'])){
        $pre_stime     = mysqli_real_escape_string($link, $_POST[pre_stime]);
        $pre_ftime     = mysqli_real_escape_string($link, $_POST[pre_ftime]);
        $pre_dur       = mysqli_real_escape_string($link, $_POST[pre_dur]);
        $pre_date      = mysqli_real_escape_string($link, $_POST[pre_date]);
        $pre_room      = mysqli_real_escape_string($link, $_POST[pre_room]);
        $pre_bldg      = mysqli_real_escape_string($link, $_POST[pre_bldg]);
        $pre_trainee   = mysqli_real_escape_string($link, $_POST[pre_trainee]);
        $pre_sch_time  = mysqli_real_escape_string($link, $_POST[pre_sch_time]);
        $pre_sch_date  = mysqli_real_escape_string($link, $_POST[pre_sch_date]);
        $pre_email  = mysqli_real_escape_string($link, $_POST[pre_email_type]);
        //Checking the empty field
        if(empty($pre_stime &&$pre_ftime && $pre_dur && $pre_date && $pre_room && $pre_bldg && $pre_trainee )){
            $error = True;
            $fieldErrorpre = "Please complete all fields";
        }
        //If no error, so excute the queries
        if(!$error){
            //Query to add presentation
            $insert_pre_query = mysqli_query($link, "INSERT INTO trainee_presentation (presentation_date, presentation_stime, presentation_ftime, presentation_duration, presentation_room, bldg_id)"
                                                    ."VALUES ('$pre_date','$pre_stime','$pre_ftime','$pre_dur','$pre_room','$pre_bldg')");
            //Query to assign
            $assign_pre_query = mysqli_query($link, "INSERT INTO trainee_info_has_trainee_presentation (tr_pre_id,trainee_id)
                                                        SELECT MAX(presentation_id), trainee_info.trainee_id
                                                        FROM trainee_presentation
                                                        INNER JOIN trainee_info
                                                        WHERE trainee_info.trainee_id = '$pre_trainee' ORDER BY presentation_id LIMIT 1");
            
            //Schedule an Email
            $insert_email_query = mysqli_query($link, "INSERT INTO schedule_email_pre (present_id, pre_trainee_id, pre_email_id, pre_sch_date, pre_sch_time)
                                                        SELECT  (tr_pre_id), '$pre_trainee', '$pre_email' ,'$pre_sch_date', '$pre_sch_time'
                                                        FROM trainee_info_has_trainee_presentation 
                                                        INNER JOIN email_info
                                                        WHERE email_info.email_id = '$pre_email'
                                                        ORDER BY trainee_info_has_trainee_presentation.tr_pre_id DESC LIMIT 1");
        //Check query result
        if ($insert_pre_query && $assign_pre_query && $insert_email_query){
                $errTyp = 'Success';
                $prequery_error = "Presentation has been added successfully";
                //
                unset($pre_stime);
                unset($pre_ftime);
                unset($pre_dur);
                unset($pre_date);
                unset($pre_room);
                unset($pre_bldg);
                //Redirect to Presentation Page
                header("Refresh: 1; url= presentation.php");
              }else{
                 $errTyp = 'Danger';
                 $prequery_error = "Something went wrong!";
                }
            }
        }
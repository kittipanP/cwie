<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';?>
        
<?php
   //Error
    $error = false;
    //Adding an activity
    if ( isset($_POST['btn-add'])) {
        
        if ( isset($_POST['btn-add'])) {
        
        //Name
        $a_name     = mysqli_real_escape_string($link, $_POST[act_name]);
        $a_detail   = mysqli_real_escape_string($link,$_POST[act_detail]);
        $a_str_time = mysqli_real_escape_string($link,$_POST[act_str_time]);
        $a_end_time = mysqli_real_escape_string($link,$_POST[act_end_time]);
        $a_date     = mysqli_real_escape_string($link,$_POST[act_date]);
        $a_room     = mysqli_real_escape_string($link,$_POST[act_room]);
        $a_bldg     = mysqli_real_escape_string($link,$_POST[bldg]);
       // $s_type     = mysqli_real_escape_string($link,$_POST[type]);
        
        if (empty($a_name && $a_detail && $a_str_time && $a_end_time && $a_date && $a_room && $a_bldg)){
                $error = true;
                $fieldError = "Please complete all fileds";
        }           
        if (!$error){    
            //Query 1    
            $insert_activity_query= mysqli_query($link, "INSERT into trainee_activity (activity_name, activity_detail, start_time, end_time, activity_date, activity_room, bldg_id)
                VALUES ('$a_name','$a_detail','$a_str_time','$a_end_time','$a_date','$a_room', $a_bldg )");
            //Query 2nd
            /*$insert_trainee_query = mysqli_query($link, "INSERT INTO trainee_info_has_trainee_activity (trainee_info_trainee_id,trainee_activity_activity_id)
                        SELECT trainee_info.trainee_id, MAX(trainee_activity.activity_id)
                        FROM trainee_info
                        INNER JOIN trainee_activity
                        WHERE trainee_info.trainee_status_id  = .$s_type)");*/
            /*$insert_trainee_query = mysqli_query($link, "INSERT INTO trainee_info_has_trainee_activity (trainee_info_trainee_id,trainee_activity_activity_id)
                        SELECT trainee_info.trainee_id, trainee_activity.activity_id
                        FROM trainee_info
                        INNER JOIN trainee_activity
                        WHERE trainee_info.trainee_status_id  = '".$s_type."'
                        AND trainee_activity.activity_id = (SELECT MAX(activity_id)FROM trainee_activity ORDER BY activity_id LIMIT 1)") ; */  
                
        }
        if ($insert_activity_query){
            
            $query_error = "Activity has been added successfully";
          }else{
             $query_error = "Something went wrong!";
            }
        }
    }
   
    
    //
    //
    //
    if ( isset($_POST['btn-assign'])) {
        
        if ( isset($_POST['btn-assign'])) {
        
        //Name
        $a_name1     = mysqli_real_escape_string($link, $_POST[act_name1]);
        $s_type     = mysqli_real_escape_string($link,$_POST[type]);
        
        if (empty($s_type)){
                $error = true;
                $fieldError2 = "Please complete all fileds";
        }           
        if (!$error){    
            //Query 1    
            $insert_trainee_query = mysqli_query($link, "INSERT INTO trainee_info_has_trainee_activity (trainee_activity_id,trainee_status_id)
                                                        SELECT MAX(activity_id) , trainee_status_id
                                                        FROM trainee_activity
                                                        INNER JOIN trainee_status
                                                        WHERE trainee_status.trainee_status_id = '$s_type'
                                                        ORDER BY activity_id LIMIT 1") ;
                
                
        }
        
        
        if (!$insert_activity_query ){
                
                $errTyp = "success";
                $query_error = "Activity has been assign successfully";
              }else{
                  $errTyp = "danger";
                 $query_error = "Something went wrong!";
                }
        }
    }
?>
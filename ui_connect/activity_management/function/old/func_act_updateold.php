<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';?>
        
<?php
   //Error
    $error = false;
    //Adding an activity
    if ( isset($_POST['btn-update'])) {
        //Name
        $a_name     = mysqli_real_escape_string($link, $_POST[act_name_ed]);
        $a_detail   = mysqli_real_escape_string($link,$_POST[act_detail_ed]);
        $a_str_time = mysqli_real_escape_string($link,$_POST[act_str_time_ed]);
        $a_end_time = mysqli_real_escape_string($link,$_POST[act_end_time_ed]);
        $a_date     = mysqli_real_escape_string($link,$_POST[act_date_ed]);
        $a_room     = mysqli_real_escape_string($link,$_POST[act_room_ed]);
        $a_bldg     = mysqli_real_escape_string($link,$_POST[bldg_ed]);
        $a_type     = mysqli_real_escape_string($link,$_POST[type_ed]);
        $id =$_REQUEST['activity_id'];
        $update_query = mysqli_query($link, "UPDATE trainee_activity SET "
                . "activity_name = '".$a_name."', start_time = '".$a_str_time."', end_time = '".$a_end_time."', activity_date = '".$a_date."', "
                . "activity_room = '".$a_room."', bldg_id = '".$a_bldg."', activity_detail = '".$a_detail."' WHERE activity_id = $id");
        $searchquery = mysqli_query($link, "SELECT * FROM trainee_info_has_trainee_activity WHERE trainee_activity_id = $id ");
        if(mysqli_num_rows($searchquery)==0){
            $insertquery = mysqli_query($link, "INSERT INTO trainee_info_has_trainee_activity (trainee_activity_id, trainee_status_id)"
                    . "VALUES ('$id', '$a_type')");
        }
        else{
           
            $updateassign_query = mysqli_query($link, "UPDATE trainee_info_has_trainee_activity
                SET trainee_status_id = '$a_type'
                WHERE trainee_activity_id = '$id'");
        }
        If($update_query){
            
            $errTyp = 'success';
            $errMsg = 'Activity has been updated successfully';
            header("Location: activity.php");
        }else{
            $errMsg = 'Something went wrong';
            
        }
       }
    
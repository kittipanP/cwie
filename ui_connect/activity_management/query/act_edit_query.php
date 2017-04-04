<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';?>

<?php 
    //Request Activity ID from Activity Page
    $act_id =$_REQUEST['activity_id'];
    //Query to show Edit Data into the Edit Table
    $query = mysqli_query($link, "SELECT trainee_activity.activity_id, activity_name,activity_detail, start_time , end_time , activity_date,
                                activity_room, IFNULL(bldg_name, 'Unassigned') bldg_name, trainee_activity.bldg_id, IFNULL(status_desc, 'Unassigned') status_desc, 
                                IFNULL(schedule_email_act.sch_date, 'Unassigned')sch_date ,IFNULL(schedule_email_act.sch_time,'Unassigned')sch_time, IFNULL(email_info.email_subject, 'Unassigned') email_subject, schedule_email_act.status_id, schedule_email_act.email_id
                                FROM trainee_info_has_trainee_activity 
                                LEFT JOIN student_status ON student_status.status_id = trainee_info_has_trainee_activity.student_status_id
                                RIGHT JOIN trainee_activity ON trainee_activity.activity_id = trainee_info_has_trainee_activity.trainee_activity_id
                                LEFT JOIN building_info ON building_info.bldg_id = trainee_activity.bldg_id
                                LEFT JOIN schedule_email_act ON trainee_activity.activity_id = schedule_email_act.activity_id
                                LEFT JOIN email_info ON email_info.email_id = schedule_email_act.email_id
                                WHERE trainee_activity.activity_id = $act_id");    
    
    //Convert to PHP variable
    while ($row= mysqli_fetch_array($query)){
        $act_id         = $row['activity_id'];
        $a_name         = $row['activity_name'];
        $a_str_time     = $row['start_time'];
        $a_date         = $row['activity_date'];
        $a_end_time     = $row['end_time'];
        $a_room         = $row['activity_room'];
        $a_bldg         = $row['bldg_name'];
        $a_bldg_id      = $row['bldg_id'];
        $a_type_id      = $row['status_id'];
        $a_type         = $row['status_desc'];
        $a_detail       = $row['activity_detail'];
        $a_sch_date     = $row['sch_date'];
        $a_sch_time     = $row['sch_time'];
        $ed_email_id    = $row['email_id'];
        $ed_email_type  = $row['email_subject'];
    }
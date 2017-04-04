<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';?>


<?php
    //Show all upcoming activitues queries
    $show_activity_query = mysqli_query($link, "SELECT DISTINCT trainee_activity.activity_id, activity_name,activity_detail,
        TIME_FORMAT(start_time, '%h:%i %p') AS start_time ,
        TIME_FORMAT(end_time, '%h:%i %p') AS end_time ,
        DATE_FORMAT(activity_date,'%d-%M')AS act_date,
        activity_room, bldg_name, IFNULL(status_desc, 'Unassigned') status_desc, IFNULL(schedule_email_act.status_id, 'Unassigned') status_assign
        FROM trainee_info_has_trainee_activity 
        LEFT JOIN student_status ON student_status.status_id = trainee_info_has_trainee_activity.student_status_id
        RIGHT JOIN trainee_activity ON trainee_activity.activity_id = trainee_info_has_trainee_activity.trainee_activity_id
        INNER JOIN building_info ON building_info.bldg_id = trainee_activity.bldg_id
        LEFT JOIN schedule_email_act ON  trainee_activity.activity_id = schedule_email_act.activity_id
        WHERE activity_date >= (CURRENT_DATE)
        order by activity_date, start_time ASC");
    
    //Create an error if no recrods
    if(mysqli_num_rows($show_activity_query)==0){
       $noresultact1 = "No record found ☹️ ";}

    //Show all building query into dropdown
    $show_all_bldg_query = mysqli_query($link, "SELECT  * from building_info");
    $rowCount1 = $show_all_bldg_query-> num_rows;


    //Show all old activitues queries on activity page
    $show_recent_activity_query = mysqli_query($link, "SELECT DISTINCT activity_id, activity_name,activity_detail, 
                TIME_FORMAT(start_time, '%h:%i %p') AS start_time ,
                TIME_FORMAT(end_time, '%h:%i %p') AS end_time ,
                DATE_FORMAT(activity_date,'%d-%M')AS act_date,
                activity_date, activity_room, bldg_name, IFNULL(status_desc, 'Unassigned') status_desc
                FROM trainee_info_has_trainee_activity 
                LEFT JOIN student_status ON student_status.status_id = trainee_info_has_trainee_activity.student_status_id
                RIGHT JOIN trainee_activity ON trainee_activity.activity_id = trainee_info_has_trainee_activity.trainee_activity_id
                INNER JOIN building_info ON building_info.bldg_id = trainee_activity.bldg_id
                WHERE activity_date BETWEEN (NOW() - INTERVAL 7 DAY) 
                AND date_sub(current_date, interval 1 day)
                order by activity_date DESC");
    
    //Create an error if no recrods
    if(mysqli_num_rows($show_recent_activity_query)==0){
        $noresultact2 = "No record found ☹️ ";}
        
   
    //To show all Email Type
    $show_all_e_type_query= mysqli_query($link, "SELECT * from email_info");
    /* @var $rowCount2 type */
    $rowCount2 = $show_all_e_type_query-> num_rows;
    
    //To show all student type into dropdown
    $show_trainee_status_query = mysqli_query($link, "SELECT * from student_status");
    $rowCount = $show_trainee_status_query-> num_rows;
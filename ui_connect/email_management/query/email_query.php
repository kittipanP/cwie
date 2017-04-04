<?php 
//Database Connection
require_once '../../db_connect/dbconnection.php';
/*****ON Shedule Email Page***/
//Query for the schedule email activity
$qyery_sch_act_email_show = mysqli_query($link, "SELECT schedule_email_act.sch_email_id, schedule_email_act.activity_id, trainee_activity.activity_name, email_info.email_subject,
                                    schedule_email_act.status_id, DATE_FORMAT(sch_date,'%d-%M')AS sch_date, TIME_FORMAT(sch_time, '%h:%i %p')AS sch_time, student_status.status_desc
                                    FROM student_status
                                    INNER JOIN schedule_email_act on student_status.status_id = schedule_email_act.status_id
                                    INNER JOIN trainee_activity ON trainee_activity.activity_id = schedule_email_act.activity_id
                                    INNER JOIN email_info ON email_info.email_id = schedule_email_act.email_id
                                    WHERE schedule_email_act.sch_date >= CURRENT_DATE
                                    ORDER BY schedule_email_act.sch_date, schedule_email_act.sch_time ASC");
if(mysqli_num_rows($qyery_sch_act_email_show)==0){
        $noresult = "No record found ☹️ ";}

/*****ON Schedule Show Student Name****/
//Query to show student name
$id =$_REQUEST['sch_email_id'];
$qyery_name_email_show = mysqli_query($link, "SELECT schedule_email_act.sch_email_id,title.title_name,student_info.s_fname, 
                                    student_info.s_lname ,student_status.status_desc, trainee_info.trainee_id
                                    FROM student_status
                                    INNER JOIN student_info ON student_status.status_id = student_info.status_id
                                    INNER JOIN title ON title.title_id = student_info.title_title_id
                                    INNER JOIN schedule_email_act on student_status.status_id = schedule_email_act.status_id
                                    INNER JOIN trainee_info ON student_info.s_id = trainee_info.s_id
                                    WHERE sch_email_id = $id
                                     ORDER BY trainee_info.trainee_id ASC");

/*****ON Shedule Email Page***/
///Query for the schedule email presentation
$query_sch_pre_email = mysqli_query($link, "SELECT schedule_email_pre.sch_pre_email_id, student_info.s_fname, student_info.s_lname, schedule_email_pre.pre_trainee_id, 
                                            DATE_FORMAT (pre_sch_date, '%d-%M')pre_sch_date, TIME_FORMAT (pre_sch_time,'%h:%i %p')pre_sch_time, email_info.email_subject, student_status.status_desc
                                            FROM student_status
                                            INNER JOIN student_info ON student_status.status_id = student_info.status_id
                                            INNER JOIN trainee_info ON student_info.s_id = trainee_info.s_id
                                            INNER JOIN schedule_email_pre ON trainee_info.trainee_id = schedule_email_pre.pre_trainee_id
                                            INNER JOIN trainee_presentation ON trainee_presentation.presentation_id = schedule_email_pre.present_id
                                            INNER JOIN email_info ON email_info.email_id = schedule_email_pre.pre_email_id
                                            WHERE schedule_email_pre.pre_sch_date >= CURRENT_DATE
                                            ORDER BY schedule_email_pre.pre_sch_date, schedule_email_pre.pre_sch_time ASC");
if(mysqli_num_rows($query_sch_pre_email)==0){
        $noresult1 = "No record found ☹️ ";}
        
/****All Dropdown***/
//To show all student type
$show_trainee_status_query = mysqli_query($link, "SELECT * from student_status");
$rowCount = $show_trainee_status_query-> num_rows;

//To show all Email Type
$show_all_e_type_query= mysqli_query($link, "SELECT * from email_info");
$rowCount1 = $show_all_e_type_query-> num_rows;
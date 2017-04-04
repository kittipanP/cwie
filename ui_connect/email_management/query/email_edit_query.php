<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';?>
<?php 
                        $sch_id =$_REQUEST['sch_email_id'];
                        $query = mysqli_query($link, "SELECT sch_email_id, schedule_email_act.activity_id, trainee_activity.activity_name, email_info.email_subject, email_info.email_id,
                                schedule_email_act.status_id, student_status.status_desc, schedule_email_act.sch_date, schedule_email_act.sch_time
                                FROM schedule_email_act
                                INNER JOIN trainee_activity ON trainee_activity.activity_id = schedule_email_act.activity_id
                                INNER JOIN email_info ON email_info.email_id = schedule_email_act.email_id
                                INNER JOIN student_status ON student_status.status_id = schedule_email_act.status_id
                                WHERE schedule_email_act.sch_email_id = $sch_id");    
                        while ($row= mysqli_fetch_array($query)){
                                $e_subjet = $row['activity_name'];
                                $e_type_id = $row['email_id'];
                                $e_type = $row['email_subject'];
                                $stu_type_id = $row['status_id'];
                                $stu_type = $row['status_desc'];
                                $e_date = $row['sch_date'];
                                $e_time = $row['sch_time'];
                            }?>
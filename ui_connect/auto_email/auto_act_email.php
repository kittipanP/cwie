<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';
    
    //Query for collecting email address and activity details
    $auto_act_query = mysqli_query($link, "SELECT student_info.s_fname, student_info.s_lname, student_info.status_id, student_contact_details.email_adress,
                                            trainee_activity.activity_name, trainee_activity.activity_detail, TIME_FORMAT(start_time, '%h:%i %p') AS start_time ,
                                            TIME_FORMAT(end_time, '%h:%i %p') AS end_time , DATE_FORMAT(activity_date,'%d-%M')AS act_date, 
                                            trainee_activity.activity_room, building_info.bldg_name, schedule_email_act.sch_date, 
                                            schedule_email_act.sch_time, email_info.email_body, email_info.email_signature
                                            FROM student_info
                                            LEFT JOIN student_status ON student_status.status_id = student_info.status_id
                                            LEFT JOIN student_contact_details ON student_info.s_id = student_contact_details.s_id
                                            INNER JOIN trainee_info_has_trainee_activity ON student_status.status_id = trainee_info_has_trainee_activity.student_status_id
                                            INNER JOIN trainee_activity ON trainee_activity.activity_id = trainee_info_has_trainee_activity.trainee_activity_id
                                            INNER JOIN building_info ON building_info.bldg_id = trainee_activity.bldg_id
                                            LEFT JOIN schedule_email_act ON  trainee_activity.activity_id = schedule_email_act.activity_id
                                            INNER  JOIN email_info ON email_info.email_id = schedule_email_act.email_id
                                            WHERE schedule_email_act.sch_date = CURRENT_DATE
                                            AND schedule_email_act.sch_time = schedule_email_act.sch_time");
    
    //fetching data into array with while loop
    while($row = mysqli_fetch_array($auto_act_query)){
        $receiver = $row['email_adress'];
        $name = $row['s_fname']. ' ' .$row['s_lname'];
        $e_subject = $row['activity_name'];
        $message = $row['activity_detail'];
        $act_s_time = $row['start_time'];
        $act_f_time = $row['end_time'];
        $act_date = $row['act_date'];
        $act_room = $row['activity_room'];
        $act_bldg = $row['bldg_name'];
        $e_body = $row['email_body'];
        $signature = $row['email_signature'];
        
        
     //Email Function
    $to = $receiver;
    $subject = $e_subject;
    $body = 'Dear'." ".$name.','. "\r\n\n". $e_body. "\r\n\n".
            $e_subject. "\r\n\n". $message ."\r\n\n".
            'The activity will be started at '.$act_s_time . ' and will be finished at '.$act_f_time. ' on ' .$act_date. ' in room ' .$act_room. ' at ' .$act_bldg.  '.'.  "\r\n\n". "\r\n\n".$signature;
    $headers = 'From: Western Digital' . "\r\n" ;
    //Email message finished here

    //Server setting//
    ini_set("SMTP","localhost");
    ini_set("smtp_port","25");
    ini_set("sendmail_from","Western Digital");
    ini_set("sendmail_path", "C:\xamp\sendmail\sendmail.exe -t");
    //Server finished here//
    
       
    if (!mail($to, $subject, $body,$headers))
            {echo 'Message was not sent.'."\r\n";
            //echo $mail->ErrorInfo;
            exit;} 
    else {echo 'Message has been sent.'."\r\n";}
    };

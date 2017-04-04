<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';?>

<?php
    //Request Activity ID from Activity Page
    $pr_id =$_REQUEST['presentation_id'];
    //Query to show Edit Data into the Edit Table   
    $pre_edit_query = mysqli_query($link, "SELECT presentation_id, presentation_date AS date, trainee_presentation.presentation_stime AS stime,
                                        trainee_presentation.presentation_ftime  AS ftime, trainee_presentation.presentation_duration AS dtime,
                                        IFNULL(trainee_presentation.remark, 'N/A') remark, IFNULL(trainee_presentation.presentation_score,'N/A')presentation_score, 
                                        presentation_room, trainee_presentation.bldg_id, building_info.bldg_name, s_fname, s_lname, trainee_info.trainee_id, 
                                        schedule_email_pre.pre_sch_date,schedule_email_pre.pre_sch_time, email_info.email_subject, email_info.email_id
                                        FROM student_info
                                        INNER JOIN trainee_info ON student_info.s_id  = trainee_info.s_id
                                        INNER JOIN trainee_info_has_trainee_presentation ON trainee_info.trainee_id = trainee_info_has_trainee_presentation.trainee_id
                                        INNER JOIN trainee_presentation ON trainee_presentation.presentation_id = trainee_info_has_trainee_presentation.tr_pre_id
                                        LEFT JOIN supervisor_info_has_student_info ON student_info.s_id = supervisor_info_has_student_info.student_info_s_id
                                        LEFT JOIN supervisor_info ON supervisor_info.spv_id = supervisor_info_has_student_info.supervisor_info_spv_id
                                        INNER JOIN building_info ON building_info.bldg_id = trainee_presentation.bldg_id
                                        INNER JOIN schedule_email_pre ON trainee_presentation.presentation_id = schedule_email_pre.present_id
                                        INNER JOIN email_info ON email_info.email_id = schedule_email_pre.pre_email_id
                                        WHERE presentation_id = $pr_id");
    
    while ($row= mysqli_fetch_array($pre_edit_query)){
        $pr_id = $row['presentation_id'];
        $pre_date = $row['date'];
        $pre_stime = $row['stime'];
        $pre_ftime = $row['ftime'];
        $pre_dtime = $row['dtime'];
        $pre_remark = $row['remark'];
        $pre_score = $row['presentation_score'];
        $pre_room = $row['presentation_room'];
        $pre_bldg_id = $row['bldg_id'];
        $pre_bldg = $row['bldg_name'];
        $pre_sf_name = $row['s_fname']. ' '.$row['s_lname'];
        $pre_sl_name = $row['s_lname'];
        $pr_sch_date = $row['pre_sch_date'];
        $pre_sch_time = $row['pre_sch_time'];
        $pr_email = $row['email_subject'];
        $pr_email_id = $row['email_id'];
    }

<?php 
//Database Connection
require_once '../../db_connect/dbconnection.php';

?>

<?php
    /****on presentation page****/
    //Show all presentation query 
    $show_presentation_queries = mysqli_query($link, "SELECT presentation_id, 
        DATE_FORMAT(presentation_date,'%d-%M') AS date, 
        TIME_FORMAT(trainee_presentation.presentation_stime,'%h:%i %p' ) AS stime,
        TIME_FORMAT(trainee_presentation.presentation_ftime,'%h:%i %p' ) AS ftime,
        TIME_FORMAT(trainee_presentation.presentation_duration, '%i:%s') AS dtime, 
        presentation_room, bldg_name, title_name,  s_fname,  s_lname, IFNULL(spv_fname,'N/A')spv_fname,
        spv_lname,  trainee_info.trainee_id
        FROM title
        INNER JOIN student_info ON title.title_id = student_info.title_title_id
        INNER JOIN trainee_info ON student_info.s_id  = trainee_info.s_id
        INNER JOIN trainee_info_has_trainee_presentation ON trainee_info.trainee_id = trainee_info_has_trainee_presentation.trainee_id
        INNER JOIN trainee_presentation ON trainee_presentation.presentation_id = trainee_info_has_trainee_presentation.tr_pre_id
        LEFT JOIN supervisor_info_has_student_info ON student_info.s_id = supervisor_info_has_student_info.student_info_s_id
        LEFT JOIN supervisor_info ON supervisor_info.spv_id = supervisor_info_has_student_info.supervisor_info_spv_id
        INNER JOIN building_info ON building_info.bldg_id = trainee_presentation.bldg_id
        WHERE presentation_date >=(CURRENT_DATE) 
        ORDER BY trainee_presentation.presentation_date ASC");
    //Create an error if no recrods
    if(mysqli_num_rows($show_presentation_queries)==0){
        $noresultpre1 = "No record found ☹️ ";}
    
    /****on presentation page****/
    //Show all presentation query of last months
    $show_last_presentation_queries = mysqli_query($link, "SELECT presentation_id, 
        DATE_FORMAT(presentation_date,'%d-%M') AS date, 
        TIME_FORMAT(trainee_presentation.presentation_stime,'%h:%i %p' ) AS stime,
        TIME_FORMAT(trainee_presentation.presentation_ftime,'%h:%i %p' ) AS ftime,
        TIME_FORMAT(trainee_presentation.presentation_duration, '%i:%s') AS dtime, 
        presentation_room, bldg_name, title_name,  s_fname,  s_lname, IFNULL(spv_fname,'N/A')spv_fname,
        spv_lname,  trainee_info.trainee_id
        FROM title
        INNER JOIN student_info ON title.title_id = student_info.title_title_id
        INNER JOIN trainee_info ON student_info.s_id  = trainee_info.s_id
        INNER JOIN trainee_info_has_trainee_presentation ON trainee_info.trainee_id = trainee_info_has_trainee_presentation.trainee_id
        INNER JOIN trainee_presentation ON trainee_presentation.presentation_id = trainee_info_has_trainee_presentation.tr_pre_id
        LEFT JOIN supervisor_info_has_student_info ON student_info.s_id = supervisor_info_has_student_info.student_info_s_id
        LEFT JOIN supervisor_info ON supervisor_info.spv_id = supervisor_info_has_student_info.supervisor_info_spv_id
        INNER JOIN building_info ON building_info.bldg_id = trainee_presentation.bldg_id
        WHERE presentation_date BETWEEN (NOW() - INTERVAL 1 Month) AND NOW()
        ORDER BY trainee_presentation.presentation_date ASC");
    //Create an error if no recrods
    if(mysqli_num_rows($show_last_presentation_queries)==0){
        $noresultpre2 = "No record found ☹️ ";}
 
    /****All Dropdown****/
    
    //Show all trainee with name in the adding presentation query dropdown
    $show_trainee_query = mysqli_query($link, "SELECT trainee_info.trainee_id, student_info.s_fname, student_info.s_lname
                                            FROM student_info
                                            INNER JOIN trainee_info ON student_info.s_id = trainee_info.s_id
                                            WHERE student_info.status_id = '4' 
                                            ORDER BY trainee_id");
    $rowCount = $show_trainee_query-> num_rows;
        
    //Show all building query into dropdown
    $show_all_bldg_query = mysqli_query($link, "SELECT  * from building_info");
    $rowCount1 = $show_all_bldg_query-> num_rows;

    //To show all Email Type
    $show_all_e_type_query= mysqli_query($link, "SELECT * from email_info");
    /* @var $rowCount2 type */
    $rowCount2 = $show_all_e_type_query-> num_rows;
    /****Adding presentation Page***/
    
    
    
        
   



SELECT DISTINCT student_info.s_id,student_contact_details.email_adress, student_status.status_desc,trainee_info_has_trainee_activity.trainee_activity_id, trainee_activity.activity_name, trainee_info_has_trainee_activity.student_status_id
FROM student_status
INNER JOIN student_info ON student_status.status_id = student_info.status_id
INNER JOIN student_contact_details ON student_info.s_id = student_contact_details.s_id
INNER JOIN trainee_info_has_trainee_activity ON student_status.status_id = trainee_info_has_trainee_activity.student_status_id
INNER JOIN trainee_activity ON trainee_activity.activity_id = trainee_info_has_trainee_activity.trainee_activity_id
WHERE trainee_info_has_trainee_activity.student_status_id = '4'
AND trainee_info_has_trainee_activity.trainee_activity_id = '1'


INSERT INTO schedule_email (activity_id, email_id, status_id, sch_date, sch_time)
SELECT MAX(trainee_info_has_trainee_activity.trainee_activity_id), email_info.email_id, MAX(trainee_info_has_trainee_activity.student_status_id), CURRENT_DATE, CURRENT_TIME
FROM trainee_info_has_trainee_activity
INNER JOIN email_info
WHERE email_info.email_id = '1'
INSERT INTO schedule_email (activity_id, email_id, status_id, sch_date, sch_time)
                                                    SELECT MAX(trainee_info_has_trainee_activity.trainee_activity_id), email_info.email_id, MAX(trainee_info_has_trainee_activity.student_status_id), '',''
                                                    FROM trainee_info_has_trainee_activity
                                                    INNER JOIN email_info
                                                    WHERE sch_date = '$email_date'
													AND sch_time = '$email_time'
				
SELECT title.title_name,student_info.s_id, student_info.s_fname, 
                                    student_info.s_lname ,schedule_email.activity_id, trainee_activity.activity_name, email_info.email_subject,
                                    schedule_email.status_id, DATE_FORMAT(sch_date,'%d-%M')AS sch_date, 
                                    TIME_FORMAT(sch_time, '%h:%m %p') AS sch_time, student_status.status_desc
                                    FROM student_status
                                    INNER JOIN student_info ON student_status.status_id = student_info.status_id
                                    INNER JOIN title ON title.title_id = student_info.title_title_id
                                    INNER JOIN schedule_email on student_status.status_id = schedule_email.status_id
                                    INNER JOIN trainee_activity ON trainee_activity.activity_id = schedule_email.activity_id
                                    INNER JOIN email_info ON email_info.email_id = schedule_email.email_id
                                    WHERE schedule_email.sch_date >= CURRENT_DATE
                                    ORDER BY schedule_email.sch_date, schedule_email.sch_time, student_info.s_id ASC
									
									
									
UPDATE  trainee_info,
(SELECT MAX(presentation_id)
FROM trainee_presentation)
SET trainee_info.trainee_presentation_id = trainee_presentation.presentation_id
WHERE trainee_info.trainee_id = 'RSMCB16_273'	

UPDATE trainee_info
SET trainee_presentation_id = (SELECT presentation_id FROM trainee_presentation AS P_ID WHERE presentation_id = '1' )  
WHERE trainee_info.trainee_id = 'RSMCB16_273'


INSERT INTO trainee_info_has_trainee_presentation (pre_trainee_id,trainee_id)
SELECT MAX(presentation_id), 'RSMCB16_280'
FROM trainee_presentation
								
INSERT INTO trainee_info_has_trainee_presentation (pre_trainee_id,trainee_id)
SELECT MAX(presentation_id), trainee_info.trainee_id
FROM trainee_presentation
INNER JOIN trainee_info
WHERE trainee_info.trainee_id = 'RSMBC16_273'		


SELECT presentation_id, 
        DATE_FORMAT(presentation_date,'%d-%M') AS date, 
        TIME_FORMAT(trainee_presentation.presentation_stime,'%h:%i %p' ) AS stime,
        TIME_FORMAT(trainee_presentation.presentation_ftime,'%h:%i %p' ) AS ftime,
        TIME_FORMAT(trainee_presentation.presentation_duration, '%i:%s') AS dtime, 
        presentation_room, bldg_name, title_name,  s_fname,  s_lname, IFNULL(spv_fname,'NA')spv_fname,
        IFNULL(spv_lname,'NA')spv_lname,  trainee_info.trainee_id
        FROM title
        INNER JOIN student_info ON title.title_id = student_info.title_title_id
        INNER JOIN trainee_info_has_trainee_presentation 
        INNER JOIN trainee_presentation ON trainee_presentation.presentation_id = trainee_info_has_trainee_presentation.pre_trainee_id
        LEFT JOIN supervisor_info_has_student_info ON student_info.s_id = supervisor_info_has_student_info.student_info_s_id
        LEFT JOIN supervisor_info ON supervisor_info.spv_id = supervisor_info_has_student_info.supervisor_info_spv_id
        INNER JOIN trainee_info ON student_info.s_id  = trainee_info.s_id
        INNER JOIN building_info ON building_info.bldg_id = trainee_presentation.bldg_id
        WHERE presentation_date >=(CURRENT_DATE) 
        AND trainee_info.trainee_id = 'RSMBC16_280'
        ORDER BY trainee_presentation.presentation_date ASC


SELECT schedule_email_act.sch_email_id, schedule_email_act.activity_id, trainee_activity.activity_name, email_info.email_subject,
                                    schedule_email_act.status_id, DATE_FORMAT(sch_date,'%d-%M')AS sch_date, TIME_FORMAT(sch_time, '%h:%i %p')AS sch_time, student_status.status_desc
                                    FROM student_status
                                    INNER JOIN schedule_email_act on student_status.status_id = schedule_email_act.status_id
                                    INNER JOIN trainee_activity ON trainee_activity.activity_id = schedule_email_act.activity_id
                                    INNER JOIN email_info ON email_info.email_id = schedule_email_act.email_id
                                    WHERE schedule_email_act.sch_date >= CURRENT_DATE
                                    ORDER BY schedule_email_act.sch_date, schedule_email_act.sch_time ASC		
								
INSERT INTO schedule_email_act (activity_id, email_id, status_id, sch_date, sch_time)
                                                        SELECT LAST_INSERT_ID(trainee_info_has_trainee_activity.trainee_activity_id), '1',LAST_INSERT_ID(trainee_info_has_trainee_activity.student_status_id),  '2017/04/02', '09:00:00'
                                                        FROM trainee_info_has_trainee_activity
                                                        INNER JOIN email_info
                                                        ORDER BY trainee_info_has_trainee_activity.student_status_id, trainee_info_has_trainee_activity.trainee_activity_id ASC
                                                        LIMIT 1		


SELECT student_info.s_id
FROM student_info
LEFT OUTER JOIN trainee_info ON (student_info.s_id = trainee_info.s_id)
WHERE trainee_info.s_id IS NULL


SELECT student_info.s_fname, student_info.s_lname, student_info.status_id, student_contact_details.email_adress, schedule_email_act.activity_id, schedule_email_act.email_id, schedule_email_act.sch_date, schedule_email_act.sch_time, email_info.email_subject,email_info.email_body, email_info.email_signature, trainee_activity.activity_name, trainee_activity.activity_detail, trainee_activity.start_time, trainee_activity.end_time, trainee_activity.activity_date, trainee_activity.activity_room, building_info.bldg_name
FROM student_info
INNER JOIN student_status ON student_status.status_id = student_info.status_id
INNER JOIN student_contact_details ON student_info.s_id = student_contact_details.s_id
INNER JOIN trainee_info_has_trainee_activity ON student_status.status_id = trainee_info_has_trainee_activity.student_status_id
INNER JOIN trainee_activity ON trainee_activity.activity_id = trainee_info_has_trainee_activity.trainee_activity_id
INNER JOIN schedule_email_act ON trainee_activity.activity_id = schedule_email_act.activity_id
INNER JOIN email_info ON email_info.email_id = schedule_email_act.email_id
INNER JOIN building_info ON building_info.bldg_id = trainee_activity.bldg_id
WHERE schedule_email_act.sch_date = '2017/03/21'
AND schedule_email_act.sch_time = '09:00'


SELECT student_info.s_fname, student_info.s_lname, student_info.status_id, student_contact_details.email_adress,trainee_activity.activity_name, trainee_activity.activity_detail, trainee_activity.start_time, trainee_activity.end_time, trainee_activity.activity_date, trainee_activity.activity_room, building_info.bldg_name, schedule_email_act.sch_date, schedule_email_act.sch_time
FROM student_info
LEFT JOIN student_status ON student_status.status_id = student_info.status_id
INNER JOIN student_contact_details ON student_info.s_id = student_contact_details.s_id
INNER JOIN trainee_info_has_trainee_activity ON student_status.status_id = trainee_info_has_trainee_activity.student_status_id
INNER JOIN trainee_activity ON trainee_activity.activity_id = trainee_info_has_trainee_activity.trainee_activity_id
INNER JOIN building_info ON building_info.bldg_id = trainee_activity.bldg_id
INNER JOIN schedule_email_act


/*workig right now to send activity email*/
SELECT student_info.s_fname, student_info.s_lname, student_info.status_id, student_contact_details.email_adress,trainee_activity.activity_name, trainee_activity.activity_detail, trainee_activity.start_time, trainee_activity.end_time, trainee_activity.activity_date, trainee_activity.activity_room, building_info.bldg_name, schedule_email_act.sch_date, schedule_email_act.sch_time, email_info.email_body, email_info.email_signature
FROM student_info
LEFT JOIN student_status ON student_status.status_id = student_info.status_id
LEFT JOIN student_contact_details ON student_info.s_id = student_contact_details.s_id
INNER JOIN trainee_info_has_trainee_activity ON student_status.status_id = trainee_info_has_trainee_activity.student_status_id
INNER JOIN trainee_activity ON trainee_activity.activity_id = trainee_info_has_trainee_activity.trainee_activity_id
INNER JOIN building_info ON building_info.bldg_id = trainee_activity.bldg_id
LEFT JOIN schedule_email_act ON  trainee_activity.activity_id = schedule_email_act.activity_id
INNER  JOIN email_info ON email_info.email_id = schedule_email_act.email_id
WHERE schedule_email_act.sch_date = CURRENT_DATE
AND schedule_email_act.sch_time = schedule_email_act.sch_time													
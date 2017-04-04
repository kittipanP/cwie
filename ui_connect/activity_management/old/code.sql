INSERT INTO trainee_info_has_trainee_activity (trainee_info_trainee_id,trainee_activity_activity_id)
SELECT trainee_info.trainee_id, trainee_activity.activity_id 
       FROM trainee_activity
       INNER JOIN trainee_info
       WHERE trainee_info.trainee_status_id = '1'
       AND trainee_activity.activity_name = '9'
	   
	   
INSERT INTO trainee_info_has_trainee_activity (trainee_activity_activity_id, trainee_info_trainee_id)
SELECT  trainee_activity.activity_id, trainee_info.trainee_id
       FROM trainee_activity
       INNER JOIN trainee_info
       WHERE trainee_info.trainee_status_id = .$t_type.
       AND trainee_activity.activity_id = .$a_bldg.
	   
	   
	   
INSERT INTO trainee_info_has_trainee_activity (trainee_info_trainee_id,trainee_activity_activity_id) VALUES (
(SELECT trainee_info.trainee_id
       FROM trainee_info
       WHERE trainee_info.trainee_status_id IN (1)),
(SELECT MAX(trainee_activity.activity_id)
	   FROM trainee_activity))
	   
	   
	   INSERT INTO trainee_info_has_trainee_activity (trainee_info_trainee_id,trainee_activity_activity_id)
SELECT trainee_info.trainee_id, MAX(trainee_activity.activity_id)
       FROM trainee_info
       INNER JOIN trainee_activity
       WHERE trainee_info.trainee_status_id IN (1)
	   
	   
INSERT INTO schedule_email (s_id, activity_id, email_id,sch_date, sch_time)
SELECT trainee_info.s_id, activity_id, email_id, '2017/07/15', '14:00:00'
FROM trainee_activity
INNER JOIN trainee_info
INNER JOIN email_info
WHERE trainee_info.trainee_status_id = '1'
AND trainee_activity.activity_id = (SELECT MAX(activity_id)FROM trainee_activity ORDER BY activity_id LIMIT 1)
AND email_info.email_id = '2'


INSERT INTO trainee_info_has_trainee_activity (status_id_trainee_status, activity_id_trainee_activity)
SELECT trainee_info.trainee_status_id, MAX(trainee_activity.activity_id)
FROM trainee_info
INNER JOIN trainee_activity
WHERE trainee_info.trainee_status_id = '1'
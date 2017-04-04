<?php

require_once '../../db_connect/dbconnection.php';

$show_user_queries = mysqli_query($link, "SELECT login_id, full_name, email, TIME_FORMAT(created_details, '%d-%M-%Y %h:%m %p') AS created_details
FROM login_info
ORDER BY login_id;")

?>
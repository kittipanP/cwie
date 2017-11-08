<?php
//use with livesaerch.php file to fill automatically when user search
require_once '../../db_connect/dbconnection.php';

$request = mysqli_real_escape_string($link, $_POST["query"]);

$query = "SELECT * FROM student_info WHERE s_lname LIKE '%".$request."%'";

$result = mysqli_query($link, $query);

$data = array();

if(mysqli_num_rows($result) > 0){
   while($row = mysqli_fetch_assoc($result)){

    $data[] = $row["s_lname"];
   }

   echo json_encode($data);
}
?>

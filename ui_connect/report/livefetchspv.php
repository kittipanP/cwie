<?php
//use with livesaerch.php file to fill automatically when user search
require_once 'dbconnect/dbconnect.php';

$request = mysqli_real_escape_string($link, $_POST["query"]);
$query = "  SELECT *
            FROM supervisor_info
            WHERE spv_fname LIKE '%".$request."%'
         ";
$result = mysqli_query($link, $query);
$data = array();

if(mysqli_num_rows($result) > 0){
   while($row = mysqli_fetch_assoc($result)){

      $data[] = $row["spv_fname"];
   }

   echo json_encode($data);
}
?>

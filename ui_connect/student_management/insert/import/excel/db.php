<?php
$conn=mysqli_connect("localhost","root","Kp5610761!") or die("Could not connect");
mysqli_select_db($conn, "cwie_db") or die("could not connect database");


mysqli_query($conn, "SET character_set_results=utf8");
mysqli_query($conn, "SET character_set_client=utf8");
mysqli_query($conn, "SET character_set_connection=utf8"); 
?>
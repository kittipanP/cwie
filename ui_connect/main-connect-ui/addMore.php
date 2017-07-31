<?php


require_once '../../Connections/MyConnect.php';


$qry = mysqli_query($conn,"INSERT into `major_info` (email) value ('".$_POST['email']."')");
?>
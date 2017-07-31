<?php


require 'MyConnect.php';


$qry = mysqli_query($MyConnect,"INSERT into `major_info` (email) value ('".$_POST['email']."')") or die(mysqli_error());
?>
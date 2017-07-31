<?php
//require_once('../../Connections/MyConnect.php'); 

require_once '../../Connections/MyConnect.php';

$qry = mysqli_query($conn,"SELECT * from major_info WHERE `email` = '".$_POST['email']."'");
$row = mysqli_num_rows($qry);
echo $row;

//$query_majorSet = "SELECT * FROM major_info WHERE 'email' = '".$_POST['email']."'";
//$majorSet = mysqli_query($MyConnect, $query_majorSet) or die(mysqli_error());
//$row_majorSet = mysqli_fetch_assoc($majorSet);
//$totalRows_majorSet = mysqli_num_rows($majorSet);
//$row = mysqli_num_rows($qry);

//echo $totalRows_majorSet;
//BEBON@BEBON.COM
//major_name
?>
<?php
    //Session Query
    require_once '../../ui_connect/login/query/session.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <?php
            //All the meta and css links
            require_once '../../web_elements/head_link.php';?>
        <title>Report Management : WD Trainee Management</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>


</head>

<style type="text/css">
  <?php require_once 'css/reporttable.css';?>/*import css file to decorate table*/
  <?php require_once 'css/navbar.css';?> /*import css file to decorate navigation bar*/
  <?php require_once 'css/ghostbutton.css';?> /*import css file to decorate search button*/
  <?php require_once 'css/paging.css';?> /*import css file to decorate search paging*/
  <?php require_once 'css/searchform.css';?> /*import css file to decorate search form*/
</style>

<body class="w3-theme-l5">

<!-- Navbar -->
<!-- <div class="w3-top" > -->
<!-- Navigation bar Code -->
         <?php require_once '../../web_elements/nav_bar.php';?>

<!-- Search Form ================================================================================================-->
<br>
<br>
<div class="buttonbody">
<a href="../report/pie.php" class="ghost-button">Show Graph</a>
<a href="../report/overview.php" class="ghost-button">Show Overview</a>
</div>

<div>
<div class="left"><!--Open div tag of left box of search form-->
  <div class="w3-container w3-card-4" style="margin:0 0 0 0; border-radius: 5px; background-color: #FFFFFF; padding: 20px;">
    <form method="post"action="<?php echo $_SERVER['PHP_SELF'];?>"><h3><b>Advance Search:</b></h3>
      <label for="fname">First Name</label>
      <input type="text" id="fname" name="s_fname" placeholder="Name..">

      <label for="uname">University/College</label>
      <input type="text" id="uname" name="uname" placeholder="University/College..">

      <label for="mjname">Major</label>
      <input type="text" id="mjname" name="mjname" placeholder="Major..">

      <label for="dgname">Degree</label>
      <input type="text" id="dgname" name="dgname" placeholder="Degree..">

      <label for="dpname">Department</label>
      <input type="text" id="dpname" name="dpname" placeholder="Department..">

      <label for="lcname">Location</label>
      <input type="text" id="lcname" name="lcname" placeholder="Location..">

      <label for="plname">Plant</label>
      <input type="text" id="plname" name="plname" placeholder="Plant..">

      <label for="svname">Supervisor name</label>
      <input type="text" id="svname" name="svname" placeholder="Supervisor name">

      <label for="studentstatus">Studen Status</label>
      <select id="studentstatus" name="studentstatus">
        <option value="onprocess">On Process</option>
        <option value="waitingonboard">Waiting on Board</option>
        <option value="reject">Reject</option>
        <<option value="trainee">Trainee</option>
        <<option value="endtrainee">End Trainee</option>
      </select>

    	<input type="submit" value="Submit">
    </form>
  </div>
</div> <!--Close div tag of left box of search form-->

<!-- Connect database============================================================================================-->
<?php
require_once '../../db_connect/dbconnection.php';

$sql = "SELECT * FROM student_info";

if($link){}else{echo "MySQL Connect Failed : Error : ".mysqli_error();}

mysqli_query($link,"SET NAMES 'utf8'");// เอาไว้กรณีให้บังคับตัวหนังสือเป็น UTF 8

//Show data from database in table
if (!empty($_REQUEST['s_fname'])){
	$name = mysqli_real_escape_string($link,$_REQUEST['s_fname']);
	$sql = "SELECT * FROM student_info WHERE s_fname LIKE '%".$name."%'";
	$r_query = mysqli_query($link,$sql) or die(mysqli_error());
}
// show data in table
?>
<div class="right"> <!--Open div tag for right box of showing data-->
  <div class="w3-container w3-card-4" style="margin:0 0 0 0; border-radius: 5px; background-color: #FFFFFF; padding: 0px;">
  <table class="table-fill">
      <tr>
      	<th class="text-left">Student ID</th>
        <th class="text-left">Studen First name</th>
        <th class="text-left">Student Last name</th>
      </tr>
<?php
  $r_query = mysqli_query($link,$sql) or die(mysqli_error());
	while($row = mysqli_fetch_array($r_query))
	{
?>
        <tbody class="table-hover">
        <tr>
				<td class="text-left"><?php echo $row['s_id']?></td>
				<td class="text-left"><?php echo $row['s_fname']?></td>
				<td class="text-left"><?php echo $row['s_lname']?></td>
	      </tr>
        </tbody>
<?php
}
?>
  </table>
</div>
</div> <!--Close div tag for right box of showing data-->
</div> <!--Close outside div tag-->


</body>
</html>


<?php 
    //Database Connection
    require_once '../../db_connect/dbconnection.php';

    //Session Query
    require_once '../../ui_connect/login/query/session.php';

?>
<?php
/*
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../admin/index-login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
*/
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 8) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysqli_real_escape_string") ?mysqli_real_escape_string(dbconnect(), $theValue) :mysqli_escape_string(dbconnect(), $theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}



$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO work_experience (wex_id, wex_dateS, wex_dateE, wex_organ, wex_detail, student_info_s_id) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['wex_id'], "int"),
                       GetSQLValueString($_POST['wex_dateS'], "date"),
                       GetSQLValueString($_POST['wex_dateE'], "date"),
                       GetSQLValueString($_POST['wex_organ'], "text"),
                       GetSQLValueString($_POST['wex_detail'], "text"),
                       GetSQLValueString($_POST['student_info_s_id'], "int"));

 mysqli_select_db($MyConnect, $database_MyConnect);
  $Result1 =mysqli_query($MyConnect, $insertSQL) or die(mysqli_error());
}
?>
<?php require_once('../../Connections/MyConnect.php'); ?>
<?php include("fn-upload.inc.php"); 
?>
<?php include ("student_management_reccordset.php");
      include ("printf/allController.php");
	//include ("../admin/for-admin.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">
<title>Student Management</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../libs/css/w3.css">
<link rel="stylesheet" href="../../libs/css/w3-theme-blue-grey.css">
<link rel='stylesheet' href='../../libs/css/css?family=Open+Sans'>
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<link rel="stylesheet" href="../../libs/css/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
<link href="../../libs/css/font-awesome.min.css" rel="stylesheet">

<link rel="icon" type="image/png" href="../../img/images/wd.png"/>
 
  <!-- For Multi Form -->
<!--Bon	<link rel="stylesheet" href="../../libs/css/reset.min.css"> 
	<link rel="stylesheet" href="../../libs/css/style.css?ver=2001" type="text/css">
Bon-->
  	<!--<link rel="stylesheet" href="../../libs/css/style-msform.css?v=<?php echo filemtime('style-msform.css'); ?>" type="text/css">-->
    <link rel="stylesheet" href="../../libs/css/style-msform.css?v=0214i" type="text/css">
    
    	<!-- According-Form-->
      <!--<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>-->
      <link rel="stylesheet" href="../../libs/css/style-according.css?v=0228i" type="text/css">
      
      




<link rel="stylesheet" href="src/calendar.css">
</head>

<style>
html,body,h1,h2,h3,h4,h5 {	
}
header{ background: url(../../img/head/headerv.jpg);}
</style>

    <style type="text/css">
/*        html {
            font: 500 14px "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #333;
            height: 100%;
        }

        body {
            height: 100%;
            margin: 0;
        } */

        a {
            text-decoration: none;
        }

        ul,
        ol,
        li {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        p {
            margin: 0;
        }

/*        input {
            margin: 10px 0;
            height: 28px;
            width: 200px;
            padding: 0 6px;
            border: 1px solid #ccc;
            outline: none;*/
        }

    </style>




<body class="w3-theme-l5">

    <!-- Navbar [S] ## Navbar [S] ## Navbar [S] ## Navbar [S] ## Navbar [S] ## Navbar [S] ## Navbar [S] -->
    <div class="w3-top">
        <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
            <!--Some Icon-->
            <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
                <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
            </li>
            <!--Home Icon-->
            <li><a href="../../index.php" class="w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i></a></li>
            <!--Student Icon-->
            <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="Stusent Management" onclick="w3_open()"><i class="fa fa-group"></i></a></li>
            <!--Report Icon-->
            <li class="w3-hide-small"><a href="../../ui_connect/Report/Report.php" class="w3-padding-large w3-hover-white" title="Report"><i class="fa fa-bar-chart-o"></i></a></li>
            <!--Report Icon-->
            <li class="w3-hide-small"><a href="../../ui_connect/Email_Management/Email_Management.php" class="w3-padding-large w3-hover-white" title="E-mail Management"><i class="fa fa-envelope"></i></a></li>
            <!-- Activity Icon-->
            <li class="w3-hide-small w3-dropdown-hover"><a href="../../ui_connect/activity_management/activity.php" class="w3-padding-large w3-hover-white" title="Events Management"><i class="fa fa-calendar"></i></a>
                <div class="w3-dropdown-content w3-white w3-card-4" style="font-size: 17px;">
                    <!--PHP Code here for the notifications-->
                    <a href="../../ui_connect/activity_management/activity.php" >Activities</a>
                    <a href="#">Courses</a>
                    <a href="../../ui_connect/activity_management/presentation.php">Presentation</a>
                </div>
            </li>
            <!-- Notification Icon-->
            <li class="w3-hide-small w3-dropdown-hover "><a href="#" class="w3-padding-large w3-hover-white" title="Notifications"><i class="fa fa-bullhorn"></i><span class="w3-badge w3-right w3-small w3-green">3</span></a>     
                <div class="w3-dropdown-content w3-white w3-card-4"style="font-size: 17px;">
                    <!--PHP Code here for the notifications-->
                    <a href="#">Notification 1</a>
                    <a href="#">Notification 2</a>
                    <a href="#">Notification 3</a>
                </div>
            </li>
            <!--Account Ask Bon to Help-->
            <li class=" w3-right w3-dropdown-hover  ">
                <!--<a href="#" class=" w3-hide-small w3-padding-large w3-hover-white w3-avatar" title=""><img src="img/Avatar/boy.png" alt="Avatar" width="106" height="102" class="w3-circle" style="height:25px;width:25px"></img></a>-->
                <h6 class=" w3-hover usernavh6 w3-username" >  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; <img  src="../../img/Avatar/boy.png"  width="24" height="24" title="<?php echo $userRow['full_name'];?>"> <?php echo $userRow[ 'full_name' ];?> &nbsp; </h6>
                <!--Drop Down Menu for Account-->
                <div class="w3-dropdown-content w3-white w3-card-4 ">
                    <!--PHP Code here for the username to show-->
                    <a style="font-size: 16px;" href="../../ui_connect/login/register.php">Add a user </a>
                    <a style="font-size: 16px;" href="../../ui_connect/login/update.php">Update a user</a>
                    <a style="font-size: 16px;" href="../../ui_connect/login/function/func_logout.php?logout">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                </div>
            </li>
        </ul>
    </div>
    <!-- Navbar [E] ## Navbar [E] ## Navbar [E] ## Navbar [E] ## Navbar [E] ## Navbar [E] ## Navbar [E] -->
    
    <!-- Navbar on Small Screens [S] ### Navbar on Small Screens [S] ### Navbar on Small Screens [S] ### Navbar on Small Screens [S] -->
    <div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
      <ul class="w3-navbar w3-left-align w3-large w3-theme">
          <li><a class="w3-padding-large" href="#">Student Management</a></li>
          <li><a class="w3-padding-large" href="../../ui_connect/Report/Report.php">Report</a></li>
          <li><a class="w3-padding-large" href="../../ui_connect/Email_Management/Email_Management.php">E-mail Management</a></li>
          <li ><a class="w3-padding-large " href="../../ui_connect/my_profile/my_profile.php">My Profile</a></li>
      </ul>
    </div> 
		<!-- Navbar on Small Screens [E] ### Navbar on Small Screens [E] ### Navbar on Small Screens [E] ### Navbar on Small Screens [E] -->

    <!-- Navigation II [S] ## Navigation II [S] ## Navigation II [S] ## Navigation II [S] ## Navigation II [S] ## Navigation II [S] -->
		<nav class="w3-sidenav w3-white w3-animate-left" style="display:none;z-index:5" id="mySidenav">
        	<a href="javascript:void(0)" onclick="w3_close()" class="w3-closenav w3-large">Close &times;</a>
          <a onclick="document.getElementById('id01').style.display='block', w3_close()" ><i class="fa fa-plus w3-margin-right"></i> Create New</a>
          <a href="#allRecent" onclick="w3_close()"><i class="fa fa-globe w3-margin-right"></i> All</a>
          <a href="#onProcesss" onclick="w3_close()"><i class="fa fa-address-book w3-margin-right"></i> On Process</a>
          <a href="#waitingOnBoard" onclick="w3_close()"><i class="fa fa-thumbs-up w3-margin-right"></i> Waiting on Board</a>
          <a href="#reject" onclick="w3_close()"><i class="fa fa-ban w3-margin-right"></i> Reject</a>
          <a href="#trainee" onclick="w3_close()"><i class="fa fa-id-card w3-margin-right"></i>Trainee</a>
          <a href="#oldTrainee" onclick="w3_close()"><i class="fa fa-list w3-margin-right"></i>Old Trainee</a>
    </nav>
    <!-- Navigation II [E] ## Navigation II [E] ## Navigation II [E] ## Navigation II [E] ## Navigation II [E] ## Navigation II [E] -->
        
        <div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay">
        </div>
        
         
        <div class="w3-container">

          <div id="id01" class="w3-modal">
            <?php include 'multiple-step-form-insert.php' ?></div>
          <div id="stu-edit" class="w3-modal">
             </div>
        </div>
        <!-- Muti Step Form for Update [E] ## Muti Step Form for Update [E] ## Muti Step Form for Update [E]  -->
                    
        
<!--		</div> -->
        

	<!-- Page Container -->
  <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">   

    <!-- The Grid -->
    <div class="w3-row"> 
            
            
      <!-- Header -->
      <header class="w3-container w3-theme w3-padding" id="myHeader"> 

        <!-- Navigation II--> 
        <div class="w3-left">      
        <span class="w3-opennav w3-xxlarge" onclick="w3_open()">&#9776;</span>  
        </div>         
        <!--<i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-opennav"></i> -->
        <div class="w3-left">
            <h4>&nbsp;</h4>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <h4>Welcome to ..            </h4>
            <h1 class="w3-xxxlarge w3-animate-bottom ">Student Management System            </h1>
            <p><!--<div class="w3-padding-32">
                  <button class="w3-btn w3-xlarge w3-dark-grey w3-hover-light-grey" onclick="#" style="font-weight:900;">ห้ามกดเด็ดขาด</button>
              </div>-->        </p>
          
          <div class="w3-container">
          <a class="w3-button w3-xlarge w3-teal w3-card-4"> &nbsp;+&nbsp; </a>  
    	  </div>
        </div>
      </header>
      
    <!-- End The Grid -->
    </div>
  <!-- End Page Container -->
  </div>
  
  
           
      
    
      
      
    <!-- Filter Table All -->     
    <div id="allRecent">
    	<?php include ("all.php") ?>
    </div>
    <!-- Filter Table Onprocess -->
    <div id="onProcesss">
    	<?php include ("on_process_student.php") ?>
    </div>
    <!-- Filter Table Waiting on Board -->
    <div id="waitingOnBoard">
    	<?php include 'waiting_on_board.php' ?>
    </div>
    <!-- Filter Table Trainee -->
    <div id="trainee">
    	<?php include 'trainee.php' ?>
    </div>
    <!-- Filter Table End Trainee -->
    <div id="oldTrainee">
    	<?php include 'end_trainee.php' ?>	
    </div>
	<div id="reject">
 		<?php include 'reject.php' ?>	
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
    </div>
    
    <!--Calendar-->
    <div id="wdS"></div>
    <div id="wdE"></div> 
    <div id="wexS"></div>
    <div id="wexE"></div>
    
	
    
    
    
    
    
    
    
    
    
<!-- Footer -->
    <footer class="w3-container w3-theme-d3 w3-padding-16">
      <h5>Footer</h5>
    </footer>
    
    <footer class="w3-container w3-theme-d5">
       <p>By <a href="http://www.facebook.com/Bon.KP" target="_blank">บอนไง จะใครล่ะ ^^</a></p>
    </footer>
 
<?php include ("js-script/js-script.php"); ?>    

</body>
</html>

<?php
mysqli_free_result($countrySet);


mysqli_free_result($degreeSet);

mysqli_free_result($majorSet);

mysqli_free_result($resumeSet);

mysqli_free_result($RecordsetStudentInfo);

mysqli_free_result($titleSet);

mysqli_free_result($statusSet);

mysqli_free_result($universitySet);

mysqli_free_result($educationSet);

mysqli_free_result($collageSet);
  
mysqli_free_result($instituteSet);

/*mysqli_free_result($studentSet);*/

mysqli_free_result($stu_addressSet);

mysqli_free_result($stu_relationshipSet);

mysqli_free_result($ed_bgSet);

mysqli_free_result($appSet);

mysqli_free_result($videoSet);

mysqli_free_result($transcriptSet);

mysqli_free_result($visaSet);

mysqli_free_result($other_docSet);

//mysqli_free_result($Recordset1);

mysqli_free_result($stu_contactSet);

mysqli_free_result($secSet);


?>

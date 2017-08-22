
<?php 
    //Database Connection
    require_once '../../../db_connect/dbconnection.php';

    //Session Query
    //require_once '../../../ui_connect/login/query/session.php';

?>
<?php require_once('../../../Connections/MyConnect.php'); ?>
<?php include ("stu-insert-reccordset.php"); ?>
<?php require_once('fn-upload.inc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Student Inserting</title>
<link rel="icon" type="image/png" href="../../../img/images/wd.png"/>
<link rel="stylesheet" href="../../../libs/css/w3.css">
<link rel="stylesheet" href="../../../libs/css/w3-theme-blue-grey.css">
<link rel='stylesheet' href='../../../libs/css/css?family=Open+Sans'>
<!--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<link rel="stylesheet" href="../../../libs/css/font-awesome-4.7.0/css/font-awesome.min.css?v=<?php echo filemtime('font-awesome.min.css'); ?>" type="text/css"> 
<link href="../../../SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />




<style> 
  html {
  background : ;
    
  }  

header{ background: url(../../../img/head/headerv.jpg);}
</style>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 61px;
	top: 4314px;
	width: 95px;
	height: 36px;
	z-index: 1;
}
</style>
<link href="../../../libs/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<title>Index</title>
<script src="../../../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>

	<!-- customselect[]-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src='../../../libs/jQuery-Customselect/src/jquery-customselect.js'></script>
    <link href='../../../libs/jQuery-Customselect/src/jquery-customselect.css?v=<55' rel='stylesheet' />
    
    <!-- alert-->
<script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">


    <!--<link href='../../../libs/jQuery-Customselect/src/jquery-customselect.css?v=<?php echo filemtime('jquery-customselect.css'); ?>' rel='stylesheet' />-->
    
    <!-- ms-form-->
    <link href="../../../libs/css/style-fullform.css?v=11" rel="stylesheet" type="text/css" />

  <!-- bootstrap-select-->
  <!--<link rel="stylesheet" href="../../../libs/bootstrap-select/dist/css/bootstrap.min.css">  
  <link rel="stylesheet" href="../../../libs/bootstrap-select/dist/css/bootstrap-select.css?v=<?php echo filemtime('bootstrap-select.css'); ?>"> 
  <script src="../../../libs/bootstrap-select/dist/js/jquery.min.js"></script> 
  <script src="../../../libs/bootstrap-select/dist/js/bootstrap.min.js"></script>
  <script src="../../../libs/bootstrap-select/dist/js/bootstrap-select.js"></script> -->

    <!-- Seach in Select-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"> </script>
    
</head>

<body>

    <!-- Navbar [S] ## Navbar [S] ## Navbar [S] ## Navbar [S] ## Navbar [S] ## Navbar [S] ## Navbar [S] -->
    <div class="w3-top">
        <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
            <!--Some Icon-->
            <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
                <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
            </li>
            <!--Home Icon-->
            <li><a href="../../../index.php" class="w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i></a></li>
            <!--Student Icon-->
            <li class="w3-hide-small"><a href="../../../ui_connect/student_management/Student_Management.php" class="w3-padding-large w3-hover-white" title="Stusent Management" ><i class="fa fa-group"></i></a></li>
            <!--Report Icon-->
            <li class="w3-hide-small"><a href="../../../ui_connect/Report/Report.php" class="w3-padding-large w3-hover-white" title="Report"><i class="fa fa-bar-chart-o"></i></a></li>
            <!--Report Icon-->
            <li class="w3-hide-small"><a href="../../../ui_connect/Email_Management/Email_Management.php" class="w3-padding-large w3-hover-white" title="E-mail Management"><i class="fa fa-envelope"></i></a></li>
            <!-- Activity Icon-->
            <li class="w3-hide-small w3-dropdown-hover"><a href="../../../ui_connect/activity_management/activity.php" class="w3-padding-large w3-hover-white" title="Events Management"><i class="fa fa-calendar"></i></a>
                <div class="w3-dropdown-content w3-white w3-card-4" style="font-size: 17px;">
                    <!--PHP Code here for the notifications-->
                    <a href="../../../ui_connect/activity_management/activity.php" >Activities</a>
                    <a href="#">Courses</a>
                    <a href="../../../ui_connect/activity_management/presentation.php">Presentation</a>
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
                <h6 class=" w3-hover usernavh6 w3-username" >  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; <img  src="../../../img/Avatar/boy.png"  width="24" height="24" title="<?php echo $userRow['full_name'];?>"> <?php echo $userRow[ 'full_name' ];?> &nbsp; </h6>
                <!--Drop Down Menu for Account-->
                <div class="w3-dropdown-content w3-white w3-card-4 ">
                    <!--PHP Code here for the username to show-->
                    <a style="font-size: 16px;" href="../../../ui_connect/login/register.php">Add a user </a>
                    <a style="font-size: 16px;" href="../../../ui_connect/login/update.php">Update a user</a>
                    <a style="font-size: 16px;" href="../../../ui_connect/login/function/func_logout.php?logout">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                </div>
            </li>
        </ul>
    </div>
    <!-- Navbar [E] ## Navbar [E] ## Navbar [E] ## Navbar [E] ## Navbar [E] ## Navbar [E] ## Navbar [E] -->


<!-- Navbar --><!-- Navbar on small screens 
<div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
  <ul class="w3-navbar w3-left-align w3-large w3-theme">
    <li><a class="w3-padding-large" href="ui_connect/Student_Management/Student_Management.php">Stusent Management</a></li>
    <li><a class="w3-padding-large" href="ui_connect/Report/Report.php">Report</a></li>
    <li><a class="w3-padding-large" href="ui_connect/Email_Management/Email_Management.php">E-mail Management</a></li>
    <li><a class="w3-padding-large" href="ui_connect/my_profile/my_profile.php">My Profile</a></li>
  </ul>
</div>  -->


        <?php 
            //require_once '../../../web_elements/nav_bar.php';?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:60px">   
	<!-- The Grid -->
  <div class="w3-row"> 
		
            <!-- Header -->
            <header class="w3-container w3-theme w3-padding w3-round w3-opacity-min" id="myHeader">

                    <h4 class="w3-animate-left">Full Process of Create New</h4>
                <div class="w3-center">
                    <h1 class="w3-xxxlarge w3-animate-right" style="text-shadow:3px 2px 0 #444" >Insert All Data</h1>

                </div>
                
            </header>
    <p>&nbsp;</p>

    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="fullform" enctype="multipart/form-data">

      <div id="TabbedPanels1" class="TabbedPanels">
        <ul class="TabbedPanelsTabGroup">
          <li class="TabbedPanelsTab" tabindex="0">Sudent Infomation</li>
          <li class="TabbedPanelsTab" tabindex="0">Trainee Infomation</li>
          <li class="TabbedPanelsTab" tabindex="0">Old Trainee Infomation</li>
        </ul>
        <div class="TabbedPanelsContentGroup">
          <div class="TabbedPanelsContent">
              <?php include 'stu-insert-all/tabI.php' ?>
            <p>&nbsp;</p>
          </div>
          <div class="TabbedPanelsContent">
              <?php include 'stu-insert-all/tabII.php' ?>
            <p>&nbsp;</p>
          </div>
          <div class="TabbedPanelsContent">
              <?php include 'stu-insert-all/tabIII.php' ?>
          </div>
              
        </div>
      </div>
      <p>&nbsp;</p>


        <input type="submit" name="submit" class="action-button" value="Submit" />
        <input type="hidden" name="MM_insert" class="submit action-button" value="fullform" />
        <input type="hidden" name="MM_insert" value="form1" />
    </form>

    <p><!-- Left Column --><!-- Right Column --><!-- End The Grid -->  </p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
    

  
<!-- End Page Container -->
</div>

  <!-- major-add [S]-->
  <div id="major-addd" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('major-add').style.display='none'" 
        class="w3-button w3-large w3-display-topright" style="cursor: pointer">&times;&nbsp</span>
        <h3>Reccord New Majorrrr</h3>
      </header>
      <div class="w3-container">


                         <input type="text" name="education_id" value="" size="32" />

      </div>
    </div>
  </div>
  <!-- major-add [E]-->

<script>
// Accordion 
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}
// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>




      <script>
      $(function() {
        $("#majorSelect").customselect();
      });
      $(function() {
        $("#standard").customselect();
      });
      </script>

<?php 
  //include '../js-script/full_js-script.php';
?>

    <!-- for Institute University and Collage  -->
    <script>  
      function getUniversity(val) {
          
          $.ajax({
          type: "POST",
          url: "stu-insert-all/get_university.php",
          data:'ins_id='+val,
          success: function(data){
            $("#uniSelect").html(data);
            
          }
          }); 

        }
      function getUniversityii(val) {
          
          $.ajax({
          type: "POST",
          url: "stu-insert-all/get_collage.php",
          data:'ins_id='+val,
          success: function(data){
            $("#collageSelect").html(data);
          }
          });
      }
          
        function selectCountry(val) {
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
        }
    </script>

    <script type="text/javascript">

    </script>

 


  <?php require_once '../../../web_elements/footer.php'; ?> 

        <?php
            //Script for toggling menu bar on small screen
            require_once '../../../web_elements/script_menu.php';?>

</body>
</html> 
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
<!-- Navbar --><!-- Navbar on small screens -->
<div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
  <ul class="w3-navbar w3-left-align w3-large w3-theme">
    <li><a class="w3-padding-large" href="ui_connect/Student_Management/Student_Management.php">Stusent Management</a></li>
    <li><a class="w3-padding-large" href="ui_connect/Report/Report.php">Report</a></li>
    <li><a class="w3-padding-large" href="ui_connect/Email_Management/Email_Management.php">E-mail Management</a></li>
    <li><a class="w3-padding-large" href="ui_connect/my_profile/my_profile.php">My Profile</a></li>
  </ul>
</div> 
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">   
	<!-- The Grid -->
  <div class="w3-row"> 
		
        <!-- Header -->
	<header class="w3-container w3-theme w3-padding" id="myHeader">
 			<!--<i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-opennav"></i> -->
  			<div class="w3-center">
  				<h4>&nbsp;</h4>
  				<h1 class="w3-xxxlarge w3-animate-bottom">&nbsp;</h1>
    		<div class="w3-padding-32"></div>
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
  <div id="major-add" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('major-add').style.display='none'" 
        class="w3-button w3-large w3-display-topright" style="cursor: pointer">&times;&nbsp</span>
        <h3>Reccord New Major</h3>
      </header>
      <div class="w3-container">
        <p>Some text..</p>
        <p>Some text..</p>
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

 




</body>
</html> 
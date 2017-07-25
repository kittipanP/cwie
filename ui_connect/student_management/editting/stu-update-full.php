<?php require_once('../../../Connections/MyConnect.php'); ?>

<?php include 'stu-update-full/student-editController.php' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">
<title>Student Updatting</title>
</head>
<link rel="stylesheet" href="../../../libs/css/w3.css">
<link rel="stylesheet" href="../../../libs/css/w3-theme-blue-grey.css">
<link rel='stylesheet' href='../../../libs/css/css?family=Open+Sans'>
<!--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<link rel="stylesheet" href="../../../libs/css/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
<link href="../../../libs/css/font-awesome.min.css" rel="stylesheet">

<link rel="icon" type="image/png" href="../../../img/images/wd.png"/>

<link href="../../../SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<link href="../../../libs/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<title>Index</title>
<script src="../../../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>


      <!-- For  Form -->
      <link rel="stylesheet" href="../../../libs/css/style-fullform.css?v=0214i" type="text/css">

      <!-- According-Form-->
      <!--<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>-->
      <!--<link rel="stylesheet" href="../../libs/css/style-according.css?v=0228i" type="text/css">-->

  <!-- customselect[]-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src='../../../libs/jQuery-Customselect/src/jquery-customselect.js'></script>
    <link href='../../../libs/jQuery-Customselect/src/jquery-customselect.css?v=<55' rel='stylesheet' />


<style> 
  html {
  background : ;
    
  }  
</style>

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


<form action="<?php echo $editFormAction; ?>" method="post" name="form-update" id="fullform" enctype="multipart/form-data">
                   
      <div id="TabbedPanels1" class="TabbedPanels">
        <ul class="TabbedPanelsTabGroup">
          <li class="TabbedPanelsTab" tabindex="0">Sudent Infomation</li>
          <li class="TabbedPanelsTab" tabindex="0">Trainee Infomation</li>
          <li class="TabbedPanelsTab" tabindex="0">Old Trainee Infomation</li>
        </ul>


        <div class="TabbedPanelsContentGroup">
          <div class="TabbedPanelsContent">
              <?php include 'stu-update-full/tabI.php' ?>
            
            <p>&nbsp;</p>
          </div>
          <div class="TabbedPanelsContent">
              <?php include 'stu-update-full/tabII.php' ?>
            
            <p>&nbsp;</p>
          </div>
          <div class="TabbedPanelsContent">
              <?php include 'stu-update-full/tabIII.php' ?>
          </div>
        </div>
      </div>
      <p>&nbsp;</p>
         
                    <input type="submit" name="submit" class="action-button" value="Update record!!" />
                    <input type="hidden" name="MM_update" class="submit action-button" value="form-update" />
                    <input type="hidden" name="MM_update" value="form-update" />
                    <input type="hidden" name="scd_s_id" value="<?php echo $row_Recordset1_scd['scd_s_id'];?>" /> <!--do not need-->
                    <input type="hidden" name="s_id" value="<?php echo $row_Recordset1_stu['s_id'];?>" />
</form> 
<?php include "get_university.php";?>





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
              $thisMoota = $thisstu;
              echo "<meta http-equiv='refresh' content='url=get_university.php?this-stu=".$thisMoota."' />";
            ?>
  
<p>&nbsp;</p>

    <!-- for muti step form -->
    <script src='../../../libs/js/jquery.min.js'></script>
    <script src='../../../libs/js/jquery.easing.min.js'></script>
    
    <script src="../../../libs/js/index.js"></script>

  <!--for According-->
  <!--<script src="../../libs/js/According.js"></script> -->


  <!-- for Institute University and Collage -->
  <script>  

  function getUniversity(val, $thisstu) {
      
      $.ajax({
      type: "POST",
      url: "stu-update-full/get_university.php",
      data:'ins_id='+val,
      
      success: function(data){
        $("#uniSelect").html(data);
      }
      }); 
    }
  function getUniversityii(val) {
      
      $.ajax({
      type: "POST",
      url: "stu-update-full/get_collage.php",
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
  

</body>
</html>
<?php
mysqli_free_result($Recordset1_stu);

?>

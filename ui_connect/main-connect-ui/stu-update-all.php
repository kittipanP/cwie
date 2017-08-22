<?php 
       
    //Session Query
    require_once '../../ui_connect/login/query/session.php';
?>
<?php require_once('../../Connections/MyConnect.php'); ?>

<?php 

?>

<?php include ("../../ui_connect/student_management/editting/stu-update-full/student-editController.php"); ?>
<?php //require_once('fn-upload.inc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xht305ml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">
<title>Full Process for Inserting</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="../../img/images/wd.png"/>

<link rel="stylesheet" href="../../libs/css/w3.css">
<link rel="stylesheet" href="../../libs/css/w3-theme-blue-grey.css">
<link rel='stylesheet' href='../../libs/css/css?family=Open+Sans'>
<!--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<link rel="stylesheet" href="../../libs/css/font-awesome-4.7.0/css/font-awesome.min.css?v=<?php echo filemtime('font-awesome.min.css'); ?>" type="text/css"> 
<link href="../../SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />

 


      <!-- style full form-->
      <link rel="stylesheet" href="../../libs/css/style-fullform.css?v=0214i" type="text/css">

      
      <!-- style add form-->
      <link rel="stylesheet" href="../../libs/css/style-addform.css?v=0214i" type="text/css">





<link href="../../libs/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<title>Index</title>
<script src="../../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>

  <!-- customselect[]-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src='../../libs/jQuery-Customselect/src/jquery-customselect.js'></script>
    <link href='../../libs/jQuery-Customselect/src/jquery-customselect.css?v=<55' rel='stylesheet' />
    
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


  <!-- bootstrap-select --> 


  <link rel="stylesheet" href="../../libs/bootstrap-select/dist/css/bootstrap.min.css?v=<?php echo filemtime('bootstrap.min.css'); ?>"> 
  <link rel="stylesheet" href="../../libs/bootstrap-select/dist/css/bootstrap-select.css?v=<?php echo filemtime('bootstrap-select.css'); ?>"> 
  <script src="../../libs/bootstrap-select/dist/js/jquery.min.js"></script>
  <script src="../../libs/bootstrap-select/dist/js/bootstrap.min.js"></script>
  <script src="../../libs/bootstrap-select/dist/js/bootstrap-select.js"></script> 

<!--
  <script src="../../libs/bootstrap-select/dist/js/jquery.min.js"></script>
  <script src="../../libs/bootstrap-select/dist/js/bootstrap.min.js"></script>
  <script src="../../libs/bootstrap-select/dist/js/bootstrap-select.js"></script> -->

</head>

<!-- hearder style -->
<style>
html,body,h1,h2,h3,h4,h5 {  
}
header{ background: url(../../img/head/headerv.jpg);}
</style>

    


<body class="w3-theme-l5">

        <!-- Nav Header -->
        <?php 
            require_once '../../web_elements/back-stu-page-nav.php';
        ?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:60px;">   
    <!-- The Grid -->
    <div class="w3-row"> 

            <!-- Header -->
            <header class="w3-container w3-theme w3-padding w3-round w3-opacity-min" id="myHeader">

                    <h4 class="w3-animate-left">Welcome To... </h4>
                <div class="w3-center">
                    <h1 class="w3-xxxlarge w3-animate-right" style="text-shadow:3px 2px 0 #444" >Full Process for Updatting</h1>

                </div>
                
            </header>


    

<!-- Filter Table Trainee -->
<div id="">
<?php //include '../../ui_connect/student_management/split-by-status/all-rec-list-info.php' ?>
</div>







<p>&nbsp;</p>

<form action="<?php echo $editFormAction; ?>" method="post" name="form-update" id="fullform" enctype="multipart/form-data">
                   
      <div id="TabbedPanels1" class="TabbedPanels">
        <ul class="TabbedPanelsTabGroup">
          <li class="TabbedPanelsTab" tabindex="0">Sudent Information</li>
          <li class="TabbedPanelsTab" tabindex="0">Trainee Information</li>
          <li class="TabbedPanelsTab" tabindex="0">Evaluation Score</li>
          <li class="TabbedPanelsTab" tabindex="0">Files Uplode</li>
        </ul>

        <div class="TabbedPanelsContentGroup">
          <div class="TabbedPanelsContent">
              <?php include '../../ui_connect/student_management/editting/stu-update-full/tabI.php' ?>
            <p>&nbsp;</p>
          </div>
          <div class="TabbedPanelsContent">
              <?php include '../../ui_connect/student_management/editting/stu-update-full/tabII.php' ?>
            <p>&nbsp;</p>
          </div>
          <div class="TabbedPanelsContent">
              <?php include '../../ui_connect/student_management/editting/stu-update-full/tabIII.php' ?>
          </div>
          <div class="TabbedPanelsContent">
              <?php include '../../ui_connect/student_management/editting/stu-update-full/tabIV.php' ?>
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
<?php //include "get_university.php";?>



    <p><!-- Left Column --><!-- Right Column --><!-- End The Grid -->  </p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
    
<!-- End Grid -->
    </div> 

<!-- End The Page Container -->
</div>
  
<!-- End Page Container -->
</div>


<!-- ##########  div add a new row to database [S] ########## -->
  <!-- major-add [S]-->
  <div id="major-add" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4" style="max-width:600px " >
      <header class="w3-container w3-teal" style="background: url(../../img/head/headervii.jpg)"> 
        <span onclick="document.getElementById('major-add').style.display='none'" 
        class="w3-button w3-large w3-display-topright" style="cursor: pointer">&times;&nbsp</span>
        <h3>Reccord New Major</h3>
      </header>

              <?php include '../../ui_connect/student_management/insert/add-new-row/form-insert/add-major-form.php' ?>   

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
          <!-- for Explanation && Example-->

      </div>           

    </div>
  </div>
  <!-- major-add [E]-->


  <!--  institute-add [S]-->
  <div id="ins-add" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4" style="max-width:600px ">
      <header class="w3-container w3-teal" style="background: url(../../img/head/headervii.jpg)"> 
        <span onclick="document.getElementById('ins-add').style.display='none'" 
        class="w3-button w3-large w3-display-topright" style="cursor: pointer">&times;&nbsp</span>
        <h3>Reccord New Institute</h3>
      </header>

              <?php include '../../ui_connect/student_management/insert/add-new-row/form-insert/add-ins-form.php' ?>              

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
          <!-- for Explanation && Example-->

      </div> 
            
    </div>
  </div>
  <!-- institute-add [E]-->


  <!--  language-add [S]-->
  <div id="lg-add" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4" style="max-width:600px ">
      <header class="w3-container w3-teal" style="background: url(../../img/head/headervii.jpg)"> 
        <span onclick="document.getElementById('lg-add').style.display='none'" 
        class="w3-button w3-large w3-display-topright" style="cursor: pointer">&times;&nbsp</span>
        <h3>Reccord New Language</h3>
      </header>

              <?php include '../../ui_connect/student_management/insert/add-new-row/form-insert/add-lg-form.php' ?>              

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
          <!-- for Explanation && Example-->

      </div> 
            
    </div>
  </div>
  <!-- Language-add [E]-->


  <!--  Supervisor-add [S]-->
  <div id="spv-add" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4" style="max-width:600px ">
      <header class="w3-container w3-teal" style="background: url(../../img/head/headervii.jpg)"> 
        <span onclick="document.getElementById('spv-add').style.display='none'" 
        class="w3-button w3-large w3-display-topright" style="cursor: pointer">&times;&nbsp</span>
        <h3>Reccord New Supervisor</h3>
      </header>

              <?php include '../../ui_connect/student_management/insert/add-new-row/form-insert/add-spv-form.php' ?>              

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
          <!-- for Explanation && Example-->

      </div> 
            
    </div>
  </div>
  <!-- Supervisor-add [E]-->


  <!--  Transportation Line - add [S]-->
  <div id="tsp-add" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4" style="max-width:600px ">
      <header class="w3-container w3-teal" style="background: url(../../img/head/headervii.jpg)"> 
        <span onclick="document.getElementById('tsp-add').style.display='none'" 
        class="w3-button w3-large w3-display-topright" style="cursor: pointer">&times;&nbsp</span>
        <h3>Reccord New Transportation Line</h3>
      </header>

              <?php include '../../ui_connect/student_management/insert/add-new-row/form-insert/add-tsp-form.php' ?>              

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
          <!-- for Explanation && Example-->

      </div> 
            
    </div>
  </div>
  <!-- Transportation Line - add [E]-->


  <!-- Bank Branch -add [S]-->
  <div id="bch-add" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4" style="max-width:600px ">
      <header class="w3-container w3-teal" style="background: url(../../img/head/headervii.jpg)"> 
        <span onclick="document.getElementById('bch-add').style.display='none'" 
        class="w3-button w3-large w3-display-topright" style="cursor: pointer">&times;&nbsp</span>
        <h3>Reccord New Bank Branch</h3>
      </header>

              <?php include '../../ui_connect/student_management/insert/add-new-row/form-insert/add-bch-form.php' ?>              

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
          <!-- for Explanation && Example-->

      </div> 
            
    </div>
  </div>
  <!-- Bank Branch -add [E]-->


  <!--  Department-add [S]-->
  <div id="dep-add" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4" style="max-width:600px ">
      <header class="w3-container w3-teal" style="background: url(../../img/head/headervii.jpg)"> 
        <span onclick="document.getElementById('dep-add').style.display='none'" 
        class="w3-button w3-large w3-display-topright" style="cursor: pointer">&times;&nbsp</span>
        <h3>Reccord New Department</h3>
      </header>

              <?php include '../../ui_connect/student_management/insert/add-new-row/form-insert/add-dep-form.php' ?>              

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
          <!-- for Explanation && Example-->

      </div> 
            
    </div>
  </div>
  <!-- Department-add [E]-->


<!-- ##########  div add a new row to database [E] ########## -->




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

 


    


<?php 
    //Footer
    require_once '../../web_elements/footer.php'; 
?> 

</body>
</html> 

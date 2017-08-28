<?php
  //require_once('../../../Connections/MyConnect.php');

  //include ("../../../ui_connect/student_management/insert/stu-insert-reccordset.php"); 


  //add-new-row-sql
 /* require_once('../../../ui_connect/student_management/insert/add-new-row/sql/add-major-sql.php'); 
  require_once('../../../ui_connect/student_management/insert/add-new-row/sql/add-bch-sql.php'); 
  require_once('../../../ui_connect/student_management/insert/add-new-row/sql/add-dep-sql.php'); 
  require_once('../../../ui_connect/student_management/insert/add-new-row/sql/add-ins-sql.php'); 
  require_once('../../../ui_connect/student_management/insert/add-new-row/sql/add-lg-sql.php'); 
  require_once('../../../ui_connect/student_management/insert/add-new-row/sql/add-spv-sql.php'); 
  require_once('../../../ui_connect/student_management/insert/add-new-row/sql/add-tsp-sql.php'); 
*/
?>

  <!-- bootstrap-select --> 
  <link rel="stylesheet" href="../../../libs/bootstrap-select/dist/css/bootstrap.min.css?v=<?php echo filemtime('bootstrap.min.css'); ?>"> 
  <link rel="stylesheet" href="../../../libs/bootstrap-select/dist/css/bootstrap-select.css?v=<?php echo filemtime('bootstrap-select.css'); ?>"> 
  <script src="../../../libs/bootstrap-select/dist/js/jquery.min.js"></script>
  <script src="../../../libs/bootstrap-select/dist/js/bootstrap.min.js"></script>
  <script src="../../../libs/bootstrap-select/dist/js/bootstrap-select.js"></script> 

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>



<div class="w3-container">
  <div class="w3-center">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    
  <h2>DATABASE ELEMENTS MANAGEMENT</h2>
  <p class="w3-center"><em>" Addding &nbsp; a &nbsp; new &nbsp; row &nbsp; to &nbsp; database , &nbsp; editting &nbsp; and &nbsp; deletting "</em></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>

  <div class="w3-row">
    <a href="javascript:void(0)" onclick="openCity(event, 'xxx1');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Suppervisor Information</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'xxx2');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Major Information</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'xxx3');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Institute Information</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'xxx4');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Language Information</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'xxx5');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Department Information</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'xxx6');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Transportation Information</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'xxx7');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Bank Branch Information</div>
    </a>
  </div>

  <div id="xxx1" class="w3-container city" style="display:none">
    <h2>Suppervisor Information</h2>
    <p>xxx1 xxxxxxxxxxxxxxxxxxxxxxxxx.</p>


                  <?php require_once '../../../ui_connect/student_management/printf/addNew-printf/printf-spv.php'; ?>


  </div>

  <div id="xxx2" class="w3-container city" style="display:none">
    <h2>Major Information</h2>
    <p>xxx2 xxxxxxxxxxxxxxxxxxxxxxxxx.</p> 
                      

                  <?php require_once '../../../ui_connect/student_management/printf/addNew-printf/printf-major.php'; ?>
                      
                      <!--
                      <a onclick="document.getElementById('major-add').style.display='block'" class="w3-button " style="text-decoration:none; cursor: pointer;" ><i>Add New Major</i>&nbsp;&nbsp;<img src="../../img/icon/plus-icon.png" width="19" height="19" /></a>
                      -->
                      </div>
  </div>

  <div id="xxx3" class="w3-container city" style="display:none">
    <h2>Institute Information</h2>
    <p>xxx3 xxxxxxxxxxxxxxxxxxxxxxxxx.</p>

                  <?php require_once '../../../ui_connect/student_management/printf/addNew-printf/printf-ins.php'; ?>
  </div>
  <div id="xxx4" class="w3-container city" style="display:none">
    <h2>Language Information</h2>
    <p>xxx4 xxxxxxxxxxxxxxxxxxxxxxxxx.</p>

                  <?php require_once '../../../ui_connect/student_management/printf/addNew-printf/printf-lg.php'; ?>          
  </div>
  <div id="xxx5" class="w3-container city" style="display:none">
    <h2>Department Information</h2>
    <p>xxx5 xxxxxxxxxxxxxxxxxxxxxxxxx.</p>

                  <?php require_once '../../../ui_connect/student_management/printf/addNew-printf/printf-dep.php'; ?>
  </div>
  <div id="xxx6" class="w3-container city" style="display:none">
    <h2>Transportation Information</h2>
    <p>xxx6 xxxxxxxxxxxxxxxxxxxxxxxxx.</p>

                  <?php require_once '../../../ui_connect/student_management/printf/addNew-printf/printf-tsp.php'; ?>
  </div>
  <div id="xxx7" class="w3-container city" style="display:none">
    <h2>Bank Branch Information</h2>
    <p>xxx7 xxxxxxxxxxxxxxxxxxxxxxxxx.</p>

                  <?php require_once '../../../ui_connect/student_management/printf/addNew-printf/printf-bch.php'; ?>
  </div>
</div>




<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-border-red";
}
</script>




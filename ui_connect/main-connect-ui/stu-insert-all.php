<?php 
       
    //Session Query
    require_once '../../ui_connect/login/query/session.php';
?>
<?php require_once('../../Connections/MyConnect.php'); ?>

<?php 

?>

<?php include ("../../ui_connect/student_management/insert/stu-insert-reccordset.php"); ?>
<?php //require_once('fn-upload.inc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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





<link href="../../libs/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<title>Index</title>
<script src="../../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>

  <!-- customselect[]-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src='../../libs/jQuery-Customselect/src/jquery-customselect.js'></script>
    <link href='../../libs/jQuery-Customselect/src/jquery-customselect.css?v=<55' rel='stylesheet' />
    
    <!-- alert-sweetAlert2-->   
    <link rel="stylesheet" href="../../libs/sweetAlert2/assets/bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="../../libs/sweetAlert2/assets/swal2/sweetalert2.min.css" type="text/css" />


    <!--<link href='../../../libs/jQuery-Customselect/src/jquery-customselect.css?v=<?php echo filemtime('jquery-customselect.css'); ?>' rel='stylesheet' />-->
    
    <!-- ms-form-->
    <link href="../../../libs/css/style-fullform.css?v=11" rel="stylesheet" type="text/css" />


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


<!-- calendar-style -->
<link rel="stylesheet" href="../../ui_connect/student_management/src/calendar.css">


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
                    <h1 class="w3-xxxlarge w3-animate-right" style="text-shadow:3px 2px 0 #444" >Full Process for Inserting</h1>

                </div>
                
            </header>


    

<!-- Filter Table Trainee -->
<div id="">
<?php //include '../../ui_connect/student_management/split-by-status/all-rec-list-info.php' ?>
</div>







<p>&nbsp;</p>

    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="fullform" enctype="multipart/form-data">

      <div id="TabbedPanels1" class="TabbedPanels">
        <ul class="TabbedPanelsTabGroup">
          <li class="TabbedPanelsTab" tabindex="0">Sudent Information</li>
          <li class="TabbedPanelsTab" tabindex="0">Trainee Information</li>
          <li class="TabbedPanelsTab" tabindex="0">Evaluation Score</li>
          <li class="TabbedPanelsTab" tabindex="0">Files Uplode</li>
        </ul>
        <div class="TabbedPanelsContentGroup">
          <div class="TabbedPanelsContent">
              <?php include '../../ui_connect/student_management/insert/stu-insert-all/tabI.php' ?>
            <p>&nbsp;</p>
          </div>
          <div class="TabbedPanelsContent">
              <?php include '../../ui_connect/student_management/insert/stu-insert-all/tabII.php' ?>
            <p>&nbsp;</p>
          </div>
          <div class="TabbedPanelsContent">
              <?php include '../../ui_connect/student_management/insert/stu-insert-all/tabIII.php' ?>
          </div>
          <div class="TabbedPanelsContent">
              <?php include '../../ui_connect/student_management/insert/stu-insert-all/tabIV.php' ?>
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
    
<!-- End Grid -->
    </div> 

<!-- End The Page Container -->
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


    <div id="edbS"></div>
    <div id="edbE"></div> 
    <div id="wexS"></div>
    <div id="wexE"></div>
    <div id="wdS"></div>
    <div id="wdE"></div> 

    <!-- alert-sweetAlert2 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../libs/sweetAlert2/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../libs/sweetAlert2/assets/swal2/sweetalert2.min.js"></script>        
    <script>
      $(document).ready(function(){
        
        readProducts(); /* it will load products when document loads */
        
        $(document).on('click', '#delete_product', function(e){
          
          var productId = $(this).data('id');
          SwalDelete(productId);
          e.preventDefault();
        });
        
      });
      
      function SwalDelete(productId){
        
        swal({
          title: 'Are you sure?',
          text: "It will be deleted permanently!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!',
          showLoaderOnConfirm: true,
            
          preConfirm: function() {
            return new Promise(function(resolve) {
                 
               $.ajax({
                url: 'delete.php',
                type: 'POST',
                  data: 'delete='+productId,
                  dataType: 'json'
               })
               .done(function(response){
                swal('Deleted!', response.message, response.status);
              readProducts();
               })
               .fail(function(){
                swal('Oops...', 'Something went wrong with ajax !', 'error');
               });
            });
            },
          allowOutsideClick: false        
        }); 
        
      }
      
      function readProducts(){
        $('#load-products').load('read.php'); 
      }
      
    </script>


    

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

    <!-- # calendar #-->
<!--<script src="jquery-1.12.4.min.js"></script>-->
    <script src="../../ui_connect/student_management/src/calendar.js"></script> 
    <script>
        var now = new Date();
        var year = now.getFullYear();
        var month = now.getMonth() + 1;
        var date = now.getDate();


        var data = [{
            date: year + '-' + month + '-' + (date - 1),
            value: 'Yesterday'
        }, {
            date: year + '-' + month + '-' + date,
            value: 'Today'
        }, {
            date: new Date(year, month - 1, date + 1),
            value: 'Tomorrow'
        }, {
            date: new Date(year, 5, 2),
            value: 'BBBBB'
        }];

        // inline
        var $ca = $('#one').calendar({
            // view: 'month',
            width: 320,
            height: 320,
            // startWeek: 0,
            // selectedRang: [new Date(), null],
            data: data,
            date: new Date(2016, 9, 31),
            onSelected: function (view, date, data) {
                console.log('view:' + view)
                console.log('date:' + date)
                console.log('data:' + (data || '无'));
            },
            viewChange: function (view, y, m) {
                console.log(view, y, m)

            }
        });



        // picker -- education backgroind
        $('#edbS').calendar({
            trigger: '#dtedbS', 
            // offset: [0, 1],
            zIndex: 999,
            data: data,
            onSelected: function (view, date, data) {
                console.log('event: onSelected')
            },
            onClose: function (view, date, data) {
                console.log('event: onClose')
                console.log('view:' + view)
                console.log('date:' + date)
                console.log('data:' + (data || '无'));
            }
        });
        $('#edbE').calendar({
            trigger: '#dtedbE',
            // offset: [0, 1],
            zIndex: 999,
            data: data,
            onSelected: function (view, date, data) {
                console.log('event: onSelected')
            },
            onClose: function (view, date, data) {
                console.log('event: onClose')
                console.log('view:' + view)
                console.log('date:' + date)
                console.log('data:' + (data || '无'));
            }
        }); 

        //picker -- work experience
        $('#wexS').calendar({
            trigger: '#dtwexS',
            // offset: [0, 1],
            zIndex: 999,
            data: data,
            onSelected: function (view, date, data) {
                console.log('event: onSelected')
            },
            onClose: function (view, date, data) {
                console.log('event: onClose')
                console.log('view:' + view)
                console.log('date:' + date)
                console.log('data:' + (data || '无'));
            }
        });
        $('#wexE').calendar({
            trigger: '#dtwexE',
            // offset: [0, 1],
            zIndex: 999,
            data: data,
            onSelected: function (view, date, data) {
                console.log('event: onSelected')
            },
            onClose: function (view, date, data) {
                console.log('event: onClose')
                console.log('view:' + view)
                console.log('date:' + date)
                console.log('data:' + (data || '无'));
            }
        });
        // picker -- coop duration
        $('#wdS').calendar({
            trigger: '#dtwdS', 
            // offset: [0, 1],
            zIndex: 999,
            data: data,
            onSelected: function (view, date, data) {
                console.log('event: onSelected')
            },
            onClose: function (view, date, data) {
                console.log('event: onClose')
                console.log('view:' + view)
                console.log('date:' + date)
                console.log('data:' + (data || '无'));
            }
        });
        $('#wdE').calendar({
            trigger: '#dtwdE',
            // offset: [0, 1],
            zIndex: 999,
            data: data,
            onSelected: function (view, date, data) {
                console.log('event: onSelected')
            },
            onClose: function (view, date, data) {
                console.log('event: onClose')
                console.log('view:' + view)
                console.log('date:' + date)
                console.log('data:' + (data || '无'));
            }
        }); 


        // Dynamic elements
        var $demo = $('#demo');
        var UID = 1;
        $('#add').click(function () {
            $demo.append('<input id="input-' + UID + '"><div id="ca-' + UID + '"></div>');
            $('#ca-' + UID).calendar({
                trigger: '#input-' + UID++
            })
        })
    </script>
    

 


    


<?php 
    //Footer
    require_once '../../web_elements/footer.php'; 
?> 

</body>
</html> 

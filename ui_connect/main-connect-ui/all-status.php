<?php 
       
    //Session Query
    require_once '../../ui_connect/login/query/session.php';
?>
<?php //require_once('../../Connections/MyConnect.php'); ?>
<?php //include("fn-upload.inc.php"); 
?>
<?php //include ("../../ui_connect/student_management/student_management_reccordset.php");
      //include ("printf/allController.php");
    //include ("../admin/for-admin.php");

?>
<?php //require_once('../../Connections/MyConnect.php'); ?>
<?php //include("fn-upload.inc.php"); 
?>
<?php //include ("../../ui_connect/student_management/student_management_reccordset.php");
      //include ("printf/allController.php");
    //include ("../admin/for-admin.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">
<title>Recent All Student Lists</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../libs/css/w3.css">
<link rel="stylesheet" href="../../libs/css/w3-theme-blue-grey.css">
<link rel='stylesheet' href='../../libs/css/css?family=Open+Sans'>
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<link rel="stylesheet" href="../../libs/css/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
<link href="../../libs/css/font-awesome.min.css" rel="stylesheet">

<link rel="icon" type="image/png" href="../../img/images/wd.png"/>
 
  <!-- For Multi Form -->
<!--Bon <link rel="stylesheet" href="../../libs/css/reset.min.css"> 
    <link rel="stylesheet" href="../../libs/css/style.css?ver=2001" type="text/css">
Bon-->
    <!--<link rel="stylesheet" href="../../libs/css/style-msform.css?v=<?php echo filemtime('style-msform.css'); ?>" type="text/css">-->
    <link rel="stylesheet" href="../../libs/css/style-msform.css?v=0214i" type="text/css">
    
        <!-- According-Form-->
      <!--<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>-->
      <link rel="stylesheet" href="../../libs/css/style-according.css?v=0228i" type="text/css">
      
    <!-- alert-sweetAlert2-->   
    <link rel="stylesheet" href="../../libs/sweetAlert2/ajax-delete/assets/bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="../../libs/sweetAlert2/ajax-delete/assets/swal2/sweetalert2.min.css" type="text/css" />
    




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
                    <h1 class="w3-xxxlarge w3-animate-right" style="text-shadow:3px 2px 0 #444" >Student Management System</h1>

                </div>
                
            </header>


    <!-- End Grid -->
    </div> 

<!-- End The Page Container -->
</div>

<!-- Filter Table Trainee -->
<div id="load-products">
<?php //include '../../ui_connect/student_management/split-by-status/all-rec-list-info.php' ?>
</div>
  

    <!-- alert-sweetAlert2 -->
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--<script src="../../libs/sweetAlert2/ajax-delete/assets/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="../../libs/sweetAlert2/ajax-delete/assets/swal2/sweetalert2.min.js"></script>        
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
            cancelButtonText: 'No, cancel!',
  confirmButtonClass: 'btn btn-success',
  cancelButtonClass: 'btn btn-danger',
  buttonsStyling: false,
          //showLoaderOnConfirm: true,
          //closeOnCancel: true,

            
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
        },
            function (dismiss) {
              // dismiss can be 'cancel', 'overlay',
              // 'close', and 'timer'
              if (dismiss == 'cancel') {
                swal(
                  'Cancelled',
                  'Your imaginary file is safe :)',
                  'error'
                )
              }


            }
        )





        
      }
      
      function readProducts(){
        $('#load-products').load('../../ui_connect/student_management/split-by-status/all-rec-list-info.php'); 
      } 



      
    </script>
      
<?php 
    //Footer
    require_once '../../web_elements/footer.php'; 
?> 

</body>
</html> 

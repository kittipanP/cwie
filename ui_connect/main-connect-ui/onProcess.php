<?php 
       
    //Session Query
    require_once '../../ui_connect/login/query/session.php';
?>
<?php require_once('../../Connections/MyConnect.php'); ?>
<?php //include("fn-upload.inc.php"); 
?>
<?php include ("../../ui_connect/student_management/student_management_reccordset.php");
      //include ("printf/allController.php");
    //include ("../admin/for-admin.php");

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
?><?php require_once('../../Connections/MyConnect.php'); ?>
<?php //include("fn-upload.inc.php"); 
?>
<?php include ("../../ui_connect/student_management/student_management_reccordset.php");
      //include ("printf/allController.php");
    //include ("../admin/for-admin.php");

?>



<?php   
    //require_once('../../../Connections/MyConnect.php');
    $maxRows_studentSet = 100;
    $pageNum_studentSet = 0;
    if (isset($_GET['pageNum_studentSet'])) {
      $pageNum_studentSet = $_GET['pageNum_studentSet'];
    }
    $startRow_studentSet = $pageNum_studentSet * $maxRows_studentSet;
    
    mysqli_select_db($MyConnect, $database_MyConnect);
      $query_studentSet = "SELECT student_info.s_id, title.title_name, student_info.s_fname, student_info.s_lname, student_status.status_desc, major_info.major_name, degree_info.degree_name, institute.ins_name
      FROM student_info
      INNER JOIN title ON title.title_id = student_info.title_title_id
      INNER JOIN student_status ON student_status.status_id = student_info.status_id
      LEFT JOIN education_info ON student_info.s_id = education_info.s_id
      LEFT JOIN major_info ON major_info.major_id = education_info.major_id
      LEFT JOIN degree_info ON degree_info.degree_id = education_info.degree_id
      LEFT JOIN institute ON institute.ins_id = education_info.edu_institute
      WHERE (student_status.status_id = '1')
      ORDER BY student_info.s_id DESC";
    $query_limit_studentSet = sprintf("%s LIMIT %d, %d", $query_studentSet, $startRow_studentSet, $maxRows_studentSet);
    $studentSet = mysqli_query($MyConnect, $query_limit_studentSet) or die(mysqli_error($MyConnect));
    $row_studentSet = mysqli_fetch_assoc($studentSet);
    
    if (isset($_GET['totalRows_studentSet_onProcess'])) {
      $totalRows_studentSet_onProcess = $_GET['totalRows_studentSet_onProcess'];
    } else {
      $all_studentSet = mysqli_query(dbconnect(), $query_studentSet);
      $totalRows_studentSet_onProcess = mysqli_num_rows($all_studentSet);
    }
    $totalPages_studentSet = ceil($totalRows_studentSet_onProcess/$maxRows_studentSet)-1;
    
    $queryString_studentSet = "";
    if (!empty($_SERVER['QUERY_STRING'])) {
      $params = explode("&", $_SERVER['QUERY_STRING']);
      $newParams = array();
      foreach ($params as $param) {
      if (stristr($param, "pageNum_studentSet") == false && 
        stristr($param, "totalRows_studentSet_onProcess") == false) {
        array_push($newParams, $param);
      }
      }
      if (count($newParams) != 0) {
      $queryString_studentSet = "&" . htmlentities(implode("&", $newParams));
      }
    }
    $queryString_studentSet = sprintf("&totalRows_studentSet_onProcess=%d%s", $totalRows_studentSet_onProcess, $queryString_studentSet);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">
<title>Student on Process Status</title>
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
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="onProcess">
                      <h2>Recent Student on Process Lists</h2>
                      <p>Search for a name in the input field.</p>
                    
                    <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for names.." id="onProcessiiInput" onkeyup="onProcessFnii()">
                    
                    <table class="w3-table-all w3-margin-top w3-hoverable" id="onProcessiiTable">
                        <tr>
                          
                          <th style="width:2%;">No.</th>
                          <th style="width:3%;">Title</th>
                          <th style="width:10%;">First Name</th>
                          <th style="width:10%;">Last Name</th>
                          <th style="width:11%;">Degree</th>
                          <th style="width:24%;">Major</th>
                          <th style="width:30%;">Institute</th>
                          <th style="width:5%;">Edit</th>
                          <th style="width:5%;">Delete</th>
                        </tr>
                        <?php 
                        $rows_all = $totalRows_studentSet_onProcess;
                        $stu_id=$row_studentSet['s_id'];


                            for($cur_page=0;$cur_page<=$pageNum_studentSet;$cur_page++){
                                  $a = ($rows_all - ($pageNum_studentSet*$maxRows_studentSet));
                                }
                            $b = $a;
                        ?>
                        <?php do { ?>
                            <tr>
                              <?php

                              if($row_studentSet['s_id'] < $stu_id){
                                    $b = ($b-1);
                                  } 
                          
                              ?>
                              <td><?php echo $b; ?></td>
                              <td><?php echo $row_studentSet['title_name']; ?></td>
                              <td><?php echo $row_studentSet['s_fname']; ?></td>
                              <td><?php echo $row_studentSet['s_lname']; ?></td>
                              <td><?php echo $row_studentSet['degree_name']; ?></td>
                              <td><?php echo $row_studentSet['major_name']; ?></td>
                              <td><?php echo $row_studentSet['ins_name']; ?></td>
                              <td><a class="btn btn-default w3-hover-blue" href="stu-update-all.php?s_id=<?php echo $row_studentSet['s_id']; ?>"><i class="fa fa-pencil"></i></a></td>
                              <td><a  class="btn btn-default w3-hover-red" id="delete_product" data-id="<?php echo $row_studentSet['s_id']; ?>" href="javascript:void(0)"><i class="fa fa-trash "></i></a></td>
                            </tr> 
                        <?php } while ($row_studentSet = mysqli_fetch_assoc($studentSet)); ?>               
                    </table>
                      
                      <p>&nbsp;</p>
                      <div class="w3-center">
                    <ul class="w3-pagination">
                      <li><a class="w3-green" href="<?php printf("%s?pageNum_studentSet=%d%s", $currentPage, 0, $queryString_studentSet); ?>">&laquo;</a></li>
                      <li>
                        <?php
                            for($all_page=0;$all_page<=$totalPages_studentSet;$all_page++){
                                echo '<a href="?pageNum_studentSet=',$all_page,'">',($all_page+1),'</a>';
                                }
                        ?>
                      </li>
                      <li><a class="w3-green" onclick="w3_close()" href="<?php printf("%s?pageNum_studentSet=%d%s", $currentPage, $totalPages_studentSet, $queryString_studentSet); ?>">&raquo;</a></li>
                    </ul>
         </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>


    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>

</div>        



<?php //include '../../ui_connect/student_management/split-by-status/onProcess-table.php' ?>
</div><!-- products will be load here -->

    <!-- alert-sweetAlert2 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../libs/sweetAlert2/ajax-delete/assets/bootstrap/js/bootstrap.min.js"></script>
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
      

      
    </script>


    <script>

    function onProcessFnii() {
      var input, filter, table, tr, td, i,j;
      input = document.getElementById("onProcessiiInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("onProcessiiTable");
      tr = table.getElementsByTagName("tr");
      
      
        for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          } else {
          tr[i].style.display = "none";
          }
        }
        }
      
    }
  </script>

  
  
    
<?php 
    //Footer
    require_once '../../web_elements/footer.php'; 
?> 

</body>
</html> 

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
<div id="">
<?php include '../../ui_connect/student_management/split-by-status/all-rec-list-info.php' ?>
</div>
  
    
<?php 
    //Footer
    require_once '../../web_elements/footer.php'; 
?> 

</body>
</html> 

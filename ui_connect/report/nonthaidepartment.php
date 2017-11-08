<?php
require_once '../../ui_connect/login/query/session.php';
require_once '../../db_connect/dbconnection.php'; //connect to database


//query data using condition /*count number of duplicated data as "num" variable*/
$sql =' SELECT c.s_fname ,c.s_lname ,a.dep_name,COUNT(*) AS num
        FROM department_info a
        INNER JOIN trainee_info b ON a.dep_id = b.dep_id
        LEFT JOIN student_info c ON b.s_id = c.s_id
        LEFT JOIN application d  ON b.s_id = d.s_id
        WHERE c.origin_id = 1
        GROUP BY dep_name';

$result = mysqli_query($link,$sql) or die(mysqli_error());
   if ($result=mysqli_query($link,$sql)){
      // Return the number of rows in result set
      $rowcount=mysqli_num_rows($result);
    }

//check if there are data in column
 if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
            $datasnum[] = $row['num'];
            $datas[] = $row['dep_name'];
        }
        mysqli_free_result($result); // Free result set

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta charset="utf-8">
    <?php //All the meta and css links
        require_once '../../web_elements/head_link.php';?>
    <title>Non-Thai department</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="css/gradientbutton.css">
    <link rel="stylesheet" href="css/navbarchart.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.1/css/animsition.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.1/js/animsition.min.js"></script>
    <script src="components/animation.js"></script>
    <style>

    canvas {
              padding-left: 0;
              padding-right: 0;
              margin-left: auto;
              margin-right: auto;
              display: block;
              width: 800px;
            } /*Set canvas to center*/
            A:link {COLOR: #FFFFFF ; TEXT-DECORATION: none}
            A:visited {COLOR: #FFFFFF; TEXT-DECORATION: none}
            A:hover {COLOR: #000000; TEXT-DECORATION: underline}
            a:hover{color:black;background-color: white;}
    </style>
</head>

<body class="w3-theme-l5" style=" background: url(pictures/repp.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;">
<br>
<br>

      <?php require_once '../../web_elements/nav_bar.php';?>

      <!-- Fixed navbar -->
         <div class="navbar navbar-inverse" role="navigation">
           <div class="container">
             <div class="container-fluid big-logo-row">
               <div class="container">
                 <div class="row">
                   <div class="col-xs-12 big-logo-container">
                     <h1 class="big-logo">Non-Thai Students <a style="color:rgba(0,0,0,1);font-size:30px;text-decoration: underline;" href="livesearchnonthai.php"class="fa fa-search">Search</a></h1>
                   </div><!--/.col-xs-12 -->
                 </div><!--/.row -->
               </div><!--/.container -->
             </div><!--/.container-fluid -->
             <div class="navbar-collapse collapse" style="font-size:14px"><b>
               <ul class="nav navbar-nav navbar-right">
                     <li><a href="nonthaiplant.php">PLANT</a></li>
                     <li><a href="nonthailocation.php">LOCATION</a></li>
                     <li><a href="nonthaistatus.php">STATUS</a></li>
                     <li><a href="nonthaidegree.php">DEGREE</a></li>
                 <li class="active"><a href="nonthaidepartment.php">DEPARTMENT</a></li>
                     <li><a href="nonthaicountry.php">COUNTRY</a></li>
                     <li><a href="nonthaimajor.php">MAJOR</a></li>
                     <li><a href="nonthaichannel.php">CHANNEL</a></li>
                     <li><a href="nonthaihomeuniversity.php">HOME UNIVERSITY</a></li>
                     <li><a href="nonthaihostuniversity.php">HOST UNIVERSITY</a></li>
               </ul>
             </div><!--/.nav-collapse --></b>
           </div>
         </div>

<div class="animsition">
         <br>
         <div class="w3-container w3-left-align w3-center"style=" margin: auto; width: 80%; text-align: center; background-color:rgba(0,0,0,0.5); color:white;">
           <div class="w3-container w3-left-align"style="text-align: center;">
             <h3 ><b>Bar Chart</b></h3>
           </div>
         </div>
         <hr class="w3-center" style=" margin: auto;text-align: center; height: 3px;background-color:rgba(255,255,255,0.8);margin-top: 20px;margin-bottom: 20px;width: 80%;">
<!--Pie Chart--><canvas id="horizonbarChart" width="1580" height="2000"></canvas>
                <?php require_once 'components/horizonbarchart.php' ?>

</div>
<?php
    //Footer
    require_once '../../web_elements/footer.php';
?>
</body>
</html>

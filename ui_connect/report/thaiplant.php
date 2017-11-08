<?php require_once '../../ui_connect/login/query/session.php';?>
<?php
require_once '../../db_connect/dbconnection.php'; //connect to database


//query data using condition /*count number of duplicated data as "num" variable*/
$sql =' SELECT c.s_fname ,c.s_lname ,a.plant_name,count(*) AS num
        FROM plant_info a
        INNER JOIN  trainee_info b ON a.plant_id = b.plant_id
        LEFT JOIN student_info c ON b.s_id = c.s_id
        LEFT JOIN application d ON d.s_id = c.s_id
        WHERE c.origin_id = 2
        GROUP BY plant_name';

$result = mysqli_query($link,$sql) or die(mysqli_error());
   if ($result=mysqli_query($link,$sql)){
      // Return the number of rows in result set
      $rowcount=mysqli_num_rows($result);
    }

//check if there are data in column
 if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
            $datasnum[] = $row['num'];
            $datas[] = $row['plant_name'];
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
    <title>Thai plant</title>
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


    <!--html2canvas to capture screen to image
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" />


    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <script type="text/javascript" src="jquery.plugin.html2canvas.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.js"></script>
    <script type="text/javascript" src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script type="text/javascript">

        function genImage(){

              html2canvas(document.body, {
                  dpi: 192,
                  onrendered: function (canvas) {
                    $('#test').attr('href', canvas.toDataURL("image/png"));
                     $('#test').attr('download','Test.png');
                     $('#test')[0].click();
                  },
                  background:'#FFFFFF'

              });
        }

    </script> -->
    <style>
      a:hover{color:black;background-color: white;}
        canvas {
                  padding-left: 0;
                  padding-right: 0;
                  margin-left: auto;
                  margin-right: auto;
                  display: block;
                } /*Set canvas to center*/
        #box1 {
          width:400px;
          height:300px;
          border-style: solid;
          border-width: 4px;
        }
        A:link {COLOR: #FFFFFF ; TEXT-DECORATION: none}
        A:visited {COLOR: #FFFFFF; TEXT-DECORATION: none}
        A:hover {COLOR: #000000; TEXT-DECORATION: underline}

    </style>
</head>

<body class="w3-theme-l5" style=" background: url(pictures/repp.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;">

<br>
<br>
<!--
<a id="linkhide" href="javascript:genImage()">Download Image</a>
<a id="test"></a>
-->
      <?php require_once '../../web_elements/nav_bar.php';?>




<!-- Fixed navbar -->
   <div class="navbar navbar-inverse" role="navigation">
     <div class="container">
       <div class="container-fluid big-logo-row">
         <div class="container">
           <div class="row">
             <div class="col-xs-12 big-logo-container">
               <h1 class="big-logo">Thai Students <a style="color:rgba(0,0,0,1);font-size:30px;text-decoration: underline;" href="livesearchthai.php"class="fa fa-search">Search</a></h1>
             </div><!--/.col-xs-12 -->
           </div><!--/.row -->
         </div><!--/.container -->
       </div><!--/.container-fluid -->
       <div class="navbar-collapse collapse" style="font-size:20px"><b>
         <ul class="nav navbar-nav navbar-right">
           <li class="active"><a href="thaiplant.php" class="animsition-link">PLANT</a></li>
               <li><a href="thailocation.php"       class="animsition-link">LOCATION</a></li>
               <li><a href="thaistatus.php"         class="animsition-link">STATUS</a></li>
               <li><a href="thaidegree.php"         class="animsition-link">DEGREE</a></li>
               <li><a href="thaidepartment.php"     class="animsition-link">DEPARTMENT</a></li>
               <li><a href="thaiuniversity.php"     class="animsition-link">UNIVERSITY</a></li>
               <li><a href="thaimajor.php"          class="animsition-link">MAJOR</a></li>
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
<!--Bar Chart--><canvas id="barChart" width="800" height="600"></canvas>
                <?php require_once 'components/barchart.php' ?>

<div class="w3-container w3-left-align w3-center"style=" margin: auto; width: 80%; text-align: center; background-color:rgba(0,0,0,0.5); color:white;">
    <div class="w3-container w3-left-align"style="text-align: center;">
        <h3 ><b>Pie Chart</b></h3>
    </div>
</div>
<hr class="w3-center" style=" margin: auto;text-align: center; height: 3px;background-color:rgba(255,255,255,0.8);margin-top: 20px;margin-bottom: 20px;width: 80%;">
<!--Pie Chart--><canvas id="pieChart" width="800" height="600"></canvas>
                <?php require_once 'components/piechart.php' ?>

<div class="w3-container w3-left-align w3-center"style=" margin: auto; width: 80%; text-align: center; background-color:rgba(0,0,0,0.5); color:white;">
    <div class="w3-container w3-left-align"style="text-align: center;">
        <h3 ><b>Line Chart</b></h3>
    </div>
</div>
<hr class="w3-center" style=" margin: auto;text-align: center; height: 3px;background-color:rgba(255,255,255,0.8);margin-top: 20px;margin-bottom: 20px;width: 80%;">

<!--Line Chart--><canvas id="lineChart" width="800" height="600"></canvas>
                <?php require_once 'components/linechart.php' ?>
</div>
<?php
    //Footer
    require_once '../../web_elements/footer.php';
?>
</body>
</html>

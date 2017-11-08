<?php
require_once '../../ui_connect/login/query/session.php';
require_once '../../db_connect/dbconnection.php'; //connect to database


//query data using condition /*count number of duplicated data as "num" variable*/
$sql =' SELECT s_fname,COUNT(*) AS num
        FROM student_info
        GROUP BY s_fname';

$result = mysqli_query($link,$sql) or die(mysqli_error());
   if ($result=mysqli_query($link,$sql)){
      // Return the number of rows in result set
      $rowcount=mysqli_num_rows($result);
    }

//check if there are data in column
 if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
            $s_num[] = $row['num'];
            $s_fname[] = $row['s_fname'];
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
    <title>Test Show pie from database</title>
    <link type="text/css" rel="stylesheet" href="css/default.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

    <style>

        a:hover{color:black;}
        a:active{color:red;}
        <?php require_once 'css/navbar.css';?> /*import css file to decorate navigation bar*/
        <?php require_once 'css/ghostbutton.css';?> /*import css file to decorate search button*/
        <?php require_once 'css/hoverbutton.css';?> /*import css file to decorate search button*/
        <?php require_once 'css/paging.css';?> /*import css file to decorate search paging*/
        <?php require_once 'css/gradientbutton.css';?> /*import css file to decorate search button*/
        canvas {
                  padding-left: 0;
                  padding-right: 0;
                  margin-left: auto;
                  margin-right: auto;
                  display: block;
                  width: 800px;
                } /*Set canvas to center*/
    </style>
</head>

<body class="w3-theme-l5">
<br>
<br>

      <?php require_once '../../web_elements/nav_bar.php';?>

<div class="w3-container w3-theme-d2  w3-center" style=" border: 5px solid #ffbd00;"><!--Header for main Overview-->
  <h1>Overview Non-Thai Students</h1>
</div>

<div class="container" >
      <a class="btn btn-10" href="nonthaiplant.php">PLANT</a>
      <a class="btn btn-10" href="nonthailocation.php">LOCATION</a>
      <a class="btn btn-10" href="nonthaistatus.php">STATUS</a>
      <a class="btn btn-10" href="nonthaidegree.php">DEGREE</a>
      <a class="btn btn-10" href="nonthaidepartment.php">DEPARTMENT</a>
      <a class="btn btn-10" href="nonthaicountry.php">COUNTRY</a>
      <a class="btn btn-10" href="nonthaimajor.php">MAJOR</a>
      <a class="btn btn-10" href="nonthaichannel.php">CHANNEL</a>
      <a class="btn btn-10" href="nonthaihomeuniversity.php">HOME UNIVERSITY</a>
      <a class="btn btn-10" href="nonthaihostuniversity.php">HOST UNIVERSITY</a>
</div>


<div class="w3-container w3-theme-d2 w3-left-align w3-center"
      style=" margin: auto; width: 80%; text-align: center; border: 4px solid #00a1ff;">
      <!--Header for pie chart-->
  <h3>Total student for each Country (Pie Chart)</h3>
</div>

<!--Pie Chart-->
<canvas id="pieChart" width="800" height="700"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById("pieChart").getContext("2d");
        //Set chart type ex: bar,pie,line etc.
        var type = 'pie';
        //Function Random color of pie piece
        var randomColor = function () {
            return '#' + (Math.random().toString(16) + '0000000').slice(2, 8);
          //return "#"+((1<<24)*Math.random()|0).toString(16);
        };
        //Set data to show in chart
        var data = {
            labels: <?=json_encode($s_fname)?>,
            datasets: [{
                label: 'Report',
                data: <?=json_encode($s_num, JSON_NUMERIC_CHECK);?>,
                backgroundColor: [
                  "rgba(36,53,223,0.8)",
                  "rgba(255,141,24,0.8)",
                  "rgba(170,170,170,0.8)",
                  "rgba(255,48,142,0.8)",
                  "rgba(77,0,120,0.8)",
                  "rgba(255,255,39,0.8)",
                  "rgba(29,43,83,0.8)",
                  "rgba(41,173,255,0.8)",
                  "rgba(255,0,77,0.8)",
                  "rgba(0,135,81,0.8)",
                  "rgba(255,156,89,0.8)",
                  "rgba(184,246,66,0.8)",
                ],
                borderColor: [],
                borderWidth: 1
            }]
        };
        //Set chart properties
        var options = {
            maintainAspectRatio: false,
            responsive: false,
            title: {
                display: true,
                position: "top",
                //text: "Student Information",
                fontSize: 18,
                fontColor: "#000000"
            },
            legend: {
                display: true,
                position: "bottom",
                labels: {
                    fontColor: "#000000",
                    fontSize: 14
                }
            }
        };
        //Instantiate new object
        var pieChart = new Chart(ctx, {type,data,options});
    </script>

    <br>
    <br>

<div class="w3-container w3-theme-d2 w3-left-align w3-center"
      style=" margin: auto; width: 80%; text-align: center; border: 4px solid #00a1ff;">
      <!--Header for bar chart-->
  <h3>Total student for each Country (Bar Chart)</h3>
</div>

<!--Bar Chart-->
<canvas id="barChart" width="800" height="700"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
    <script>
        var ctx2 = document.getElementById("barChart").getContext('2d');
        //Set chart type ex: bar,pie,line etc.
        var type = 'bar';
        //Function Random color of pie piece
        var randomColor = function () {
            return '#' + (Math.random().toString(16) + '0000000').slice(2, 8);
          //return "#"+((1<<24)*Math.random()|0).toString(16);
        };
        //Set data to show in chart
        var data = {
            labels: <?=json_encode($s_fname)?>,
            datasets: [{
                fill: false,
                label: 'Number of Student',
                data: <?=json_encode($s_num, JSON_NUMERIC_CHECK);?>,
                backgroundColor: [
                  "rgba(36,53,223,0.8)",
                  "rgba(255,141,24,0.8)",
                  "rgba(170,170,170,0.8)",
                  "rgba(255,48,142,0.8)",
                  "rgba(77,0,120,0.8)",
                  "rgba(255,255,39,0.8)",
                  "rgba(29,43,83,0.8)",
                  "rgba(41,173,255,0.8)",
                  "rgba(255,0,77,0.8)",
                  "rgba(0,135,81,0.8)",
                  "rgba(255,156,89,0.8)",
                  "rgba(184,246,66,0.8)",
                ]
              ,
                borderColor: [],
                borderWidth: 1
            }]
        };
        //Set chart properties
        var options = {
            maintainAspectRatio: false,
            responsive: false,
            title: {
                display: true,
                position: "top",
                //text: "Student Information",
                fontSize: 18,
                fontColor: "#000000"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        };
        var barChart = new Chart(ctx2,{type,data,options});
    </script>



  <br>
  <br>

<div class="w3-container w3-theme-d2 w3-left-align w3-center"
      style=" margin: auto; width: 80%; text-align: center; border: 4px solid #00a1ff;">
      <!--Header for line chart-->
  <h3>Total student for each Country (Line Chart)</h3>
</div>

<!--Line Chart-->
<canvas id="lineChart" width="800" height="700"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
    <script>
        var ctx3 = document.getElementById("lineChart").getContext('2d');
        //Set chart type ex: bar,pie,line etc.
        var type = 'line';
        //Function Random color of pie piece

        //Set data to show in chart
        var data = {
            labels: <?=json_encode($s_fname)?>,
            datasets: [{
                label: 'Number of Student',
                data: <?=json_encode($s_num, JSON_NUMERIC_CHECK);?>,
                backgroundColor: "transparent"

              ,
                borderColor: "red",
                borderWidth: 1,
                borderDash: [3, 3],
                fill: false,
                pointRadius: 2,
                pointBackgroundColor: 'rgba(255,150,0,0.5)',
                pointHoverRadius: 2,
                pointHitRadius: 3,
                pointBorderWidth: 4,
                pointStyle: 'rectRounded',
                lineTension: 0,

            }]
        };
        //Set chart properties
        var options = {
            maintainAspectRatio: false,
            responsive: false,
            title: {
                display: true,
                position: "top",
                //text: "Student Information",
                fontSize: 18,
                fontColor: "#000000"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        };
        var lineChart = new Chart(ctx3,{type,data,options});
    </script>
<br>
<br>

<?php
    //Footer
    require_once '../../web_elements/footer.php';
?>
</body>
</html>

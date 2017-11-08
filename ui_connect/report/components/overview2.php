<?php
    //Session Query
    require_once '../../ui_connect/login/query/session.php';?>
<?php

require_once '../../db_connect/dbconnection.php'; //connect to database
$sql = 'SELECT * FROM student_info';
$result = mysqli_query($link,$sql) or die(mysqli_error());

 if ($result=mysqli_query($link,$sql)){
    // Return the number of rows in result set
    $rowcount=mysqli_num_rows($result);

  }
//check if there are data in column
 if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
            $s_id[] = $row['s_id'];
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
        <?php require_once 'css/navbar.css';?> /*import css file to decorate navigation bar*/
        <?php require_once 'css/ghostbutton.css';?> /*import css file to decorate search button*/
        <?php require_once 'css/hoverbutton.css';?> /*import css file to decorate search button*/
        <?php require_once 'css/gradientbutton.css';?> /*import css file to decorate search button*/
        <?php require_once 'css/paging.css';?> /*import css file to decorate search paging*/
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
<div>
<body class="w3-theme-l5">

  <br>
  <br>


      <?php require_once '../../web_elements/nav_bar.php';?>

<div class="w3-container w3-blue-gray w3-center">
    <h1>Overview</h1>
</div>
<div class="container" class="buttonbody">
      <a class="btn btn-1" href="plant.php">PLANT</a>
      <a class="btn btn-2" href="location.php">LOCATION</a>
      <a class="btn btn-3" href="status.php">STATUS</a>
      <a class="btn btn-4" href="degree.php">DEGREE</a>
      <a class="btn btn-5" href="department.php">DEPARTMENT</a>
      <a class="btn btn-6" href="country.php">COUNTRY</a>
      <a class="btn btn-7" href="university.php">UNIVERSITY</a>
      <a class="btn btn-8" href="major.php">MAJOR</a>
</div>
<hr style="border: solid #ddd; border-width: 1px 0 0; clear: both; margin: 22px 0 21px; height: 0;">


<canvas id="myChart" height="600" width="660"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById("myChart").getContext("2d");
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
                data: <?=json_encode($s_id, JSON_NUMERIC_CHECK);?>,
                backgroundColor: [
                  "rgba(36,53,223,1)",
                  "rgba(255,141,24,1)",
                  "rgba(170,170,170,1)",
                  "rgba(255,48,142,1)",
                  "rgba(77,0,120,1)",
                  "rgba(255,255,39,1)",
                  "rgba(29,43,83,1)",
                  "rgba(41,173,255,1)",
                  "rgba(255,0,77,1)",
                  "rgba(0,135,81,1)",
                  "rgba(255,156,89,1)",
                  "rgba(184,246,66,1)",
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
                text: "Student Information",
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
        var myChart = new Chart(ctx, {type,data,options});
    </script>


<canvas id="mybarChart" width="600" height="660"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
    <script>
        var ctx2 = document.getElementById("mybarChart").getContext('2d');
        //Set chart type ex: bar,pie,line etc.
        var type = 'line';
        //Function Random color of pie piece
        var randomColor = function () {
            return '#' + (Math.random().toString(16) + '0000000').slice(2, 8);
          //return "#"+((1<<24)*Math.random()|0).toString(16);
        };
        //Set data to show in chart
        var data = {
            labels: <?=json_encode($s_fname)?>,
            datasets: [{
                label: 'Number of Student',
                data: <?=json_encode($s_id, JSON_NUMERIC_CHECK);?>,
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
                text: "Student Information",
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
        var mybarChart = new Chart(ctx2,{type,data,options});
    </script>



</body>
</html>

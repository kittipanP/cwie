<?php require_once '../../ui_connect/login/query/session.php';?>
<?php
require_once '../../db_connect/dbconnection.php'; //connect to database

//get input from file livesearch.php
$lastname=$name=$type="";

$name = $_POST["firstname"];
$lastname = $_POST["lastname"];
$type = $_POST["type"];

//test data
 echo $name."<br>";
 echo $type;

//query data using condition /*count number of duplicated data as "num" variable*/
$sql =" SELECT thai_fname,s_fname,s_lname,COUNT(*) AS num
        FROM student_info
        WHERE s_fname = '{$name}' AND s_lname = '{$lastname}' /*2 conditions*/
        GROUP BY thai_fname";

$result = mysqli_query($link,$sql) or die(mysqli_error());

 if ($result=mysqli_query($link,$sql)){
    // Return the number of rows in result set
    $rowcount=mysqli_num_rows($result);

  }
//check if there are data in column
 if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
            $s_num[] = $row['num'];
            $s_lname[] = $row['s_lname'];
            $s_thainame[] = $row['thai_fname'];
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

<div class="w3-container w3-blue-gray w3-center"><!--Header for main Overview-->
  <h1>Overview</h1>
</div>

<div class="container" >
      <a class="btn btn-1" href="overview/plant.php">PLANT</a>
      <a class="btn btn-2" href="overview/location.php">LOCATION</a>
      <a class="btn btn-3" href="overview/status.php">STATUS</a>
      <a class="btn btn-4" href="overview/degree.php">DEGREE</a>
      <a class="btn btn-5" href="overview/department.php">DEPARTMENT</a>
      <a class="btn btn-6" href="overview/country.php">COUNTRY</a>
      <a class="btn btn-7" href="overview/university.php">UNIVERSITY</a>
      <a class="btn btn-8" href="overview/major.php">MAJOR</a>
</div>

<div class="w3-container w3-blue-gray w3-center"><!--Header for pie chart-->
  <h1>Pie Chart</h1>
</div>

<?php
$name=$type="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["firstname"];
  $type = $_POST["type"];
}

 echo $name."<br>";
 echo $type;

 ?>
<canvas id="myChart" width="700" height="600"></canvas>
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
            labels: <?=json_encode($s_thainame)?>,
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
        var myChart = new Chart(ctx, {type,data,options});
    </script>

<br>
<br>


<div class="w3-container w3-blue-gray w3-center"><!--Header for bar chart-->
  <h1>Bar Chart</h1>
</div>

<canvas id="mybarChart" width="700" height="600"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
    <script>
        var ctx2 = document.getElementById("mybarChart").getContext('2d');
        //Set chart type ex: bar,pie,line etc.
        var type = 'bar';
        //Function Random color of pie piece
        var randomColor = function () {
            return '#' + (Math.random().toString(16) + '0000000').slice(2, 8);
          //return "#"+((1<<24)*Math.random()|0).toString(16);
        };
        //Set data to show in chart
        var data = {
            labels: <?=json_encode($s_thainame)?>,
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
        var mybarChart = new Chart(ctx2,{type,data,options});
    </script>


</body>
</html>

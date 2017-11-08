<?php require_once '../../ui_connect/login/query/session.php';?>
<?php
require_once '../../db_connect/dbconnection.php'; //connect to database

//query data using condition /*search for year and count number of duplicated year*/
$sql =" SELECT EXTRACT(year FROM application_dateE) AS year,COUNT(*) AS num
        FROM application
        GROUP BY year";

$result = mysqli_query($link,$sql) or die(mysqli_error());

//check if there are data in column and fetch data as year
 if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
          $start_date[] = $row['year']; //define years to $start_date
              $number[] = $row['num'];  //define years to $start_date
        }
    mysqli_free_result($result); // Free result set
  }


  foreach ($start_date as $key) {
      echo $key."<br>"; #test year
  }

  foreach ($number as $ke) {
      echo $ke."<br>"; #test year counting
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
  <div class="w3-container w3-blue-gray w3-center"><!--Header for pie chart-->
    <h2>Total student for each Plant (Pie Chart)</h2>
  </div>


  <!--Line Chart-->
  <canvas id="lineChart" width="1400" height="700"></canvas>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
      <script>
          var ctx3 = document.getElementById("lineChart").getContext('2d');
          //Set chart type ex: bar,pie,line etc.
          var type = 'line';
          //Function Random color of pie piece

          //Set data to show in chart
          var data = {
              labels: <?=json_encode($start_date)?>,
              datasets: [{
                  label: 'Number of Student',
                  data: <?=json_encode($number, JSON_NUMERIC_CHECK);?>,
                  backgroundColor: "transparent",
                  borderColor: "#ff2362",
                  borderWidth: 2,
                  fill: false,
                  pointHoverBackgroundColor: '#000000',
                  pointHoverBorderColor: '#000000',
                  pointRadius: 3.5,
                  pointBackgroundColor: '#424242',
                  pointBorderColor: '#424242',
                  pointHoverRadius: 6,
                  pointHitRadius: 0,
                  pointBorderWidth: 0,
                  pointStyle: 'rectRounded',
                  lineTension:0,

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
                  fontSize: 30,
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

          var lineChart = new Chart(ctx3, {
                                            type: 'line',
                                            data: data,
                                            options: options
          });
      </script>
  <br>
  <br>

</body>
</html>

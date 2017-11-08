<?php require_once '../../ui_connect/login/query/session.php';
require_once '../../db_connect/dbconnection.php'; //connect to database

//============================================count university table
$univer = "(SELECT
              COUNT(DISTINCT institute.ins_name) AS ins_num
              FROM institute
              INNER JOIN education_info ON education_info.edu_institute = institute.ins_id
              INNER JOIN student_info ON student_info.s_id =education_info.s_id
              INNER JOIN country_list ON country_list.country_id = institute.ins_country
              WHERE country_name != 'Thailand')
              UNION ALL
              (SELECT
              COUNT(DISTINCT institute.ins_name) AS ins_num
              FROM institute
              INNER JOIN education_info ON education_info.edu_institute = institute.ins_id
              INNER JOIN student_info ON student_info.s_id =education_info.s_id
              INNER JOIN country_list ON country_list.country_id = institute.ins_country
              WHERE country_name = 'Thailand')";
      $result_foreign_u = mysqli_query($link,$univer) or die(mysqli_error($link));
      if (mysqli_num_rows($result_foreign_u) > 0) {
         while($row = mysqli_fetch_assoc($result_foreign_u)) {
               $ins_num[] = $row['ins_num'];
             }
         mysqli_free_result($result_foreign_u); // Free result set
       }
//==================================================count participant table
$partici = "(SELECT
            student_info.s_id,
            student_status.status_id,
            student_status.status_desc,
            COUNT(DISTINCT s_fname, s_lname) AS student_num
            FROM student_info
            INNER JOIN student_status ON student_status.status_id = student_info.status_id
            WHERE student_info.status_id IS NOT NULL AND student_info.origin_id = 1)
            UNION ALL
            (SELECT
            student_info.s_id,
            student_status.status_id,
            student_status.status_desc,
            COUNT(DISTINCT s_fname, s_lname) AS student_num
            FROM student_info
            INNER JOIN student_status ON student_status.status_id = student_info.status_id
            WHERE student_info.status_id IS NOT NULL AND student_info.origin_id = 2)";
      $result_partici = mysqli_query($link,$partici) or die(mysqli_error());
      if (mysqli_num_rows($result_partici) > 0) {
         while($row = mysqli_fetch_assoc($result_partici)) {
               $partici_num[] = $row['student_num'];
             }
         mysqli_free_result($result_partici); // Free result set
       }
//=================================================project table
      $proj = "SELECT
                COUNT(DISTINCT trainee_project.project_id) AS project_num
                FROM trainee_project
                INNER JOIN trainee_has_project ON trainee_has_project.project_id = trainee_project.project_id
                INNER JOIN trainee_info ON trainee_info.trainee_id = trainee_has_project.trainee_id
                INNER JOIN student_info ON student_info.s_id = trainee_info.s_id";
            $result_proj = mysqli_query($link,$proj) or die(mysqli_error());
            if (mysqli_num_rows($result_proj) > 0) {
               while($row = mysqli_fetch_assoc($result_proj)) {
                     $proj_num[] = $row['project_num'];
                   }
               mysqli_free_result($result_proj); // Free result set
             }
//=================================================university graph
      $drop = mysqli_query($link,"DROP VIEW IF EXISTS universityoverview");
      //create "view" for mocking up virtual table
      $universityview =" CREATE VIEW universityoverview AS(
                            SELECT
                                  student_info.s_id,
                                  student_info.s_fname,
                                  student_info.s_lname,
                                  institute.ins_name,
                                  EXTRACT(year FROM application_dateS) AS year,
                                  COUNT(*) AS num
                            FROM student_info
                            INNER JOIN application ON application.s_id = student_info.s_id
                            INNER JOIN education_info ON education_info.s_id = student_info.s_id
                            INNER JOIN institute ON institute.ins_id = education_info.edu_institute
                            GROUP BY ins_name,year)";
      $resultview = mysqli_query($link,$universityview) or die(mysqli_error());
      //query records as columns by conditions
      $sqlquery = "SELECT  year,COUNT(*) AS university_num
                  FROM universityoverview
                  GROUP BY year";

      $resultquery = mysqli_query($link,$sqlquery) or die(mysqli_error());
                  //check if there are data in column and fetch data as year
                   if (mysqli_num_rows($resultquery) > 0) {
                      while($row = mysqli_fetch_assoc($resultquery)) {
                            $year_u[] = $row['year']; //define years to $start_date
                                $num_u[] = $row['university_num'];
                          }
                      mysqli_free_result($resultquery); // Free result set
                    }
//=================================================participant graph
      $participantview = " SELECT
                                student_info.s_id,
                                student_info.s_fname,
                                student_info.s_lname,
                            EXTRACT(year FROM application_dateS) AS year,
                            COUNT(*) AS par_num
                            FROM student_info
                            INNER JOIN application ON application.s_id = student_info.s_id
                            GROUP BY year ";
      $resultparticipant = mysqli_query($link,$participantview) or die(mysqli_error());
                    if (mysqli_num_rows($resultparticipant) > 0) {
                       while($row = mysqli_fetch_assoc($resultparticipant)) {
                             $year_par[] = $row['year']; //define years to $start_date
                                 $num_par[] = $row['par_num'];
                           }
                       mysqli_free_result($resultparticipant); // Free result set
                     }
//=================================================project graph
      $droppro = mysqli_query($link,"DROP VIEW IF EXISTS projectoverview");
      //create "view" for mocking up virtual table
      $projectview =" CREATE VIEW projectoverview AS(
                            SELECT student_info.s_id,
                                    student_info.s_fname,
                                    student_info.s_lname,
                                    trainee_project.project_id,
                                    trainee_project.project_name,
                                    trainee_project.project_detail,
                                    EXTRACT(year FROM application.application_dateS) AS year,
                                    COUNT(*) AS num
                            FROM trainee_info
                            INNER JOIN student_info ON student_info.s_id = trainee_info.s_id
                            INNER JOIN application ON application.s_id =student_info.s_id
                            INNER JOIN trainee_has_project ON trainee_has_project.trainee_id = trainee_info.trainee_id
                            INNER JOIN trainee_project ON trainee_project.project_id = trainee_has_project.project_id
                            GROUP BY project_name,year)";
      $resultprojectview = mysqli_query($link,$projectview) or die(mysqli_error());
      //query records as columns by conditions
      $projectquery = "SELECT  year,COUNT(*) AS pro_num
                        FROM projectoverview
                        GROUP BY year";

      $resultprojectquery = mysqli_query($link,$projectquery) or die(mysqli_error());
                  //check if there are data in column and fetch data as year
                   if (mysqli_num_rows($resultprojectquery) > 0) {
                      while($row = mysqli_fetch_assoc($resultprojectquery)) {
                            $year_pro[] = $row['year']; //define years to $start_date
                                $num_pro[] = $row['pro_num'];
                          }
                      mysqli_free_result($resultprojectquery); // Free result set
                    }

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta charset="utf-8">
    <?php require_once '../../web_elements/head_link.php';?>
    <title>Coop Overview</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-vivid.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-food.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

    <style>

        table {
            border-collapse: none;
            width: 80%;
        }
        th, td {
            text-align: center;
            padding: 15px;
            height: 50px;
        }
        tr:nth-child(even){background-color: #f2f2f2}
        tr:nth-child(odd){background-color: #ffffff}
        th {
            color: white;
        }
        canvas {
                  padding-left: 0;
                  padding-right: 0;
                  margin-left: auto;
                  margin-right: auto;
                  display: block;
                  width: 800px;
                } /*Set canvas to center*/
    </style>
    <!--jsPDF-->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.1/css/animsition.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.1/js/animsition.min.js"></script>
    <script src="components/animation.js"></script>
    <script type="text/javascript">


        function genPDF(){ //function to generate download link as pdf file
            html2canvas(document.getElementById("test"),{ //set link download id = html2canvas
                  onrendered: function(canvas){
                          var contentWidth = canvas.width;
                          var contentHeight = canvas.height;

                          //The height of the canvas which one pdf page can show;
                          var pageHeight = contentWidth / 592.28 * 841.89;
                          //the height of canvas that haven't render to pdf
                          var leftHeight = contentHeight;
                          //addImage y-axial offset
                          var position = 0;
                          //a4 format [595.28,841.89]
                                var imgWidth = 595.28;
                          var imgHeight = 592.28/contentWidth * contentHeight;

                          var pageData = canvas.toDataURL('image/jpeg', 1.0);

                          var pdf = new jsPDF('', 'pt', 'a4');

                         if (leftHeight < pageHeight) {
                              pdf.addImage(pageData, 'JPEG', 0, 0, imgWidth, imgHeight );
                          } else {
                              while(leftHeight > 0) {
                                  pdf.addImage(pageData, 'JPEG', 0, position, imgWidth, imgHeight)
                                  leftHeight -= pageHeight;
                                  position -= 841.89;
                                  //avoid blank page
                                  if(leftHeight > 0) {
                                      pdf.addPage();
                                  }
                              }
                          }
                    pdf.save('coop_overview.pdf');
                  },
                  background: '#ffffff'

            });
        }

    </script>
</head>
<body class="w3-theme-l5" style=" background: url(pictures/blur.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;">
  <br>
  <br>
<?php require_once '../../web_elements/nav_bar.php'; ?>

<div class="animsition">
    <!--overview table-->
    <div class="w3-card w3-center">
      <div class="w3-container w3-theme-dark">
      <h1>Cooperative Education Overview</h1>
      </div>
    </div>
    <br>
      <table style="border: black;" align="center">
        <tr>
          <th class="w3-container w3-vivid-bluish-green">Universities</th>
          <th class="w3-container w3-vivid-reddish-orange">Participants</th>
          <th class="w3-container w3-vivid-green">Projects</th>
        </tr>
        <tr>
          <td class="w3-ul w3-food-blue">Foreign
              <span class="w3-badge w3-xlarge w3-padding w3-vivid-bluish-green"><?php echo $ins_num[0];?></span></td>
          <td class="w3-ul ">Non-Thai
              <span class="w3-badge w3-xlarge w3-padding w3-vivid-reddish-orange"><?php echo $partici_num[0];?></span></td>
          <td class="w3-ul ">All
              <span class="w3-badge w3-xlarge w3-padding w3-vivid-green"><?php echo $proj_num[0];?></span></td>
        </tr>
        <tr>
          <td class="w3-ul">Local
              <span class="w3-badge w3-xlarge w3-padding w3-vivid-bluish-green"><?php echo $ins_num[1];?></span></td>
          <td class="w3-ul ">Thai
              <span class="w3-badge w3-xlarge w3-padding w3-vivid-reddish-orange"><?php echo $partici_num[1];?></span></td>
          <td class="w3-ul "></td>
        </tr>
        <tr>
          <td class="w3-ul">All
              <span class="w3-badge w3-xlarge w3-padding w3-vivid-bluish-green"><?php echo $ins_num[0]+$ins_num[1];?></span></td>
          <td class="w3-ul ">All
              <span class="w3-badge w3-xlarge w3-padding w3-vivid-reddish-orange"><?php echo $partici_num[0]+$partici_num[1];?></span></td>
          <td class="w3-ul "></td>
        </tr>
      </table>

    <br>
    <br>

  <!--Line Chart University-->
  <canvas id="lineChart" width="1200" height="600"></canvas>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
      <script>
          var ctx3 = document.getElementById("lineChart").getContext('2d');
          //Set chart type ex: bar,pie,line etc.
          var type = 'line';
          //Function Random color of pie piece

          //Set data to show in chart
          var dataline = {
              labels: <?=json_encode($year_u)?>,
              datasets: [{

                  label: 'Number of Universities',
                  data: <?=json_encode($num_u, JSON_NUMERIC_CHECK);?>,
                  backgroundColor: "transparent",
                  borderColor: "#008882",
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
          var optionline = {
              maintainAspectRatio: false,
              responsive: false,
              title: {
                  display: true,
                  position: "top",
                  text: "Universities",
                  fontSize: 30,
                  fontColor: "#000000"
              },
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero:true,
                      }
                  }],
                  xAxes: [{
                      ticks: {
                        autoSkip: false

                      }
                  }]
              },
              tooltips: {
                callbacks: {
                  title: function(tooltipItems, data) {
                    return '';
                  },
                  label: function(tooltipItem, data) {
                    var datasetLabel = '';
                    var label = data.labels[tooltipItem.index];
                    return data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                  }
                }
              },showAllTooltips: true
          };

          Chart.pluginService.register({
               beforeRender: function (chart) {
                  if (chart.config.options.showAllTooltips) {
                        // create an array of tooltips
                        // we can't use the chart tooltip because there is only one tooltip per chart
                        chart.pluginTooltips = [];
                        chart.config.data.datasets.forEach(function (dataset, i) {
                             chart.getDatasetMeta(i).data.forEach(function (sector, j) {
                                  chart.pluginTooltips.push(new Chart.Tooltip({
                                      _chart: chart.chart,
                                      _chartInstance: chart,
                                      _data: chart.data,
                                      _options: chart.options.tooltips,
                                      _active: [sector]
                                  }, chart));
                             });
                        });

                       // turn off normal tooltips
                       chart.options.tooltips.enabled = false;
                 }
              },
              afterDraw: function (chart, easing) {
                if (chart.config.options.showAllTooltips) {
                  // we don't want the permanent tooltips to animate, so don't do anything till the animation runs atleast once
                  if (!chart.allTooltipsOnce) {
                    if (easing !== 1)
                      return;
                    chart.allTooltipsOnce = true;
                  }

                // turn on tooltips
                    chart.options.tooltips.enabled = true;
                    Chart.helpers.each(chart.pluginTooltips, function (tooltip) {
                      tooltip.initialize();
                      tooltip.update();
                      // we don't actually need this since we are not animating tooltips
                      tooltip.pivot();
                      tooltip.transition(easing).draw();
                    });
                    chart.options.tooltips.enabled = false;
                }
              }
          })


          Chart.defaults.global.defaultFontColor = 'black';
          Chart.defaults.global.defaultFontSize = 15;
          Chart.defaults.global.defaultFontStyle = 'bold';
          $('#lineChart').css('background-color', 'rgba(255, 255, 255, 0.8)');
          var lineChart = new Chart(ctx3, {
              type: 'line',
              data: dataline,
              options: optionline
          });
      </script>
  <br>
  <br>


  <!--Line Chart Participants-->
  <canvas id="parlineChart" width="1200" height="600"></canvas>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
      <script>
          var ctx3 = document.getElementById("parlineChart").getContext('2d');
          //Set chart type ex: bar,pie,line etc.
          var type = 'line';
          //Function Random color of pie piece

          //Set data to show in chart
          var dataline = {
              labels: <?=json_encode($year_par)?>,
              datasets: [{

                  label: 'Number of Participants',
                  data: <?=json_encode($num_par, JSON_NUMERIC_CHECK);?>,
                  backgroundColor: "transparent",
                  borderColor: "#e25822",
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
          var optionline = {
              maintainAspectRatio: false,
              responsive: false,
              title: {
                  display: true,
                  position: "top",
                  text: "Participants",
                  fontSize: 30,
                  fontColor: "#000000"
              },
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero:true,
                      }
                  }],
                  xAxes: [{
                      ticks: {
                        autoSkip: false

                      }
                  }]
              },
              tooltips: {
                callbacks: {
                  title: function(tooltipItems, data) {
                    return '';
                  },
                  label: function(tooltipItem, data) {
                    var datasetLabel = '';
                    var label = data.labels[tooltipItem.index];
                    return data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                  }
                }
              },showAllTooltips: true
          };


          Chart.pluginService.register({
               beforeRender: function (chart) {
                  if (chart.config.options.showAllTooltips) {
                        // create an array of tooltips
                        // we can't use the chart tooltip because there is only one tooltip per chart
                        chart.pluginTooltips = [];
                        chart.config.data.datasets.forEach(function (dataset, i) {
                             chart.getDatasetMeta(i).data.forEach(function (sector, j) {
                                  chart.pluginTooltips.push(new Chart.Tooltip({
                                      _chart: chart.chart,
                                      _chartInstance: chart,
                                      _data: chart.data,
                                      _options: chart.options.tooltips,
                                      _active: [sector]
                                  }, chart));
                             });
                        });

                       // turn off normal tooltips
                       chart.options.tooltips.enabled = false;
                 }
              },
              afterDraw: function (chart, easing) {
                if (chart.config.options.showAllTooltips) {
                  // we don't want the permanent tooltips to animate, so don't do anything till the animation runs atleast once
                  if (!chart.allTooltipsOnce) {
                    if (easing !== 1)
                      return;
                    chart.allTooltipsOnce = true;
                  }

                // turn on tooltips
                    chart.options.tooltips.enabled = true;
                    Chart.helpers.each(chart.pluginTooltips, function (tooltip) {
                      tooltip.initialize();
                      tooltip.update();
                      // we don't actually need this since we are not animating tooltips
                      tooltip.pivot();
                      tooltip.transition(easing).draw();
                    });
                    chart.options.tooltips.enabled = false;
                }
              }
          })
          $('#parlineChart').css('background-color', 'rgba(255, 255, 255, 0.8)');
          Chart.defaults.global.defaultFontColor = 'black';
          Chart.defaults.global.defaultFontSize = 15;
          Chart.defaults.global.defaultFontStyle = 'bold';
          var parlineChart = new Chart(ctx3, {
              type: 'line',
              data: dataline,
              options: optionline
          });
      </script>
  <br>
  <br>

  <!--Line Chart Project-->
  <canvas id="prolineChart" width="1200" height="600"></canvas>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
      <script>
          var ctx3 = document.getElementById("prolineChart").getContext('2d');
          //Set chart type ex: bar,pie,line etc.
          var type = 'line';
          //Function Random color of pie piece

          //Set data to show in chart
          var dataline = {
              labels: <?=json_encode($year_pro)?>,
              datasets: [{

                  label: 'Number of Projects',
                  data: <?=json_encode($num_pro, JSON_NUMERIC_CHECK);?>,
                  backgroundColor: "transparent",
                  borderColor: "#008856",
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
          var optionline = {
              maintainAspectRatio: false,
              responsive: false,
              title: {
                  display: true,
                  position: "top",
                  text: "Projects",
                  fontSize: 30,
                  fontColor: "#000000"
              },
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero:true,
                      }
                  }],
                  xAxes: [{
                      ticks: {
                        autoSkip: false

                      }
                  }]
              },
              tooltips: {
                callbacks: {
                  title: function(tooltipItems, data) {
                    return '';
                  },
                  label: function(tooltipItem, data) {
                    var datasetLabel = '';
                    var label = data.labels[tooltipItem.index];
                    return data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                  }
                }
              },showAllTooltips: true
          };


          Chart.pluginService.register({
               beforeRender: function (chart) {
                  if (chart.config.options.showAllTooltips) {
                        // create an array of tooltips
                        // we can't use the chart tooltip because there is only one tooltip per chart
                        chart.pluginTooltips = [];
                        chart.config.data.datasets.forEach(function (dataset, i) {
                             chart.getDatasetMeta(i).data.forEach(function (sector, j) {
                                  chart.pluginTooltips.push(new Chart.Tooltip({
                                      _chart: chart.chart,
                                      _chartInstance: chart,
                                      _data: chart.data,
                                      _options: chart.options.tooltips,
                                      _active: [sector]
                                  }, chart));
                             });
                        });

                       // turn off normal tooltips
                       chart.options.tooltips.enabled = false;
                 }
              },
              afterDraw: function (chart, easing) {
                if (chart.config.options.showAllTooltips) {
                  // we don't want the permanent tooltips to animate, so don't do anything till the animation runs atleast once
                  if (!chart.allTooltipsOnce) {
                    if (easing !== 1)
                      return;
                    chart.allTooltipsOnce = true;
                  }

                // turn on tooltips
                    chart.options.tooltips.enabled = true;
                    Chart.helpers.each(chart.pluginTooltips, function (tooltip) {
                      tooltip.initialize();
                      tooltip.update();
                      // we don't actually need this since we are not animating tooltips
                      tooltip.pivot();
                      tooltip.transition(easing).draw();
                    });
                    chart.options.tooltips.enabled = false;
                }
              }
          })
          $('#prolineChart').css('background-color', 'rgba(255, 255, 255, 0.8)');
          Chart.defaults.global.defaultFontColor = 'black';
          Chart.defaults.global.defaultFontSize = 15;
          Chart.defaults.global.defaultFontStyle = 'bold';
          var prolineChart = new Chart(ctx3, {
              type: 'line',
              data: dataline,
              options: optionline
          });
      </script>
  <br>
</div>
<!--
<div align="center">
<a style="
          background-color: #f44336;
          color: white;
          padding: 14px 25px;
          text-align: center;
          text-decoration: none;
          display: inline-block;" href="javascript:genPDF()">Export to PDF</a>
</div>
-->
<br>

</body>
</html>

<?php require_once '../../ui_connect/login/query/session.php';?>

<?php
require_once '../../db_connect/dbconnection.php'; //connect to database

//This file use with livesearchthai.php


   // define the list of fields
  $fields = array("plant_name","location_name","status_desc","degree_name","dep_name","major_name","ins_name","application_dateS");
  $conditions = array();
  //To check does file is sent to this form by method post yet?
    $plant        = $_POST['plant_name'];
    $location     = $_POST['location_name'];
    $status       = $_POST['status_desc'];
    $degree       = $_POST['degree_name'];
    $department   = $_POST['dep_name'];
    $major        = $_POST['major_name'];
    $university   = $_POST['ins_name'];
    $year         = $_POST['application_dateS'];

    if ($_POST['type'] != '') {
    $type         = $_POST['type'];

    switch ($type) {
      case "plant_name":
        $headname = "Plant";
        break;
      case "location_name":
        $headname = "Location";
        break;
      case "status_desc":
        $headname = "Status";
          break;
      case "degree_name":
        $headname = "Degree";
        break;
      case "dep_name":
        $headname = "Department";
        break;
      case "major_name":
        $headname = "Major";
          break;
      case "ins_name":
        $headname = "University";
          break;
      default:
        break;
    }
    }



// builds the query all table that we're looking for
  $query = "SELECT plant_info.plant_name,
                    location.location_name,
                    student_status.status_desc,
                    degree_info.degree_name,
                    department_info.dep_name,
                    major_info.major_name,
                    institute.ins_name,
                    application.application_dateS, count(*) AS num
          FROM department_info
          INNER JOIN trainee_info ON trainee_info.dep_id = department_info.dep_id
          INNER JOIN student_info ON student_info.s_id = trainee_info.s_id
          INNER JOIN plant_info ON plant_info.plant_id = trainee_info.plant_id
          INNER JOIN location ON location.location_id = trainee_info.location_id
          INNER JOIN student_status ON student_status.status_id = student_info.status_id
          INNER JOIN education_info ON education_info.s_id = student_info.s_id
          INNER JOIN degree_info ON degree_info.degree_id = education_info.degree_id
          INNER JOIN major_info ON major_info.major_id = education_info.major_id
          INNER JOIN institute ON institute.ins_id = education_info.ins_id
          INNER JOIN application ON application.s_id = student_info.s_id
          ";

// loop through the defined fields
    foreach ($fields as $field) {
        // if the field is set and not empty
        if(isset($_POST[$field]) && $_POST[$field] != '') {
            // create a new condition while escaping the value inputed by the user (SQL Injection)
            $conditions[] = "$field LIKE '%" . mysqli_real_escape_string($link, $_POST[$field]) . "%'";
        }
    }

// if there are conditions defined
    if(count($conditions) > 0) {
        // append the conditions
        $query .= " WHERE " . implode (' AND ', $conditions); // you can change to 'OR', but I suggest to apply the filters cumulative

        if ($_POST['type'] != ''){ //to trap if does type is filled or not? if yes add GROUP BY condition
            $query .= " GROUP BY ".$type;
        }
        //echo "<br>".$query;
    }

  $result = mysqli_query($link, $query); //query database
  mysqli_close($link); //close database Connection


//fetch number of data and data type which are selected to show
    while($row = mysqli_fetch_array($result)) {
          $s_num[] = $row['num'];
          $types[] = $row["$type"];
          $datasnum[] = $row['num'];
          $datas[] = $row["$type"]; //Get variable type and set variable to database column name for showing data by that type
    }

    mysqli_free_result($result); // Free result set

if (($_POST['type'] != '') and ($s_num != '' )){ ?>

      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html>
      <head>
        <meta charset="utf-8">
        <?php //All the meta and css links
            require_once '../../web_elements/head_link.php';?>
        <title>Thai degree</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="css/gradientbutton.css">
    <link rel="stylesheet" href="css/navbarchart.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" />

          <style>
              a:hover{color:black;}
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
                           <h1 class="big-logo">Thai Students Searching</h1>
                         </div><!--/.col-xs-12 -->
                       </div><!--/.row -->
                     </div><!--/.container -->
                   </div><!--/.container-fluid -->
                 </div>
               </div>


<?php if (($headname == "Department") or ($headname == "University") or ($headname == "Major") ){ ?>
                  <br>
                  <div class="w3-container w3-left-align w3-center"style=" margin: auto; width: 80%; text-align: center; background-color:rgba(0,0,0,0.5); color:white;">
                    <div class="w3-container w3-left-align"style="text-align: center;">
                      <h3 ><b>Bar Chart</b></h3>
                    </div>
                  </div>
                  <hr class="w3-center" style=" margin: auto;text-align: center; height: 3px;background-color:rgba(255,255,255,0.8);margin-top: 20px;margin-bottom: 20px;width: 80%;">

  <!--Bar Chart--><canvas id="horizonbarChart" width="1580" height="1800"></canvas>
                  <?php require_once 'components/horizonbarchart.php' ?>

<?php }else {?>


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
<?php } ?>

<?php
    //Footer
      require_once '../../web_elements/footer.php';
 }else{
      echo '<img src="pictures/sorry.png"
      style="margin-left: auto; margin-right: auto; display:block; width: auto; height: 100%; ">';
} ?>
</body>
</html>

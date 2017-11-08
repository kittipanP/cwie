<?php
require_once '../../ui_connect/login/query/session.php';
require_once '../../db_connect/dbconnection.php'; //connect to database
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
 <head>
   <?php require_once '../../web_elements/head_link.php'; //All the meta and css links?>
    <title>Intercoop</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- table Export -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">


    <!--jsPDF-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <style>

        table {
          width: 100%;
          border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: center;
            border: 2px solid #ffffff;
        }

        th {
            padding: 9px;
            background-color: #1a58bc;
            color: white;
          }
        h1{
          color:red;
          text-shadow: 2px 2px #ffffff;
          font-size:300%;
        }
        tr:nth-child(even) {background: #CCC}
        tr:nth-child(odd) {background: #FFF}
     </style>
 </head>
 <body style=" background: url(pictures/world.png) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;">
   <br>
   <br>

   <?php require_once '../../web_elements/nav_bar.php'; ?>

   <div class="w3-container w3-center" style=" background-color:#1a58bc"><!--Header for main Overview-->
     <h1><b>Internationalized CWIE @ WD</b></h1>
   </div>
   <br>

   <?php
        mysqli_query($link,"SET NAMES 'utf8'");// เอาไว้กรณีให้บังคับตัวหนังสือเป็น UTF 8

        //drop "view" if exist
        $drop = mysqli_query($link,"DROP VIEW IF EXISTS intercoop");

        //create "view" for mocking up virtual table
        $sqlview =" CREATE VIEW intercoop AS (
                    SELECT student_info.s_fname, student_info.s_lname, country_list.country_name, student_status.status_desc, COUNT(*) AS status_num
                    FROM student_info
                    INNER JOIN student_address ON student_address.s_id = student_info.s_id
                    INNER JOIN country_list ON country_list.country_id = student_address.country_id
                    INNER JOIN student_status ON student_status.status_id = student_info.status_id
                    WHERE country_list.country_name != 'Thailand'
                    GROUP BY country_list.country_name,student_status.status_desc
                )";
        $resultview = mysqli_query($link,$sqlview) or die(mysqli_error());
        //query records as columns by conditions
        $sqlquery = "SELECT country_name AS Country,
                            SUM( if( status_desc = 'End Trainee', status_num, 0 ) ) AS Completed,
                            SUM( if( status_desc = 'Trainee', status_num, 0 ) ) AS On_going,
                            SUM( if( status_desc = 'Waiting on Board', status_num, 0 ) ) AS Awaiting
                     FROM  intercoop
                     GROUP BY country_name
                    ";
        $resultquery = mysqli_query($link,$sqlquery) or die(mysqli_error());
        // show data in table
    ?>


    <div class="container" style="margin-left:auto;margin-right:auto;max-width:80%;">
          <table id="intercoop" class="table table-bordered">
            <thead>
              <tr>
              	<th>Country</th>
                <th>Completed</th>
                <th>On-going</th>
                <th>Awaiting</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  //check if there are data in column
                  if (mysqli_num_rows($resultquery) > 0) {
                  while($row = mysqli_fetch_assoc($resultquery)) {
              ?>
                <tr>
        				<td><?php echo $row['Country']?></td>
        				<td><?php echo $row['Completed']?></td>
        				<td><?php echo $row['On_going']?></td>
                <td><?php echo $row['Awaiting']?></td>
        	      </tr>
              <?php
                    }
                    mysqli_free_result($resultquery);
                  }
              ?>
            </tbody>
          </table>
      </div>
<!--
<a href="javascript:genPDF()">Download PDF</a>
-->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript">
//Disable ordering and searching
  $.extend( $.fn.dataTable.defaults, {
      searching: false,
      ordering:  false
  } );

$("#intercoop").DataTable({
  "pageLength": 20,
  dom: 'Bfrtip',
  buttons:['copy','pdf','csv','excel']
});

</script>
</body>
</html>

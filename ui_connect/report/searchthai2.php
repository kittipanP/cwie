<?php require_once '../../ui_connect/login/query/session.php';?>
<?php
require_once '../../db_connect/dbconnection.php'; //connect to database


//This file use with livesearchthai.php


        //drop "view" if exist

   // define the list of fields
  $fields = array("status_desc","s_fname","degree_name","major_name","ins_name","dep_name","location_name","plant_name","application_dateS");
  $conditions = array();
  //To check does file is sent to this form by method post yet?

  $query = "SELECT
c.application_dateS, q.title_name, a.s_fname ,a.s_lname ,h.status_desc ,j.dep_name ,g.location_name ,f.plant_name ,i.degree_name ,o.major_name ,l.ins_name ,k.country_name ,m.c_name ,n.host_name
FROM student_info a
INNER JOIN title q ON q.title_id = a.title_title_id
INNER JOIN trainee_info b ON a.s_id = b.s_id
INNER JOIN application c ON a.s_id = c.s_id
INNER JOIN education_info d ON a.s_id = d.s_id
INNER JOIN student_address p ON p.s_id = a.s_id
LEFT JOIN non_thai e ON a.s_id = e.s_id
LEFT JOIN  plant_info f ON f.plant_id = b.plant_id
LEFT JOIN  location g ON g.location_id = b.location_id
LEFT JOIN student_status h ON h.status_id = a.status_id
LEFT JOIN degree_info i ON i.degree_id = d.degree_id
LEFT JOIN department_info j ON j.dep_id = b.dep_id
LEFT JOIN institute l ON l.ins_id = d.edu_institute
LEFT JOIN country_list k ON k.country_id = p.country_id
LEFT JOIN chanel m ON m.c_id = e.c_id
LEFT JOIN host_university n ON n.host_id = e.host_id
LEFT JOIN major_info o ON o.major_id = d.major_id" ;

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
        $query .= " WHERE " . implode (' AND ', $conditions ) . " AND a.origin_id ='2'"; // you can change to 'OR', but I suggest to apply the filters cumulative
        //echo "<br>".$query;
    }else {
      $query .=" WHERE a.origin_id ='2'";
     }


  $result = mysqli_query($link, $query); //query database
    mysqli_close($link); //close database Connection
 ?>
<?php
    //Session Query
    require_once '../../ui_connect/login/query/session.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <?php
            //All the meta and css links
            require_once '../../web_elements/head_link.php';?>
        <title>Report Management : Participant (Thai)</title>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet'href='https://fonts.googleapis.com/css?family=Roboto' >
       <link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.7.2.custom.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.2/css/button">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>


</head>

<style type="text/css">
<?php require_once 'css/reporttable.css';?> /*import css file to decorate table*/
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
    min-height: 100%;
    background-position: center;
    background-size: cover;
}
.left {

    font-size: 14px;
    /*background-color: #F06;*/
    padding: 15px;
    float: left;
    height: auto;
    width: 20%;
}
.right {
    /*background-color: #609;*/
  float: right;
    padding: 15px;
    height: auto;
    width: 80%;
}
input[type=text], select {
    width: 100%;
    padding: 8px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=submit]:hover {
    background-color: #45a049;
}
.ui-datepicker{
    width:180px;
    font-size:11px;
}
</style>


<body class="w3-theme-l5" style=" background: url(pictures/searchbg.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;">

<!-- Navbar -->
<!-- <div class="w3-top" > -->
<!-- Navigation bar Code -->
         <?php require_once '../../web_elements/nav_bar.php';?>
         <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
            <div class="w3-row">
            <!-- Header -->
                <header class="w3-container w3-theme w3-padding w3-round"  id="myHeader">
                    <div class="w3-center">
                        <h2 class="w3-xxxlarge w3-animate-left">Welcome to WD Trainee</h2>
                        <h3 class="w3-xxlarge w3-animate-right">Participant (Thai)</h3>
                    </div>
                </header>
            </div>
         </div>

<!-- Search Form ================================================================================================-->
<div>
<div class="left"> <!--Open div tag of left box of search form-->
  <div class="w3-container w3-card-4" style="margin:0 0 0 0; border-radius: 5px; background-color: #FFFFFF; padding: 20px;">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"><h3><b>Advance Search:</b></h3>
      <br>

      <div class="field" id="searchform" >
        <label for="status">Student Status</label>
      <select id="status" name="status_desc">
         <option value="">Select..</option>
        <option value="On Process">On Process</option>
        <option value="Waiting on Board">Waiting on Board</option>
        <option value="Trainee">Trainee</option>
        <option value="End Trainee">End Trainee</option>
      </select>
       </div >

       <div class="field" id="searchform" >
      <label for="fname">Student's name</label>
      <input type="text" id="fname" name="s_fname" placeholder="Name..">
</div>
       <div class="field" id="searchform" >
      <label for="university">University/College</label>
      <input type="text" id="university" name="ins_name" placeholder="University/College..">
       </div>
        <div class="field" id="searchform" >
      <label for="major">Major</label>
      <input type="text" id="major" name="major_name" placeholder="Major..">
      </div>
       <div class="field" id="searchform" >
      <label for="degree">Degree</label>
      <input type="text" id="degree" name="degree_name" placeholder="Degree..">
</div>
<div class="field" id="searchform" >
      <label for="department">Department</label>
      <input type="text" id="department" name="dep_name" placeholder="Department..">
</div>
     <div class="field" id="searchform" >
      <label for="location">Location</label>
      <input type="text" id="location" name="location_name"  autocomplete="off" placeholder="Location..">
</div>
<div class="field" id="searchform" >
 <label for="plant">Plant</label>
 <select id="plant" name="plant_name">
    <option value="">Select..</option>
   <option value="BPI">BPI</option>
   <option value="NAV">NAV</option>
   <option value="PRB">PRB</option>

 </select>
</div>
              <div class="field" id="searchform">
      <label for="selectElementId">Year</label>
        <select name="application_dateS" id="selectElementId" ></select>
        <script>
            var min = 1997;
                max = new Date().getFullYear();
                select = document.getElementById('selectElementId');

            for (var i = min; i<=max; i++){
                var opt = document.createElement('option');
                opt.value = i;
                opt.innerHTML = i;
                select.appendChild(opt);
            }
            select.value = new Date();
        </script>
    </div>
<br>
      <input type="submit" value="submit">

    </form>
  </div>
</div> <!--Close div tag of left box of search form-->

<div class="right"> <!--Open div tag for right box of showing data-->
  <div class="w3-container w3-card-4" style="margin:0 0 0 0; border-radius: 5px; background-color: #FFFFFF; padding: 0px;">
  <table class="table-fill" id ="table" >
    <thead>
      <tr>

        <th class="text-center">Student's name</th>
        <th class="text-center">Degree</th>
        <th class="text-center">Major</th>
        <th class="text-center">University</th>
        <th class="text-center">Department</th>
        <th class="text-center">Location</th>
        <th class="text-center">Plant</th>
        <th class="text-center">Date</th>



      </tr>
      </thead>
      <tbody class="table-hover">
<?php
while($row=mysqli_fetch_array($result))
{
?>

        <tr>
        <td class="text-left"><?php echo $row['title_name'].'&nbsp;'.$row['s_fname'].'&nbsp;&nbsp;'.$row['s_lname'];?></td>
        <td class="text-left"><?php echo $row['degree_name'];?></td>
        <td class="text-left"><?php echo $row['major_name'];?></td>
        <td class="text-left"><?php echo $row['ins_name'];?></td>
        <td class="text-left"><?php echo $row['dep_name'];?></td>
        <td class="text-left"><?php echo $row['location_name'];?></td>
        <td class="text-left"><?php echo $row['plant_name'];?></td>
        <td class="text-left"><?php echo $row['application_dateS'];?></td>

        </tr>


          <?php

}
?>
  </tbody>
  </table>
 <br>

 </div>
</div> <!--Close div tag for right box of showing data-->
</div> <!--Close outside div tag-->

<script type="text/javascript">
//Disable ordering and searching
  $.extend( $.fn.dataTable.defaults, {
      searching: false,
      ordering:  false
  } );

  $("#table").DataTable({
    "pageLength": 15,
    dom: 'Bfrtip',
    buttons:[
      'copy', 'csv', 'excel', 'print'
    ]
  });

</script>
</body>
</html>
<script> //use with fetch.php file to fill automatically when user search

//live search of plant
$(document).ready(function(){
 $('#country').typeahead({
    source: function(query, result){
       $.ajax({
              url:"livefetchcountry.php",
              method:"POST",
              data:{query:query},
              dataType:"json",
              success:function(data){
                   result($.map(data, function(item){
                     return item;
                   }));
              }
       })
    }
 });

});
$(document).ready(function(){
 $('#host').typeahead({
    source: function(query, result){
       $.ajax({
              url:"livefetchhost.php",
              method:"POST",
              data:{query:query},
              dataType:"json",
              success:function(data){
                   result($.map(data, function(item){
                     return item;
                   }));
              }
       })
    }
 });

});

$(document).ready(function(){
 $('#fname').typeahead({
    source: function(query, result){
       $.ajax({
              url:"livefetchfname.php",
              method:"POST",
              data:{query:query},
              dataType:"json",
              success:function(data){
                   result($.map(data, function(item){
                     return item;
                   }));
              }
       })
    }
 });

});

//live search of location
$(document).ready(function(){
 $('#location').typeahead({
    source: function(query, result){
       $.ajax({
              url:"livefetchlocation.php",
              method:"POST",
              data:{query:query},
              dataType:"json",
              success:function(data){
                   result($.map(data, function(item){
                     return item;
                   }));
              }
       })
    }
 });
});
//live search of status

//live search of degree
$(document).ready(function(){
 $('#degree').typeahead({
    source: function(query, result){
       $.ajax({
              url:"livefetchdegree.php",
              method:"POST",
              data:{query:query},
              dataType:"json",
              success:function(data){
                   result($.map(data, function(item){
                     return item;
                   }));
              }
       })
    }
 });
});
//live search of department
$(document).ready(function(){
 $('#department').typeahead({
    source: function(query, result){
       $.ajax({
              url:"livefetchdepartment.php",
              method:"POST",
              data:{query:query},
              dataType:"json",
              success:function(data){
                   result($.map(data, function(item){
                     return item;
                   }));
              }
       })
    }
 });
});
//live search of major
$(document).ready(function(){
 $('#major').typeahead({
    source: function(query, result){
       $.ajax({
              url:"livefetchmajor.php",
              method:"POST",
              data:{query:query},
              dataType:"json",
              success:function(data){
                   result($.map(data, function(item){
                     return item;
                   }));
              }
       })
    }
 });
});
//live search of university
$(document).ready(function(){
 $('#university').typeahead({
    source: function(query, result){
       $.ajax({
              url:"livefetchuniversity.php",
              method:"POST",
              data:{query:query},
              dataType:"json",
              success:function(data){
                   result($.map(data, function(item){
                     return item;
                   }));
              }
       })
    }
 });
});
</script>

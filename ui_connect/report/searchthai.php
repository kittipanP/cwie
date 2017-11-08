 <?php
require_once '../../ui_connect/login/query/session.php';
require_once '../../db_connect/dbconnection.php'; //connect to database
?>
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">


<style type="text/css">

<?php require_once 'css/reporttable.css';?> /*import css file to decorate table*/
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
    background-image: url('../../img/bg/my_passport_ssd.jpg');
    min-height: 100%;
    background-position: center;
    background-size: cover;
}
.left {
    font-family: Georgia, "Times New Roman", Times, serif;
    font-size: 14px;
    /*background-color: #F06;*/
    padding: 15px;
    float: left;
    height: auto;
    width: 20%;
}
.right {
    font-family: Georgia, "Times New Roman", Times, serif;
    /*background-color: #609;*/
  float: right;
    padding: 15px;
    height: auto;
    width: 80%;
}
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
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
    font-family:tahoma;
    font-size:11px;
    
}
</style>


<body class="w3-theme-l5">


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
                        <h3 class="w3-xxlarge w3-animate-right"> Participant (Thai)</h3>
                    </div>
                </header>
            </div>
         </div>

<!-- Search Form ================================================================================================-->
<div>
<div class="left"> <!--Open div tag of left box of search form-->
  <div class="w3-container w3-card-4" style="margin:0 0 0 0; border-radius: 5px; background-color: #FFFFFF; padding: 20px;">
    <form method="post" action="searchthai2.php"><h3><b>Advance Search:</b></h3>
      <br>
       
        <div class="field" id="searchform" >
        <label for="status">Studen Status</label>
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
      <label for="university">University/Collage</label>
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
    	<input type="submit" value="Submit">
    </form>
  </div>
</div> <!--Close div tag of left box of search form-->

            
</body>
</html>

<!-- Connect database===========================================================================================-->
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
 $('#channel').typeahead({
    source: function(query, result){
       $.ajax({
              url:"livefetchchannel.php",
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
$(document).ready(function(){
 $('#plant').typeahead({
    source: function(query, result){
       $.ajax({
              url:"livefetchplant.php",
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
$(document).ready(function(){
 $('#status').typeahead({
    source: function(query, result){
       $.ajax({
              url:"livefetchstatus.php",
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





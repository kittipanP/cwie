<?php
require_once '../../ui_connect/login/query/session.php';
require_once '../../db_connect/dbconnection.php'; //connect to database

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
 <head>
   <?php require_once '../../web_elements/head_link.php';?>
    <title>Search graph non-thai students</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="css/livesearch.css">

    <style>
        a:hover{color:black;font-size: 18px}
    </style>
 </head>
 <body style=" background: url(pictures/report.png) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;">
  <br>
  <br>
      <?php require_once '../../web_elements/nav_bar.php'; ?>

      <br>

      <div class="w3-container w3-theme-d2 w3-left-align w3-center"
            style=" margin: auto; width: 60%; height: 70px; text-align: center; border: 8px solid rgb(26, 188, 156);">
            <!--Header for pie chart-->
        <h2>Non-Thai Students Searching</h2>
      </div>

      <form method="post" action="showgraphnonthai.php"> <!--Sent this form to pieandbarchart.php-->

        <div class="field" style="width:700px;" id="searchform" >
          <label for="plant" class="col-sm-2 col-form-label w3-center">Plant</label>
          <input type="text" name="plant_name" id="plant" class="form-control input-lg" autocomplete="off" placeholder="">
        </div>

        <div class="field" style="width:700px;" id="searchform" >
          <label for="location" class="col-sm-2 col-form-label w3-center">Location</label>
           <input type="text" name="location_name" id="location" class="form-control input-lg" autocomplete="off" placeholder="">
        </div>

        <div class="field" style="width:700px;" id="searchform" >
          <label for="status" class="col-sm-2 col-form-label w3-center">Status</label>
          <input type="text" name="status_desc" id="status" class="form-control input-lg" autocomplete="off" placeholder="">
        </div>

        <div class="field" style="width:700px;" id="searchform" >
           <label for="degree" class="col-sm-2 col-form-label w3-center">Degree</label>
           <input type="text" name="degree_name" id="degree" class="form-control input-lg" autocomplete="off" placeholder="">
        </div>

        <div class="field" style="width:700px;" id="searchform" >
           <label for="department" class="col-sm-2 col-form-label w3-center">Department</label>
           <input type="text" name="dep_name" id="department" class="form-control input-lg" autocomplete="off" placeholder="">
        </div>

        <div class="field" style="width:700px;" id="searchform" >
          <label for="major" class="col-sm-2 col-form-label w3-center">Major</label>
           <input type="text" name="major_name" id="major" class="form-control input-lg" autocomplete="off" placeholder="">
        </div>

        <div class="field" style="width:700px; height:45px;" id="searchform" >
          <label for="university" class="col-sm-2 col-form-label w3-center">Home University</label>
           <input type="text" name="ins_name" id="university" class="form-control input-lg" autocomplete="off" placeholder="">
        </div>

        <div class="field" style="width:700px; height:45px;" id="searchform" >
          <label for="host_university" class="col-sm-2 col-form-label w3-center">Host University</label>
           <input type="text" name="host_name" id="host_university" class="form-control input-lg" autocomplete="off" placeholder="">
        </div>

        <div class="field" style="width:700px;" id="searchform" >
          <label for="channel" class="col-sm-2 col-form-label w3-center">Channel</label>
           <input type="text" name="c_name" id="channel" class="form-control input-lg" autocomplete="off" placeholder="">
        </div>

        <div class="field" style="width:700px;" id="searchform" >
          <label for="country" class="col-sm-2 col-form-label w3-center">Country</label>
           <input type="text" name="country_name" id="country" class="form-control input-lg" autocomplete="off" placeholder="">
        </div>

        <div class="field" style="width:700px;height:40px;" id="searchform">
          <label for="selectElementId" class="col-sm-2 col-form-label w3-center">Year</label>
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
                select.value = new Date().getFullYear();
            </script>
        </div>

        <div class="field" style="width:700px; height:43px;" id="searchform" >
          <label for="dropdown" class="col-sm-2 col-form-label w3-center">Show By</label>
          <select id="dropdown" name="type" required="" oninvalid="this.setCustomValidity('Oops..! Please select type')" oninput="setCustomValidity('')">
            <option value="" disabled selected hidden>Please select</option>
            <option value="plant_name">Plant</option>
            <option value="location_name">Location</option>
            <option value="status_desc">Status</option>
            <option value="degree_name">Degree</option>
            <option value="dep_name">Department</option>
            <option value="major_name">Major</option>
            <option value="ins_name">Home University</option>
            <option value="host_name">Host University</option>
            <option value="c_name">Channel</option>
            <option value="country_name">Country</option>
          </select>
        </div>


        <div class="field" style="width:75px;" id="searchform">
            <button type="submit" id="search">Find!</button>
        </div>
      </form>

      <p style="text-align:center">
        <a href="javascript:history.back()" class="fa fa-arrow-left w3-xxlarge"> Go Back</a>
      </p>

      </body>
    </html>

    <script> //use with fetch.php file to fill automatically when user search

        //live search of plant
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
        //live search of host university
        $(document).ready(function(){
         $('#host_university').typeahead({
            source: function(query, result){
               $.ajax({
                      url:"livefetchhostuniversity.php",
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
        //live search of channel
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

        //live search of country
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


    </script>

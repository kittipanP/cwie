<?php

       ob_start();
       session_start();
       require_once 'db_connect/dbconnection.php';

       //If session is not set, the page redirect to login
        if (!isset($_SESSION['user'])){
            header("Location: ui_connect/login/login.php");
            exit;
        }
        $query_session = mysqli_query($link, "SELECT * from login_info where login_id = " .$_SESSION['user']);
        $userRow = mysqli_fetch_array($query_session);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require_once 'web_elements/head_link_index.php';?>
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2017.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-vivid.css">
    <title>Report Management</title>
</head>

<style>
    body,h1 {font-family: "Raleway", sans-serif}
    body, html {height: 100%}
    .bgimg {
        background-image: url('img/bg/my_passport_ssd.jpg');
        min-height: 100%;
        background-position: center;
        background-size: cover;
    }
    header{ background: url(img/head/headerv.jpg);}
</style>

<body class="w3-theme-l5">
<!-- Navigation bar Code -->
    <?php require_once 'web_elements/nav_bar_index.php';?>

<!-- Page Container -->
    <div class="w3-container w3-content" style="max-width:1400px;margin-top:60px;">
    <!-- The Grid -->
        <div class="w3-row">

            <!-- Header -->
            <header class="w3-container w3-theme w3-padding w3-round w3-opacity-min" id="myHeader">

                    <h4 class="w3-animate-left">Welcome To WD Trainee </h4>
                <div class="w3-center">
                    <h1 class="w3-xxxlarge w3-animate-right" style="text-shadow:3px 2px 0 #444" >Report System</h1>

                </div>
            </header>


    <!-- Left Column -->
        <div class="w3-col l12">
            <div class="w3-row-padding w3-center w3-margin-top">


                <!--Advance Search-->
                <div class="w3-quarter">
                  <div class="w3-card-2 w3-display-container"  style="min-height:200px">

                            <img src="img/images/search.jpg" class="w3-hover-opacity" style="width:100%; height: 300px;">
                                <div class="w3-display-middle w3-display-hover">

                                    <div class="w3-panel w3-2017-pink-yarrow w3-card-4 ">
                                        <a href="ui_connect/report/searchthai2.php" class = "textdecoration"><p>Thai Students</p></a>
                                    </div>

                                    <div class="w3-panel w3-vivid-yellowish-green w3-card-4 ">
                                        <a href="ui_connect/report/searchnonthai2.php" class = "textdecoration"><p>Non-Thai Students</p></a>
                                    </div>

                                </div>

                                <div class = "w3-container">
                                    <h4>Data</h4>
                                </div>
                  </div>
                </div>
                <!-- Chart-->
                <div class="w3-quarter">
                    <div class="w3-card-2 w3-display-container"  style="min-height:200px">
                        <!--<a href="ui_connect/email_management/Email_Management.php"> -->
                            <img src="img/images/chart.jpg" class="w3-hover-opacity" style="width:100%; height: 300px;">
                                <div class="w3-display-middle w3-display-hover">

                                    <div class="w3-panel w3-vivid-black w3-card-4 ">
                                        <a href="ui_connect/report/livesearchthai.php" class = "textdecoration"><p>Search</p></a>
                                    </div>

                                    <div class="w3-panel w3-2017-pink-yarrow w3-card-4">
                                        <a href="ui_connect/report/thaiplant.php" class = "textdecoration"><p>Thai Students</p></a>
                                    </div>

                                    <div class="w3-panel w3-vivid-yellowish-green w3-card-4">
                                        <a href="ui_connect/report/nonthaiplant.php" class = "textdecoration"><p>Non-Thai Students</p></a>
                                    </div>

                                </div>

                                <div class = "w3-container">
                                    <h4>Chart</h4>
                                </div>
                    </div>
                </div>

                <!-- COOP Overview-->
                 <div class="w3-quarter">
                    <div class="w3-card-2 w3-display-container"  style="min-height:200px">

                            <img src="img/images/coop.jpg" class="w3-hover-opacity" style="width:100%; height: 300px;">
                                <div class="w3-display-middle w3-display-hover">
                                    <div class="w3-panel w3-red w3-card-4">
                                        <a href="ui_connect/report/coopoverview.php" class = "textdecoration"><p>All</p></a>
                                    </div>

                                    <div class="w3-panel w3-vivid-blue w3-card-4 ">
                                        <a href="ui_connect/report/intercoop.php" class = "textdecoration"><p>International</p></a>
                                    </div>
                                </div>

                                <div class = "w3-container">
                                    <h4>COOP Overview</h4>
                                </div>
                    </div>
                </div>

                <!-- ROI-->
                <div class="w3-quarter">
                    <div class="w3-card-2 w3-display-container"  style="min-height:200px">

                            <img src="img/images/return.jpg" class="w3-hover-opacity" style="width:100%; height: 300px; ">
                                <div class="w3-display-middle w3-display-hover">
                                    <div class="w3-panel w3-vivid-purple w3-card-4">
                                        <a href="ui_connect/report/searchroi2.php" class = "textdecoration"><p>ROI</p></a>
                                    </div>

                                </div>
                                <div class = "w3-container" >
                                    <h4>ROI</h4>
                                </div>
                    </div>
                </div>

                <!--
                <div class="w3-third">
                <div class="w3-card-2 w3-padding-top" style="min-height:460px; text-align: center;">
                    <a href="ui_connect/activity_management/activity.php" class = "textdecoration"><h6 class = "hcol">Activity Management</h6><br></br>
                        <i class="fa fa-puzzle-piece w3-margin-bottom w3-text-theme" style="font-size:120px"></i></a>
                            <p>@@@@@@@@@@@@@@@@@@@</p>
                            <p>@@@@@@@@@@@@@@@@@@@</p>
                            <p>@@@@@@@@@@@@@@@@@@@</p>
                            <p>@@@@@@@@@@@@@@@@@@@</p>
                            <p>@@@@@@@@@@@@@@@@@@@</p>
                </div>
            </div> -->

            <p>&nbsp;</p>
            </div>
        </div>

    <!-- End The Page Container -->
    </div>

<?php
    //Script for toggling menu bar on small screen
    require_once 'web_elements/script_menu.php';?>


  <?php require_once 'web_elements/footer.php'; ?>


</body>
</html>

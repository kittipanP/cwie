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
    <?php 
        //All the meta and css links
        require_once 'web_elements/head_link_index.php';
?>
    <title>Welcome to  WD Trainee Management System</title>
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
<?php 
    
    require_once 'web_elements/nav_bar_index.php';
?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:60px;">   
    <!-- The Grid -->
    <div class="w3-row"> 

            <!-- Header -->
            <header class="w3-container w3-theme w3-padding w3-round w3-opacity-min" id="myHeader">

                    <h4 class="w3-animate-left">Welcome To... </h4>
                <div class="w3-center">
                    <h1 class="w3-xxxlarge w3-animate-right" style="text-shadow:3px 2px 0 #444" >CWIE Database Management System</h1>

                </div>
                
            </header>

 
    <!-- Left Column -->
        <div class="w3-col l12">
            <div class="w3-row-padding w3-center w3-margin-top">

                <!-- Student Management-->
                <div class="w3-third">
                    <div class="w3-card-2 " style="min-height:200px">
                        <a href="ui_connect/student_management/Student_Management.php" class = "textdecoration">
                            <img src="img/images/choosing.jpg" class="w3-hover-opacity" style="width:100%; height: 385px; ">
                                <div class = "w3-container" >
                                <h4>Student Management System</h4>

                                </div></a>
                    </div>
                </div>

                <!-- Report Management-->
                <div class="w3-third">
                    <div class="w3-card-2" style="min-height:200px">
                        <a href="ui_connect/report/Report.php" >
                            <img src="img/images/reportii.jpg" class="w3-hover-opacity" style="width:100%; height: 385px;"></a>
                            
                                <div class = "w3-container">
                                <h4>Report</h4>
                                
                                </div>
                    </div>
                </div>

                <!-- Email Management-->
                <div class="w3-third">
                    <div class="w3-card-2 w3-display-container"  style="min-height:200px">
                        <!--<a href="ui_connect/email_management/Email_Management.php"> -->
                            <img src="img/images/email.jpg" class="w3-hover-opacity" style="width:100%; height: 385px;">
                              <div class="w3-display-middle w3-display-hover">  
                                <div class="w3-panel w3-blue-grey w3-card-2">
                                    <a href="ui_connect/email_management/Email_Management.php" class = "textdecoration"><p>Ended Trainee</p></a>
                                </div>
                                    <p>&nbsp;</p>
                                <div class="w3-panel w3-orange w3-card-4 ">
                                    <a href="ui_connect/activity_management/activity.php" class = "textdecoration"><p>Activity</p></a>
                                </div>
                            </div>
                        <!--</a>-->

                                <div class = "w3-container">
                                <h4>Automated Email Management</h4>
                                
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

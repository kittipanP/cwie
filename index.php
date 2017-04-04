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
<body class="w3-theme-l5">

<!-- Navigation bar Code -->
<?php 
    
    require_once 'web_elements/nav_bar_index.php';
?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px;">   
    <!-- The Grid -->
    <div class="w3-row"> 

            <!-- Header -->
            <header class="w3-container w3-theme w3-padding w3-round" id="myHeader">
                <div class="w3-center">
                    <h1 class="w3-xxlarge w3-animate-left">Welcome To</h1>
                    <h1 class="w3-xxxlarge w3-animate-right">Trainee Management System</h1>

                </div>
                
            </header>

                        <p>&nbsp;</p>
 
    <!-- Left Column -->
        <div class="w3-col m6">
            <div class="w3-row-padding w3-center w3-margin-top">

                <!-- Student Management-->
                <div class="w3-third">
                    <div class="w3-card-2 w3-padding-top" style="min-height:460px">
                        <a href="ui_connect/student_management/Student_Management.php" class = "textdecoration"><h6 class = "hcol" >Student Management</h6><br></br>
                            <i class="fa fa-group w3-margin-bottom w3-text-theme" style="font-size:120px"></i></a>
                                <div class = "hcol" >
                                <p>Add, Edit, Delete</p>
                                <p>Rejected Student</p>
                                <p>Waiting On Board</p>
                                <p>Trainee</p>
                                <p>End Trainee</p>
                                </div>
                    </div>
                </div>

                <!-- Report Management-->
                <div class="w3-third">
                    <div class="w3-card-2 w3-padding-top" style="min-height:460px">
                        <a href="ui_connect/report/Report.php" class = "textdecoration"><h6 class = "hcol">Report</h6><br></br>
                            <i class="fa fa-bar-chart-o w3-margin-bottom w3-text-theme" style="font-size:120px"></i></a>

                                <p>-------------------</p>
                                <p>-------------------</p>
                                <p>-------------------</p>
                                <p>-------------------</p>
                    </div>
                </div>

                <!-- Email Management-->
                <div class="w3-third">
                    <div class="w3-card-2 w3-padding-top" style="min-height:460px">
                        <a href="ui_connect/email_management/Email_Management.php" class = "textdecoration"><h6 class = "hcol">E-mail Management</h6><br></br>
                            <i class="fa fa-envelope w3-margin-bottom w3-text-theme" style="font-size:120px"></i></a>

                                <p>-------------------</p>
                                <p>-------------------</p>
                                <p>-------------------</p>
                                <p>-------------------</p>
                    </div>
                </div>
            </div>
        </div>    
        <!-- End Left Column -->
             
        <!-- Right Column Start-->
        <div class="w3-col m6">
        <p></p>
        <!-- Just to balance the all columns -->
            <div class="w3-third">
                <div class="w3-card-2 w3-padding-top" style="min-height:460px; text-align: center;">
                    <a href="ui_connect/activity_management/activity.php" class = "textdecoration"><h6 class = "hcol">Activity Management</h6><br></br>
                        <i class="fa fa-puzzle-piece w3-margin-bottom w3-text-theme" style="font-size:120px"></i></a>
                            <p>-------------------</p>
                            <p>-------------------</p>
                            <p>-------------------</p>
                            <p>-------------------</p>
                </div>
            </div> 
        </div>
                    
                <!-- End Right Column -->
        </div>

   </div>

<?php
    //Script for toggling menu bar on small screen
    require_once 'web_elements/script_menu.php';?> 
    
    <!-- End The Grid -->

    <!-- End The Page Container -->

    
 <p>&nbsp;</p>
    
  <?php require_once 'web_elements/footer.php'; ?> 
 
 
<!-- End Page Container -->




</body>
</html> 

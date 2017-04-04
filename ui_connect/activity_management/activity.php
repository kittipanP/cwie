<?php
    //Session Query
    require_once '../../ui_connect/login/query/session.php';
    //Query to show all activities on the table
    require_once 'query/activity_query.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
            //All the meta and css links
            require_once '../../web_elements/head_link.php';?>
        <title>Activities: Trainee Activities</title>
    </head>
    <body class="w3-theme-l5">
        <!-- Navigation bar Code -->
        <?php 
            require_once '../../web_elements/nav_bar.php';?>
        <!-- Page Container -->
        <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px;">   
            <div class="w3-row"> 
                <header class="w3-container w3-theme w3-padding w3-round" id="myHeader">
                <div class="w3-center">
                    <h1 class="w3-xxlarge w3-animate-left">Welcome To</h1>
                    <h1 class="w3-xxxlarge w3-animate-right">Activities Management System</h1>
                </div>
                </header>
                <p>&nbsp;</p>
                <!--Table to show activities-->
                <a name="tableupac">
                <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="allRecent">
                    <h2><strong>Upcoming: Activities</strong></h2>
                    <p>Search for an activity in the input field</p>
                    <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for an activity"></input>
                    <!--Button to create a new activity-->
                    <div class="addnew ">
                        <h3><a href="add_activity.php" title="Add a new activity" class=""><strong>Add new  </strong><i class="fa fa-pencil w3-margin-right"></i></a></h3>
                    </div>
                    <table class="w3-table-all w3-margin-top w3-hoverable" >
                        <tr class="tr_heading">
                            <!--Table Column-->
                            <th style="width:5%;">No:</th>  
                            <th style="width:20%;">Activity Name</th>
                            <th style="width:10%;">Start</th>
                            <th style="width:10%;">End</th>
                            <th style="width:10%;">Date</th>
                            <th style="width:10%;">Room</th>
                            <th style="width:10%;">Building</th>
                            <th style="width:10%;">Participant</th>
                            <th style="width:10%;">Email To</th>
                            <th style="width:5%;">Edit</th>
                            <th style="width:5%;">Delete</th>
                        </tr>
                        <?php 
                        //To show the NO: of recrods
                            $counter = 1; 
                            while ($row= mysqli_fetch_array($show_activity_query)){
                                $id = $row['activity_id'];
                                echo "<tr>";
                                    //Data from database
                                    echo "<td>" .$counter. "</td>"; 
                                    echo "<td>".$row['activity_name']."</td>";
                                    echo "<td>".$row['start_time']."</td>";
                                    echo "<td>".$row['end_time']."</td>";
                                    echo "<td>".$row['act_date']."</td>";
                                    echo "<td>".$row['activity_room']."</td>";
                                    echo "<td>".$row['bldg_name']."</td>";
                                    echo "<td>".$row['status_desc']."</td>";
                                    echo "<td><a href='../../ui_connect/Email_Management/Email_Management.php#tableemail' title = 'Go to Email ' >".$row['status_assign']."</a></td>";
                                    //Icons
                                    //echo "<td><a href='../../ui_connect/Email_Management/Email_Management.php#tableemail' title = 'Go to Email ' ><i class='fa fa-envelope w3-margin-left'></i></a></td>";
                                    echo "<td><a href='activity_edit.php?activity_id=$id' title = 'Edit' id = 'btn-edit'><i class='fa fa-pencil w3-margin-left'></i></a></td>";
                                    echo "<td><a title = 'Delete' href='function/func_act_delete.php?activity_id=$id'><i class='fa fa-trash w3-margin-left'></i></a></td>";
                                    echo "</tr>";
                                    $counter++; //increment counter by 1 on every pass 
                            }?>
                       
                    </table>
                    <p>&nbsp;</p>
                    <div style="color: #607D8B; text-align: center; font-weight: bolder;">
                        <?php if ( isset($noresultact1) ) {?>
                            <span class="fa fa-exclamation-circle"></span> <?php echo $noresultact1; ?>
                        <?php } ?>
                    </div>
                    <p>&nbsp;</p>
                    <div class="w3-center ">
                        <ul class="w3-pagination ">
                            <li><a class="w3-green w3-round" style = "color: #435761;" href=""  title = "Previous">&laquo;</a></li>
                            <li><a class="w3-green w3-round" style = "color: #435761;" href="" title = "Next">&raquo;</a></li>
                        </ul>
                    </div>
                    <p>&nbsp;</p>
                </div>
                </a>
                <!--Table Finish-->
                <p>&nbsp;</p>
                <!--Table to show Last Week Activity-->
                <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="allRecent">
                    <h2><strong>Recent: Activities</strong></h2>
                    <p>Search for an activity in the input field</p>
                    <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for an activity" id="allRecentInput" onkeyup="allRecentFn()"></input>
                    <!--Just to add space-->
                    <p style="margin-bottom: 30px;"></p>
                    <table class="w3-table-all w3-margin-top w3-hoverable" ><!--Add a new css-->
                        <tr class="tr_heading">
                            <th style="width:5%;">No:</th> 
                            <th style="width:25%;">Activity Name</th>
                            <th style="width:10%;">Start</th>
                            <th style="width:10%;">End</th>
                            <th style="width:10%;">Date</th>
                            <th style="width:10%;">Room</th>
                            <th style="width:10%;">Building</th>
                            <th style="width:10%;">Participant</th>
                            <th style="width:5%;">Edit</th>
                            <th style="width:5%;">Delete</th>
                        </tr>
                        <?php 
                            //To show the NO: of recrods
                            $counter1 = 1;
                            while ($row= mysqli_fetch_array($show_recent_activity_query)){
                                $id = $row['activity_id'];
                                echo "<tr>";
                                    //Data from database
                                    echo "<td>" .$counter1. "</td>"; 
                                    echo "<td>".$row['activity_name']."</td>";
                                    echo "<td>".$row['start_time']."</td>";
                                    echo "<td>".$row['end_time']."</td>";
                                    echo "<td>".$row['act_date']."</td>";
                                    echo "<td>".$row['activity_room']."</td>";
                                    echo "<td>".$row['bldg_name']."</td>";
                                    echo "<td>".$row['status_desc']."</td>";
                                    //Icons
                                    echo "<td><a href='activity_edit.php?activity_id=$id' title = 'Edit' id = 'btn-edit'><i class='fa fa-pencil w3-margin-left'></i></a></td>";
                                    echo "<td><a title = 'Delete' href='function/func_act_delete.php?activity_id=$id'><i class='fa fa-trash w3-margin-left'></i></a></td>";
                                echo "</tr>";
                                $counter1++; //increment counter by 1 on every pass 
                        }?>
                     
                    </table>  
                    <p>&nbsp;</p> 
                    <div style="color: #607D8B; text-align: center; font-weight: bolder;">
                        <?php if ( isset($noresultact2) ) {?>
                                  <span class="fa fa-exclamation-circle"></span> <?php echo $noresultact2; ?>
                        <?php } ?>
                    </div>
                    <p>&nbsp;</p>   
                    <!--Next Previous Buttons-->
                    <div class="w3-center ">
                        <ul class="w3-pagination ">
                            <li><a class="w3-green w3-round" style = "color: #435761;" href="" title = "Previous">&laquo;</a></li>
                            <li><a class="w3-green w3-round" style = "color: #435761;" href="" title = "Next">&raquo;</a></li>
                        </ul>
                    </div>
                    <p>&nbsp;</p>
                    <!--Table Finish-->
                </div>
                <p>&nbsp;</p>
            </div>
            <!--Header Finish-->  
        </div>    
        <!--Container Finish-->    
        <p>&nbsp;</p>
        <?php 
            //Footer
            require_once '../../web_elements/footer.php'; ?> 
        <?php
            //Script for toggling menu bar on small screen
            require_once '../../web_elements/script_menu.php';?>
    </body>
</html> 

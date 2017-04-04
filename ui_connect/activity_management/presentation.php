<?php
    //Session Query
    require_once '../../ui_connect/login/query/session.php';?>
<?php 
    //Query to show all activities on the table
    require_once 'query/presentation_query.php'/* Query for showing all activities*/;?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
            //All the meta and css links
            require_once '../../web_elements/head_link.php';?>
        <title>Presentation: Trainee Presentation</title>
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
                        <h1 class="w3-xxxlarge w3-animate-right">Presentation Management System</h1>
                    </div>
                </header>
                <p>&nbsp;</p>
                <!--Table to show presentation-->
                <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="allRecent">
                    <h2><strong>Upcoming: Presentation</strong></h2>
                    <p>Search for a presentation in the input field.</p>
                    <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for a presentation" id="allRecentInput" onkeyup="allRecentFn()"></input>
                    <div class="addnew ">
                        <h3> <a href="add_presentation.php" title="Add a new Presentation" class=""><strong>Add new  </strong><i class="fa fa-pencil w3-margin-right"></i></a></h3>
                    </div>
                    <!--Table to show all upcoming presentation-->
                    <table class="w3-table-all w3-margin-top w3-hoverable" >
                        <a name="tableuppre">
                            <tr class="tr_heading">
                               <th style="width:4%;">No:</th>   
                               <th style="width:4%;">Title</th>
                               <th style="width:18%;">Full Name</th>
                               <th style="width:10%;">Trainee Code</th>
                               <th style="width:8%;">Date</th>
                               <th style="width:8%;">Start</th>
                               <th style="width:8%;">Finish</th>
                               <th style="width:10%;">Duration</th>
                               <th style="width:9%;">Room</th>
                               <th style="width:8%;">Building</th>
                               <th style="width:5%;">Mail</th>
                               <th style="width:4%;">Edit</th>
                               <th style="width:4%;">Delete</th>
                            </tr>
                            <?php 
                            $counter = 1;
                            while ($row= mysqli_fetch_array($show_presentation_queries)){
                               $pre_id = $row['presentation_id'];
                                    echo "<tr>";
                                        //Data from Database
                                        echo "<td>" .$counter. "</td>"; 
                                        echo "<td>" .$row['title_name']. "</td>";
                                        echo "<td>" .$row['s_fname']. ' '  .$row['s_lname']."</td>";
                                        echo "<td>" .$row['trainee_id']."</td>";
                                        echo "<td>" .$row['date']."</td>";
                                        echo "<td>" .$row['stime']."</td>";
                                        echo "<td>" .$row['ftime']."</td>";
                                        echo "<td>" .$row['dtime']. ' Minutes'."</td>";
                                        echo "<td>" .$row['presentation_room']."</td>";
                                        echo "<td>" .$row['bldg_name']. "</td>";
                                        //Icons
                                        echo "<td><a href='../../ui_connect/Email_Management/Email_Management.php#tableemailpre' title = 'Go to Email ' ><i class='fa fa-envelope w3-margin-left'></i></a></td>";
                                        echo "<td><a href='presentation_edit.php?presentation_id=$pre_id' title = 'Edit'><i class='fa fa-pencil w3-margin-left'></i></a></td>";
                                        echo "<td><a title = 'Delete' href='function/func_del_presentation.php?presentation_id=$pre_id'><i class='fa fa-trash w3-margin-left'></i></a></td>";
                                    echo "</tr>";
                                        $counter++; //increment counter by 1 on every pass 
                            }?> 
                        </a>    
                    </table>  
                    <p>&nbsp;</p>
                    <div style="color: #607D8B; text-align: center; font-weight: bolder;">
                        <?php if ( isset($noresultpre1) ) {?>
                        <span class="fa fa-exclamation-circle"></span> <?php echo $noresultpre1; ?>
                        <?php } ?>
                    </div>
                    <p>&nbsp;</p>
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
                <!--Table to show Last Month  Presentation-->
                <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="allRecent">
                    <h2><strong>Last Month: Presentation</strong></h2>
                    <p>Search for a presentation in the input field</p>
                    <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for a presentation" id="allRecentInput" onkeyup="allRecentFn()"></input>
                    <p style="margin-bottom: 30px;"></p>
                    <table class="w3-table-all w3-margin-top w3-hoverable" ><!--Add a new css-->
                            <tr class="tr_heading">
                               <th style="width:5%;">No:</th>   
                               <th style="width:5%;">Title</th>
                               <th style="width:18%;">Full Name</th>
                               <th style="width:12%;">Trainee Code</th>
                               <th style="width:9%;">Date</th>
                               <th style="width:9%;">Start</th>
                               <th style="width:9%;">Finish</th>
                               <th style="width:9%;">Room</th>
                               <th style="width:9%;">Building</th>
                               <th style="width:5%;">Mail</th>
                               <th style="width:5%;">Edit</th>
                               <th style="width:5%;">Delete</th>
                            </tr>
                        <?php 
                        $counter1 = 1;
                        while ($row= mysqli_fetch_array($show_last_presentation_queries)){
                           $pre_id = $row['presentation_id'];
                                echo "<tr>";
                                    //Data from Database
                                    echo "<td>" .$counter1. "</td>"; 
                                    echo "<td>" .$row['title_name']. "</td>";
                                    echo "<td>" .$row['s_fname']. ' '  .$row['s_lname']."</td>";
                                    echo "<td>" .$row['trainee_id']. "</td>";
                                    echo "<td>" .$row['date']."</td>";
                                    echo "<td>" .$row['stime']."</td>";
                                    echo "<td>" .$row['ftime']."</td>";
                                    echo "<td>" .$row['presentation_room']. "</td>";
                                    echo "<td>" .$row['bldg_name']. "</td>";
                                    //Icons
                                    echo "<td><a href='../../ui_connect/Email_Management/Email_Management.php#tableemailpre' title = 'Go to Email ' ><i class='fa fa-envelope w3-margin-left'></i></a></td>";
                                    echo "<td><a href='#' title = 'Edit'><i class='fa fa-pencil w3-margin-left'></i></a></td>";
                                    echo "<td><a title = 'Delete' href='function/func_del_presentation.php?presentation_id=$pre_id'><i class='fa fa-trash w3-margin-left'></i></a></td>";
                                    echo "</tr>";
                                    $counter1++; //increment counter by 1 on every pass 
                        }?> 
                    </table>   
                    <p>&nbsp;</p> 
                    <div style="color: #607D8B; text-align: center; font-weight: bolder;">
                        <?php if ( isset($noresultpre2) ) {?>
                        <span class="fa fa-exclamation-circle"></span> <?php echo $noresultpre2; ?>
                        <?php } ?>
                        </div>
                    <p>&nbsp;</p>   
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
                <!--Header Finish-->  
            </div>    
        <!--Container Finish-->    
        </div>
        <p>&nbsp;</p>

         <?php 
            //Footer
            require_once '../../web_elements/footer.php'; ?> 

        <?php
            //Script for toggling menu bar on small screen
            require_once '../../web_elements/script_menu.php';?>

    </body>
</html> 

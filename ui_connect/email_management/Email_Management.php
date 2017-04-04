<?php
    //Session Query
    require_once '../../ui_connect/login/query/session.php';?>
<?php 
    //Query to show all email on the table
    require_once 'query/email_query.php';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
            //All the meta and css links
            require_once '../../web_elements/head_link.php';?>
        <title>Email Management : WD Trainee Management</title>
    </head>
    <body class="w3-theme-l5">
        <!-- Navigation bar Code -->
        <?php 
            require_once '../../web_elements/nav_bar.php';?>
        <!-- Page Container -->
        <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">   
            <div class="w3-row"> 
            <!-- Header -->
                <header class="w3-container w3-theme w3-padding w3-round"  id="myHeader">
                    <div class="w3-center">
                        <h2 class="w3-xxxlarge w3-animate-left">Welcome to WD Trainee</h2>
                        <h3 class="w3-xxlarge w3-animate-right">Email Management System</h3>
                    </div>
                </header>
                <p>&nbsp;</p>
            </div>
            <!--Table to show all activities email-->
            <a name="tableemail">
            <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="allRecent">
                <h2><strong>Schedule Email: Activity</strong></h2>
                <p>Search for an email in the input field.</p>
                <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for email.." id="allRecentInput" onkeyup="allRecentFn()"/>
                    <div class="addnew ">
                        <h3 > <a href="#" title="Add new Schedule email" class=""><strong>Add new </strong><i class="fa fa-pencil w3-margin-right"></i></a></h3>
                    </div>
                <table class="w3-table-all w3-margin-top w3-hoverable" >
                    
                        <tr class="tr_heading">
                            <th style="width:5%;">No:</th>
                            <!--<th style="width:5%;">Title</th>-->
                             <th style="width:15%;">Subject</th>
                            <th style="width:10%;">Recipient</th>
                            <th style="width:10%;">Student Type</th>
                            <th style="width:10%;">Email Type</th>
                            <th style="width:8%;">Date</th>
                            <th style="width:8%;">Time</th>
                            <th style="width:5%;">Edit</th>
                            <th style="width:5%;">Delete</th>
                        </tr>
                        <?php 
                        $counter = 1;     
                        while ($row= mysqli_fetch_array($qyery_sch_act_email_show)){
                            $id = $row['sch_email_id'];
                            echo"<tr>";
                                    //<!--Data from Database-->
                                echo "<td>" .$counter. "</td>";
                                //echo "<td>".$row['title_name']."</td>";
                                //echo "<td >".$fname.' '.$lname."</td>";
                                echo "<td><a href='../../ui_connect/activity_management/activity.php#tableupac' title = 'Go to Activity'>".$row['activity_name']."</a></td>";
                                echo "<td><a href = 'show_student.php?sch_email_id=$id' title = 'Check the name of Students' > ".$row['status_desc']."</a></td>";
                                echo "<td>".$row['status_desc']."</td>";
                                echo "<td>".$row['email_subject']."</td>";
                                echo "<td>".$row['sch_date']."</td>";
                                echo "<td>".$row['sch_time']."</td>";
                                //<!---Icons-->
                                echo "<td><a href='email_edit.php?sch_email_id=$id' title = 'Edit'><i class='fa fa-pencil w3-margin-left'></i></a></td>";
                                echo "<td><a title = 'Delete' href='function/func_email_del.php?sch_email_id=$id'><i class='fa fa-trash w3-margin-left'></i></a></td>";
                            echo "</tr>";
                            $counter++; //increment counter by 1 on every pass 
                        }?>
                        
                </table>  
                <p>&nbsp;</p>
                <div style="color: #607D8B; text-align: center; font-weight: bolder;">
                    <?php if ( isset($noresult) ) {?>
                    <span class="fa fa-exclamation-circle"></span> <?php echo $noresult; ?>
                    <?php } ?>
                </div>
                <p>&nbsp;</p>
                <div class="w3-center" >
                    <ul class="w3-pagination ">
                      <li ><a class="w3-green w3-round" href="" title = "Previous">&laquo;</a></li>
                      <li><a class="w3-green w3-round" href="" title = "Next">&raquo;</a></li>
                    </ul>
                 </div>
                <p>&nbsp;</p>
            </div>
            </a>
            <p>&nbsp;</p>
            <!--Table to show all presentation email-->
            <a name="tableemailpre">
            <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="allRecent">
                <h2><strong>Schedule Email: Presentation</strong></h2>
                <p>Search for an email in the input field.</p>
                <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for email.." id="allRecentInput" onkeyup="allRecentFn()"/>
                    <div class="addnew ">
                        <h3 > <a href="#" title="Add new Schedule email" class=""><strong>Add new </strong><i class="fa fa-pencil w3-margin-right"></i></a></h3>
                    </div>
                <table class="w3-table-all w3-margin-top w3-hoverable" >
                    
                        <tr class="tr_heading">
                            <th style="width:5%;">No:</th>
                            <!--<th style="width:5%;">Title</th>-->
                             <th style="width:15%;">Subject</th>
                            <th style="width:15%;">Recipient</th>
                            <th style="width:15%;">Student Type</th>
                            <th style="width:15%;">Trainee ID</th>
                            <th style="width:10%;">Date</th>
                            <th style="width:10%;">Time</th>
                            <th style="width:5%;">Edit</th>
                            <th style="width:5%;">Delete</th>
                        </tr>
                        <?php 
                        $counter = 1;     
                        while ($row= mysqli_fetch_array($query_sch_pre_email)){
                            $id = $row['sch_email_id'];
                            echo"<tr>";
                                    //<!--Data from Database-->
                                echo "<td>" .$counter. "</td>";
                                //echo "<td>".$row['email_subject']."</td>";
                                echo "<td><a href='../../ui_connect/activity_management/presentation.php#tableuppre' title = 'Go to Presentation'>".$row['email_subject']."</a></td>";
                                echo "<td >".$row['s_fname'].' '.$row['s_lname']."</td>";
                                echo "<td>".$row['status_desc']."</td>";
                                echo "<td>".$row['pre_trainee_id']."</td>";
                                echo "<td>".$row['pre_sch_date']."</td>";
                                echo "<td>".$row['pre_sch_time']."</td>";
                                //<!---Icons-->
                                echo "<td><a href='email_edit.php?sch_email_id=$id' title = 'Edit'><i class='fa fa-pencil w3-margin-left'></i></a></td>";
                                echo "<td><a title = 'Delete' href='function/func_email_del.php?sch_email_id=$id'><i class='fa fa-trash w3-margin-left'></i></a></td>";
                            echo "</tr>";
                            $counter++; //increment counter by 1 on every pass 
                        }?>
                    </a>    
                </table>  
                <p>&nbsp;</p>
                <div style="color: #607D8B; text-align: center; font-weight: bolder;">
                    <?php if ( isset($noresult1) ) {?>
                    <span class="fa fa-exclamation-circle"></span> <?php echo $noresult1; ?>
                    <?php } ?>
                </div>
                <p>&nbsp;</p>
                <div class="w3-center" >
                    <ul class="w3-pagination ">
                      <li ><a class="w3-green w3-round" href="" title = "Previous">&laquo;</a></li>
                      <li><a class="w3-green w3-round" href="" title = "Next">&raquo;</a></li>
                    </ul>
                 </div>
                <p>&nbsp;</p>
            </div>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

        <?php 
            //Footer
            require_once '../../web_elements/footer.php'; ?> 

        <?php
            //Script for toggling menu bar on small screen
            require_once '../../web_elements/script_menu.php';?>
    </body>
</html> 

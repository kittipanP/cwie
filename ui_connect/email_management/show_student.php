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
        <!-- Page Container -->
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">   
            <div class="w3-container w3-card-2 w3-white w3-round w3-margin">
                <a href="email_management.php"><span class="close">&times;</span></a>
                <h2 style="text-align: left;"><strong>Name of Participant</strong></h2>    
                <table class="w3-table-all  w3-hoverable" ><!--Add a new css-->
                    <tr class="tr_heading">
                        <th style="width:10%;">No:</th>
                        <th style="width:10;">Title</th>
                        <th style="width:30%;">Student Name</th>
                        <th style="width:25%;">Recipient</th>
                        <th style="width:25%;">Student Type</th>
                    </tr>
                    <?php 
                    $counter = 1;     
                    while ($row= mysqli_fetch_array($qyery_name_email_show)){
                        echo"<tr>";
                            //<!--Data from Database-->
                            echo "<td>" .$counter. "</td>";
                            echo "<td>".$row['title_name']."</td>";
                            echo "<td >".$row['s_fname'].' '.$row['s_lname']."</td>";
                            echo "<td>".$row['trainee_id']."</td>";
                            echo "<td>".$row['status_desc']."</td>";
                        echo "</tr>";
                        $counter++; //increment counter by 1 on every pass 
                    }?> 
                </table>
                <p>&nbsp;</p>
            </div>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        
    </body>
</html>         

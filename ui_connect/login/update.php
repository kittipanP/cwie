<?php
    //Session Query
    require_once '../../ui_connect/login/query/session.php';?>
<?php 
    //Show all user query
    require_once '../../ui_connect/login/query/show_user_query.php';
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php
            //All the meta and css links
            require_once '../../web_elements/head_link.php';
        ?>
    <title>Update: Update a user</title>
</head>
<body class="w3-theme-l5">

<!-- Navigation bar Code -->
<?php 
    require_once '../../web_elements/nav_bar.php';
?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px;">   
    <!-- The Grid -->
    <div class="w3-row"> 
    <!-- Header -->
	<header class="w3-container w3-theme w3-padding w3-round" id="myHeader">
            <!--<i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-opennav"></i>-->
                <div class="w3-center">
                	<h1 class="w3-xxlarge w3-animate-left">Welcome To</h1>
                        <h1 class="w3-xxxlarge w3-animate-right">Users Management System</h1>
                </div>
            
               
        </header>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

                <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="allRecent">
              <h2><strong>All Users</strong></h2>
              <p>Search for a user in the input field.</p>
              <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for a user" id="allRecentInput" onkeyup="allRecentFn()">
                  <div class="addnew ">
                      <h3 > <a href="register.php" title="Add new a user" class="textdecoration"><strong>Add new  </strong><i class="fa fa-pencil w3-margin-right"></i></a></h3>
                  </div>
            
        
            
        <table class="w3-table-all w3-margin-top w3-hoverable" ><!--Add a new css-->
                <tr class="tr_heading">
                  <th style="width:20%;">Full Name</th>
                  <th style="width:20%;">Email Address</th>
                  <th style="width:20%;">Account Created</th>
                  <th style="width:2%;">Edit</th>
                  <th style="width:2%;">Delete</th>
                </tr>
                
            <?php while ($row= mysqli_fetch_array($show_user_queries)){
                $id = $row['login_id'];
                    echo"<tr>";
                        //Data from Database-->
                        
                        echo"<td>"  .$row['full_name']. "</td>";
                        echo "<td>" .$row['email']."</td>";
                        echo "<td>" .$row['created_details']."</td>";
                        
                      //<!---Icons-->
                        echo "<td><a href='#' title = 'Edit'><i class='fa fa-pencil w3-margin-left'></i></a></td>";
                        echo "<td><a title = 'Delete' href='func_user_delete.php?login_id=$id'><i class='fa fa-trash w3-margin-left'></i></a></td>";
                   echo "</tr>";
            }?> 
            
                
        </table>  
         
        <p>&nbsp;</p>
        
        <div class="w3-center ">
            <ul class="w3-pagination ">
              <li><a class="w3-green w3-round" style = "color: #435761;" href="" title = "Previous">&laquo;</a></li>
              <li>
			  	
              </li>
              <li><a class="w3-green w3-round" style = "color: #435761;" href="" title = "Next">&raquo;</a></li>
            </ul>
         </div>
        
<p>&nbsp;</p>
                </div>
                    
                <!-- End Right Column -->
            </div>    
    <!-- End Left Column -->

            
    <!-- End The Grid -->
        </div>
    <!-- End The Page Container -->

<p>&nbsp;</p>    
<p>&nbsp;</p>
<p>&nbsp;</p>
  
 
<!-- End Page Container -->


<?php 
    //Footer
    require_once '../../web_elements/footer.php'; ?> 

<?php
    //Script for toggling menu bar on small screen
    require_once '../../web_elements/script_menu.php';?>

</body>
</html> 

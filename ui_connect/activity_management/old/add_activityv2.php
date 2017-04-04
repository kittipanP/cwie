<?php
    //Session Query
    require_once '../../ui_connect/login/query/session.php';?>

<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';?>

<?php 
    //Add a new activity query
    require_once 'query/activity_query.php';?>

<?php 
    //Add a new activity function
    require_once 'function/func_add_activity.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <?php
    //All the meta and css links
    require_once '../../web_elements/head_link.php';?>
    <title>Add Activity</title>
</head>
<body class="w3-theme-l5">

<!-- Navigation bar Code -->
<?php
    //Navigation Bar
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
        <p></p>
        
        <a href="activity.php" style = "font-weight: bolder; color:#607D8B;"><i class="fa fa-arrow-left" aria-hidden="true"> Go Back</i></a>
        <form class ="msform" method="post" action="">
            <ul class="progressbar" >
                    <li class="active">Add New Activity</li>
                    <li>Assign to Trainee</li>
                    <li>Schedule an Email</li>
            </ul>
            <p></p>
            <fieldset>
                <h2 class="fs-title" style="text-align: center;">Add New Activity</h2>
                <div style="color: red;">
                <?php if ( isset($query_error) ) {?>
                <span class="fa fa-exclamation-circle" ></span> <?php echo $query_error; ?>
                <?php } ?>
                </div>
                <p></p>
                <input class=" input_name" type ="text" name ="act_name" placeholder ="Name" value="<?php echo $a_name ?>" autocomplete="off"/>
                <input class=" input_s_time" type ="time" name ="act_str_time" placeholder ="Start (HH:MM)" value ="<?php echo $a_str_time?>" />
                <input class=" input_e_time" type ="time" name ="act_end_time" placeholder ="End (HH:MM)" value ="<?php echo $a_end_time?>" />
                <input class="input_date" type ="date" name ="act_date" placeholder ="YYYY/MM/DD" value ="<?php echo $a_date?>" />
                <input  class="input_room" type ="text" name ="act_room" placeholder =" Room" value ="<?php echo $a_room?>" />
                <select class=" select_bldg" name="bldg">
                    <option value="">Select Building</option>
                <?php 
                //PHP code to show Building in drop down
                    if ($rowCount1 > 0){
                        while ($row = mysqli_fetch_assoc($show_all_bldg_query))
                            {
                        echo '<option value="'.$row['bldg_id'].'">'.$row['bldg_name'].'</option>';
                        }
                    }
                ?>
                </select>
                <br/>
                               
                <textarea class=" textarea" rows="5" cols="50" style = "resize: none;" name ="act_detail" value="<?php echo $a_detail ?>" autocomplete="off" placeholder="Details..."></textarea>
                <br/>
                <div style="color: red;">
                <?php if ( isset($fieldError) ) {?>
                <span class="fa fa-exclamation-circle"></span> <?php echo $fieldError; ?>
                <?php } ?>
                </div>
                <br/>
                <input class="action-button w3-round" type ="submit" name ="btn-add" value ="Add"  />
                <input type="button" name="next" class="next action-button w3-round" value="Next"/>
                
            </fieldset>
            
            
            <!--Second Form: Assign to Student -->
            <fieldset>
                <h2 class="fs-title" style="text-align: center;">Assign to Trainee</h2>
                <p></p>
                <input class=" input_name noselect" type ="text" name ="act_name1" placeholder ="Name" value ="Name: <?php echo $a_name ?>" autocomplete="off" readonly/>
                <input class=" input_s_time noselect" type ="text" name ="act_str_time1" placeholder ="Start (HH:MM)" value ="Start: <?php echo $a_str_time?>"  readonly/>
                <input class=" input_e_time noselect" type ="text" name ="act_end_time1" placeholder ="End (HH:MM)" value ="Finish: <?php echo $a_end_time?>" readonly/>
                <input  class="input_room noselect" type ="text" name ="act_room1"  placeholder =" Room" value =" Room: <?php echo $a_room?>" readonly />
                <input  class="input_room noselect" type ="text" name ="act_bldg1"  placeholder =" Building" value ="    Building: <?php echo $a_bldg?> " readonly />
                <input class="input_date noselect" type ="text" name ="act_date1"  placeholder ="YYYY/MM/DD" value ="Date: <?php echo $a_date?>" readonly/>
                <hr class ="hr"/>
                <h2 class="fs-subtitle" style="text-align: center;">Select Trainee Type</h2>
                
                <select class=" select_status" name="type" id = "type">
                    <option value="">Select Type</option>
                    <?php 
                    //PHP code to show Building in drop down
                        if ($rowCount > 0){
                            while ($row = mysqli_fetch_assoc($show_trainee_status_query)){
                                echo '<option value="'.$row['trainee_status_id'].'">'.$row['trainee_status_desc'].'</option>';
                            }
                        }
                    ?>
                </select>
                <br/>
                <?php if ( isset($fieldError2) ) {?>
                <span class="fa fa-exclamation-circle" style="color:#607D8B;"></span> <?php echo $fieldError2; ?>
                <?php } ?>
                <br/>
                <input type ="submit" name ="btn-assign" class="action-button"     value ="Add"  />
                <input type="button"  name="next"     class="next action-button" value="Next"/>
            </fieldset>
            <!--Third Form Schedule Email-->
            <fieldset>
                <h2 class="fs-title">Schedule an Email</h2>
                <input class=" input_name noselect" type ="text" name ="act_name2" placeholder ="Name" value ="Name: <?php echo $a_name ?>" autocomplete="off" readonly/>
                <input class=" input_s_time noselect" type ="text" name ="act_str_time2" placeholder ="Start (HH:MM)" value ="Start: <?php echo $a_str_time?>"  readonly/>
                <input class=" input_e_time noselect" type ="text" name ="act_end_time2" placeholder ="End (HH:MM)" value ="Finish: <?php echo $a_end_time?>" readonly/>
                <input  class="input_room noselect" type ="text" name ="act_room2"  placeholder =" Room" value =" Room: <?php echo $a_room?> " readonly />
                <input  class="input_room noselect" type ="text" name ="act_bldg2"  placeholder =" Building" value ="    Building: <?php echo $a_bldg?> " readonly />
                <input class="input_date noselect" type ="text" name ="act_date2"  placeholder ="YYYY/MM/DD" value ="Date: <?php echo $a_date?>" readonly/>
                <input class = "input_stype noselect" type="text" name="s_type2" placeholder="Student Type" value="To:  " readonly/>
                <hr class ="hr"/>
                <h2 class="fs-subtitle" style="text-align: center;">Email Timing & Date</h2>
                <input class = "input_e_time" type="time" name="sch_time" placeholder="Time (HH:MM)" />
                <input class = "input_date" type="date" name="sch_date" placeholder="YYYY/MM/DD" />
                <input type="submit" name="btn_email" class="action-button" value="Done" />
            </fieldset>
            
        </form>
                            
                    
                </div>
                    
                <!-- End Right Column -->
            </div>
        
        
         <!--Header Finish-->  
     
<!--Container Finish-->    
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
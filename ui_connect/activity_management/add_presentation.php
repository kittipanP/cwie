<?php
    //Session Query
    require_once '../../ui_connect/login/query/session.php';?>

<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';?>

<?php 
    //Add a new activity query
    require_once 'query/presentation_query.php';?>

<?php 
    //Add a new activity function
    require_once 'function/func_add_presentation.php';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php
        //All the meta and css links
        require_once '../../web_elements/head_link.php';?>
        <title>Add Presentation</title>
    </head>
    <body class="w3-theme-l5">
            <!-- Navigation bar Code -->
            <?php
                //Navigation Bar
                require_once '../../web_elements/nav_bar.php';?>
            <!-- Page Container -->
            <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px;">   
                <form class ="msform" method="post" action="">
                    <ul class="progressbar" >
                        <li class="active">Add New Presentation</li>
                        <li>Assign to Trainee</li>
                        <li>Schedule an Email</li>
                    </ul>
                    <p><p style="margin-top: 30px;"></p></p>
                    <fieldset>
                        <a href="presentation.php" ><span class="close">&times;</span></a>
                        <br/>
                        <h2 class="fs-title" style="text-align: center;">Add New Presentation</h2>
                        <div style="color: red;">
                            <?php if ( isset($prequery_error) ) {?>
                                <span class="fa fa-exclamation-circle" ></span> <?php echo $prequery_error; ?>
                            <?php } ?>
                        </div>
                        <p></p>
                        <input class=" input_s_time" type ="time" name ="pre_stime" placeholder ="Start (HH:MM)" value ="<?php echo $pre_stime?>" />
                        <input class=" input_e_time" type ="time" name ="pre_ftime" placeholder ="End (HH:MM)" value ="<?php echo $pre_ftime?>" />
                        <input class=" input_e_time" type ="time" name ="pre_dur" placeholder ="Duration (HH:MM)" value ="<?php echo $pre_dur?>" />
                        <input class="input_date" type ="date" name ="pre_date" placeholder ="YYYY/MM/DD" value ="<?php echo $pre_date?>" />
                        <input  class="input_room" type ="text" name ="pre_room" placeholder =" Room" value ="<?php echo $pre_room?>" />
                        <select class=" select_bldg_pre" name="pre_bldg" >
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
                        <!--<textarea id = "one" class=" textarea" rows="5" cols="50" style = "resize: none;" name ="pre_remark" value="<?php echo $a_detail ?>" autocomplete="off" placeholder="Remarks..."></textarea>-->
                        <br/>
                        <div style="color: red;">
                            <?php if ( isset($fieldErrorpre) ) {?>
                                <span class="fa fa-exclamation-circle"></span> <?php echo $fieldErrorpre; ?>
                            <?php } ?>
                        </div>
                        <br/>
                        <input type="button" name="next" class="next action-button w3-round" value="Next"/>
                    </fieldset>
                    <!--Second Form: Assign to Student -->
                    <fieldset>
                        <a href="presentation.php" ><span class="close">&times;</span></a>
                        <br/>
                        <h2 class="fs-title" style="text-align: center;">Assign to Trainee</h2>
                        <p></p>
                        <hr class ="hr"/>
                        <h2 class="fs-subtitle" style="text-align: center;">Select Trainee</h2>
                        <select  class=" select_status" name="pre_trainee">
                            <option value="">Select Trainee</option>
                                <?php 
                                //PHP code to show Building in drop down
                                    if ($rowCount > 0){
                                        while ($row = mysqli_fetch_assoc($show_trainee_query)){
                                            echo '<option value="'.$row['trainee_id'].'">'.$row['s_fname'].' '.$row['s_lname'].' '.$row['trainee_id'].'</option>';
                                        }
                                    }
                                ?>
                        </select>
                        <br/>
                        <?php if ( isset($fieldError2) ) {?>
                            <span class="fa fa-exclamation-circle" style="color:#607D8B;"></span> <?php echo $fieldError2; ?>
                        <?php } ?>
                        <br/>
                        <input type="button" name="previous" class="previous action-button w3-round" value="Previous" />
                        <input type="button"  name="next2" class="next action-button w3-round" value="Next"/>
                    </fieldset>
                        <!--Third Form Schedule Email-->
                    <fieldset>
                        <a href="presentation.php" ><span class="close">&times;</span></a>
                        <br/>
                        <h2 class="fs-title">Schedule an Email</h2>
                        <hr class ="hr"/>
                        <h2 class="fs-subtitle" style="text-align: center;">Email Timing & Date</h2>
                        <select class=" select_bldg" name="pre_email_type">
                            <option value="">Select Email Type</option>
                            <?php 
                            //PHP code to show Email Type in drop down
                                if ($rowCount2 > 0){
                                    while ($row = mysqli_fetch_assoc($show_all_e_type_query))
                                        {
                                    echo '<option value="'.$row['email_id'].'">'.$row['email_subject'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                        <input class = "input_e_time" type="time" name="pre_sch_time" placeholder="Time (HH:MM)" />
                        <input class = "input_date" type="date" name="pre_sch_date" placeholder="YYYY/MM/DD" />
                        <input type="button" name="previous" class="previous action-button w3-round" value="Previous" />
                        <input class="action-button w3-round" type ="submit" name ="btn-addpre" value ="Add"  />
                    </fieldset>
                </form>
            </div>
           <!--Extra white space for footer-->    
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

            <?php 
                //Footer
                //require_once '../../web_elements/footer.php'; ?>  

            <?php
                //Script for toggling menu bar on small screen
                require_once '../../web_elements/script_menu.php';?>

    </body>
</html> 
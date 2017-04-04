<?php
    //Session Query
    require_once '../../ui_connect/login/query/session.php';?>
<?php 
    //Add a new activity query
    require_once 'query/activity_query.php';?>
<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';?>

<?php 
    //Activity Upate
    require_once 'function/func_act_update.php';?>
<?php 
    //Get ID query
    require_once 'query/act_edit_query.php';
    $id =$_REQUEST['activity_id'];
    $id = $act_id;?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php
        //All the meta and css links
        require_once '../../web_elements/head_link.php';?>
        <title>Edit: Activity</title>
    </head>
    <body class="w3-theme-l5">
            <!-- Navigation bar Code -->
            <?php
                //Navigation Bar
                require_once '../../web_elements/nav_bar.php';?>
            <!-- Page Container -->
            <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px;">   
                <div class="w3-row"> 
                    <!--<a href="activity.php" style = "font-weight: bolder; color:#607D8B;"><i class="fa fa-arrow-left" aria-hidden="true"> Go Back</i></a>-->
                    <form class ="msform" method="post" action="">
                        <fieldset>
                            <a href="activity.php" ><span class="close">&times;</span></a>
                            <br/>
                            <h2 class="fs-title" style="text-align: center;">Edit: <?php echo $a_name ?></h2>
                            <div style="color: red;">
                            <?php if ( isset($updateerror) ) {?>
                            <span class="fa fa-exclamation-circle" ></span> <?php echo $updateerror; ?>
                            <?php } ?>
                            </div>
                            <p></p>
                            <input class=" input_name" type ="text" name ="act_name_ed" placeholder ="Name" value="<?php echo $a_name ?>" autocomplete="off"/>
                            <input class=" input_s_time" type ="time" name ="act_str_time_ed" placeholder ="Start (HH:MM)" value ="<?php echo $a_str_time?>" />
                            <input class=" input_e_time" type ="time" name ="act_end_time_ed" placeholder ="End (HH:MM)" value ="<?php echo $a_end_time?>" />
                            <input class="input_date" type ="date" name ="act_date_ed" placeholder ="YYYY/MM/DD" value ="<?php echo $a_date?>" />
                            <input  class="input_room" type ="text" name ="act_room_ed" placeholder =" Room" value ="<?php echo $a_room?>" />
                            <select class=" select_bldg_ed" name="bldg_ed">
                                <option value="<?php echo $a_bldg_id?>"><?php echo $a_bldg?></option>
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
                            <!--For Student Status-->
                            <select class=" select_status_ed" name="type_ed">
                                <option value="<?php echo $a_type_id?>"><?php echo $a_type?></option>
                                <?php 
                                //PHP code to show Student Status in drop down
                                    if ($rowCount > 0){
                                        while ($row = mysqli_fetch_assoc($show_trainee_status_query)){
                                            echo '<option value="'.$row['status_id'].'">'.$row['status_desc'].'</option>';
                                        }
                                    }
                                ?>
                            </select>              
                            <textarea class=" textarea" rows="5" cols="50" style = "resize: none;" name ="act_detail" value="" placeholder="Details"><?php echo $a_detail?></textarea>
                            <h2 class="fs-subtitle" style="text-align: center;">Schedule Email</h2>
                            
                            <select class=" select_bldg" name="ed_e_type">
                            <option value="<?php echo $ed_email_id?>"><?php echo $ed_email_type?> </option>
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
                            <input class="input_date" type ="date" name ="sch_date_ed" placeholder ="YYYY/MM/DD" value ="<?php echo $a_sch_date?>" />
                            <input  class="input_room" type ="time" name ="sch_time_ed" placeholder =" Time (HH:MM)" value ="<?php echo $a_sch_time?>" />
                            <br/>
                            <div style="color: red;">
                            <?php if ( isset($fieldError) ) {?>
                            <span class="fa fa-exclamation-circle"></span> <?php echo $fieldError; ?>
                            <?php } ?>
                            </div>
                            <br/>
                            <input type="submit" name="btn-update" class="next action-button w3-round" value="Update"/>
                        </fieldset>
                    </form>
                </div>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </body>
</html> 
<?php
    //Session Query
    require_once '../../ui_connect/login/query/session.php';?>
<?php 
    //Query to show all activities on the table
    require_once 'query/presentation_query.php'/* Query for showing all activities*/;?>
<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';?>

<?php 
    //Presentation Update
    require_once 'function/func_pre_update.php';?>
<?php 
    //Get ID query
    require_once 'query/pre_edit_query.php';
    $pre_id =$_REQUEST['presentation_id'];
    $pre_id = $pr_id;?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php
        //All the meta and css links
        require_once '../../web_elements/head_link.php';?>
        <title>Edit: Presentation</title>
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
                            <a href="presentation.php" ><span class="close">&times;</span></a>
                            <br/>
                            <h2 class="fs-title" style="text-align: center;">Edit Trainee Presentation</h2>
                            <div style="color: red;">
                            <?php if ( isset($update) ) {?>
                            <span class="fa fa-exclamation-circle" ></span> <?php echo $update; ?>
                            <?php } ?>
                            </div>
                            <p></p>
                            <input class=" input_name" type ="text" name ="pre_name_ed" placeholder ="Name"  readonly = "readonly" value="<?php echo $pre_sf_name ?>" autocomplete="off"/>
                            <input class=" input_s_time" type ="time" name ="pre_str_time_ed" placeholder ="Start (HH:MM)" value ="<?php echo $pre_stime?>" />
                            <input class=" input_e_time" type ="time" name ="pre_end_time_ed" placeholder ="End (HH:MM)" value ="<?php echo $pre_ftime?>" />
                            <input class=" input_e_time" type ="time" name ="pre_dur_ed" placeholder ="Duration (HH:MM)" value ="<?php echo $pre_dtime?>" />
                            <input class="input_date" type ="date" name ="pre_date_ed" placeholder ="YYYY/MM/DD" value ="<?php echo $pre_date?>" />
                            <input  class="input_room" type ="text" name ="pre_room_ed" placeholder =" Room" value ="<?php echo $pre_room?>" />
                            <!--For Building-->
                            <select class=" select_bldg_ed" name="bldg_ed">
                                <option value="<?php echo $pre_bldg_id?>"><?php echo $pre_bldg?></option>
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
                            <input class=" input_name" type ="text" name ="pre_score" placeholder ="Presentation Score" value="<?php echo $pre_score ?>"/>
                            <textarea class=" textarea" rows="5" cols="50" style = "resize: none;" name ="pre_remark" value="" placeholder="Remaks"><?php echo $pre_remark?></textarea>
                            <h2 class="fs-subtitle" style="text-align: center;">Schedule Email</h2>
                            
                            <select class=" select_bldg" name="pre_ed_e_type">
                            <option value="<?php echo $pr_email_id?>"><?php echo $pr_email?> </option>
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
                            <input class="input_date" type ="date" name ="pre_sch_date_ed" placeholder ="YYYY/MM/DD" value ="<?php echo $pr_sch_date?>" />
                            <input  class="input_room" type ="time" name ="pre_sch_time_ed" placeholder =" Time (HH:MM)" value ="<?php echo $pre_sch_time?>" />
                            <br/>
                            <div style="color: red;">
                            <?php if ( isset($fieldError) ) {?>
                            <span class="fa fa-exclamation-circle"></span> <?php echo $fieldError; ?>
                            <?php } ?>
                            </div>
                            <br/>
                            <input type="submit" name="pre_update" class="next action-button w3-round" value="Update"/>
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
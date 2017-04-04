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
require_once 'function/func_act_update.php';
?>

<div id="myModal" class="msform1 ">
    <form method="post" action="">
                 <!-- Modal content -->

            <fieldset>
                    <div>
                        <span class="close">&times;</span>
                    </div>
                    <br/>
                    <h2 class="fs-title" style="text-align: center;">Add New Activity</h2>
                    <div style="color: red;">
                    <?php if ( isset($query_error) ) {?>
                    <span class="fa fa-exclamation-circle" ></span> <?php echo $query_error; ?>
                    <?php } ?>
                    </div>
                    <p></p>
                    <?php 
                        $id =$_REQUEST['activity_id'];
                        $query = mysqli_query($link, "SELECT activity_id, activity_name,activity_detail, start_time , end_time , activity_date,
                                activity_date, activity_room, bldg_name, IFNULL(status_desc, 'Unassigned') status_desc
                                FROM trainee_info_has_trainee_activity 
                                LEFT JOIN student_status ON student_status.status_id = trainee_info_has_trainee_activity.student_status_id
                                RIGHT JOIN trainee_activity ON trainee_activity.activity_id = trainee_info_has_trainee_activity.trainee_activity_id
                                INNER JOIN building_info ON building_info.bldg_id = trainee_activity.bldg_id
                                WHERE activity_id = $id
                                AND activity_date >= (CURRENT_DATE)
                                order by activity_date ASC");    
                        while ($row= mysqli_fetch_array($query)){
                               $a_name = $row['activity_name'];
                                $a_str_time = $row['start_time'];
                                $a_date = $row['activity_date'];
                                $a_end_time = $row['end_time'];
                                $a_room = $row['activity_room'];
                                $a_bldg = $row['bldg_name'];
                                $a_type = $row['status_desc'];
                                $a_detail = $row['activity_detail'];
                            
                            }?>
                    <input class=" input_name" type ="text" name ="act_name_ed" placeholder ="Name" value="<?php echo $a_name ?>" autocomplete="off"/>
                    <input class=" input_s_time" type ="time" name ="act_str_time_ed" placeholder ="Start" value ="<?php echo $a_str_time?>" />
                    <input class=" input_e_time" type ="time" name ="act_end_time_ed" placeholder ="End" value ="<?php echo $a_end_time?>" />
                    <input class="input_date" type ="date" name ="act_date_ed" placeholder ="Date" value ="<?php echo $a_date?>" />
                    <input  class="input_room" type ="text" name ="act_room_ed" placeholder =" Room" value ="<?php echo $a_room?>" />
                    <select class=" select_bldg_ed" name="bldg_ed">
                        <option value="">Current: <?php echo $a_bldg?></option>
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
                    <select class=" select_status" name="type_ed">
                    <option value="">Type: <?php echo $a_type?></option>
                    <?php 
                    //PHP code to show Building in drop down
                        if ($rowCount > 0){
                            while ($row = mysqli_fetch_assoc($show_trainee_status_query)){
                                echo '<option value="'.$row['status_id'].'">'.$row['status_desc'].'</option>';
                            }
                        }
                    ?>
                </select>
                    <br/>
                    <textarea class=" textarea" rows="5" cols="50" style = "resize: none;" name ="act_detail_ed" value="" autocomplete="off" placeholder="Details"><?php echo $a_detail ?></textarea>
                    <br/>
                    <div style="color: red;">
                    <?php if ( isset($fieldError) ) {?>
                    <span class="fa fa-exclamation-circle"></span> <?php echo $fieldError; ?>
                    <?php } ?>
                    </div>
                    <br/>
                    
                    <input class="action-button w3-round" type ="submit" name ="btn-update" value ="Update"  />
                </fieldset>    
            </form>
    </div>

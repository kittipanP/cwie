<?php
    //Session Query
    require_once '../../ui_connect/login/query/session.php';?>
<?php 
    //Query to show all email on the table
    require_once 'query/email_query.php';?>
<?php
    //Database Connection
    require_once '../../db_connect/dbconnection.php';?>

<?php 
    //Activity Upate
    require_once 'function/func_email_update.php';?>
<?php 
    //Get ID query
    require_once 'query/email_edit_query.php';
    $id =$_REQUEST['sch_email_id'];
    $id = $sch_id;?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php
        //All the meta and css links
        require_once '../../web_elements/head_link.php';?>
        <title>Edit: Email</title>
    </head>
    <body class="w3-theme-l5">
        <!-- Navigation bar Code -->
        <?php
            //Navigation Bar
            require_once '../../web_elements/nav_bar.php';?>
        <!-- Page Container -->
        <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px;">   
            <div class="w3-row"> 
                <p></p>
                <!-- Back Button -->
                <!--<a href="email_management.php" style = "font-weight: bolder; color:#607D8B;"><i class="fa fa-arrow-left" aria-hidden="true"> Go Back</i></a>-->
                <p>&nbsp;</p>
                <form class ="msform" method="post" action="" >
                    <fieldset>
                        <a href="email_management.php" ><span class="close">&times;</span></a>
                        <br/>
                        <p></p>
                        <h2 class="fs-title" style="text-align: center;">Edit: <?php echo $e_subjet ?></h2>
                        <div style="color: red;">
                            <?php if ( isset($updateerror) ) {?>
                                <span class="fa fa-exclamation-circle" ></span> <?php echo $updateerror; ?>
                            <?php } ?>
                        </div>
                        <p></p>
                        <input class=" input_name" type ="text" name ="e_subject" placeholder ="Subject" value="<?php echo $e_subjet ?>" autocomplete="off"/>
                        <select class=" select_bldg" name="e_type">
                            <option value="<?php echo $e_type_id?>">Email:<?php echo $e_type?></option>
                            <?php 
                            //PHP code to show Email Type in drop down
                                if ($rowCount1 > 0){
                                    while ($row = mysqli_fetch_assoc($show_all_e_type_query))
                                        {
                                    echo '<option value="'.$row['email_id'].'">'.$row['email_subject'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                        <!-- Show Student Type-->
                        <select class=" select_bldg" name="type_ed">
                            <option value="<?php echo $stu_type_id?>">Recipient: <?php echo $stu_type?></option>
                            <?php 
                            //PHP code to show Status in drop down
                                if ($rowCount > 0){
                                    while ($row = mysqli_fetch_assoc($show_trainee_status_query)){
                                        echo '<option value="'.$row['status_id'].'">'.$row['status_desc'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                        <input class=" input_e_time" type ="time" name ="e_time" placeholder ="Time (HH:MM)" value ="<?php echo $e_time?>" />
                        <input class="input_date" type ="date" name ="e_date" placeholder ="YYYY/MM/DD" value ="<?php echo $e_date?>" />
                        <br/>
                        <div style="color: red;">
                            <?php if ( isset($fieldError5) ) {?>
                            <span class="fa fa-exclamation-circle"></span> <?php echo $fieldError5; ?>
                            <?php } ?>
                        </div>
                        <br/>
                        <input type="submit" name="btn-updateemail" class="next action-button w3-round" value="Update"/>
                    </fieldset>
                </form>
             </div>
        </div>
    </body>
</html> 
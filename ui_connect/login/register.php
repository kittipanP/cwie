<?php 
    //Database connection
    require_once '../../db_connect/dbconnection.php'; //Connection to Database?>

<?php
    //Login Fucntion
    require_once 'function/func_register.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
            //All the meta and css links
            require_once '../../web_elements/head_link.php';
        ?>
        <title>Register: Add a new user</title>
    </head>
    <body class="w3-theme-l5">

    <!-- Navigation bar -->
    <?php 
        require_once '../../web_elements/nav_bar.php';
    ?>

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

            <!-- Back Button -->
            <a href="update.php" style = "font-weight: bolder; color:#607D8B;"><i class="fa fa-arrow-left" aria-hidden="true"> Go Back</i></a>
            <form class = "login_form"  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">                        
                <fieldset>
                    <h2 class="login-title">Register</h2>
                    <?php if ( isset($errMSG) ) {?>
                    <div class="login_error" style="color:red;">
                            <span class="fa fa-exclamation-circle" style="color:red;"></span> <?php echo $errMSG; ?>
                    </div>
                    <br/>
                    <?php } ?>
                    <div class="form-group1">
                        <input type="text" name="name_reg" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <?php if ( isset($nameError) ) {?>
                            <h6 style = "text-align: left; color: red;"><?php echo $nameError; ?></h6>
                        <?php }?>
                    </div>
                    <div class="form-group1">
                        <input class=" form-control1 " type="email" name="email_reg" placeholder="Email" value="<?php echo $email; ?>" />
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <?php if ( isset($emailError) ) {?>
                            <h6 style = "text-align: left; color: red;"><?php echo $emailError; ?></h6>
                        <?php }?>
                    </div>
                    <div class="form-group1">
                        <div>
                            <?php require_once 'function/func_show_pass.php'; ?>
                            <input class = "form-control1" type="password" id="pass_reg" name =" pass_reg" placeholder="Password" />
                            <span id="ShowHidePassword" class="dvShowHidePassword hint--top hint--bounce hint--rounded"data-hint="Show" onclick="ShowHidePassword(this.id);"><i class="fa fa-eye"></i>
                            </span>
                        </div>
                        <?php if ( isset($passError) ) {?>
                            <h6 style = "text-align: left; color: red;"><?php echo $passError; ?></h6>
                        <?php }?>
                    </div>
                    <div class="form-group1">
                        <div>
                            <?php require_once 'function/func_show_pass.php'; ?>
                            <input class = "form-control1" type="password" id="pass_reg" name =" pass_reg_conf" placeholder="Confirm Password" />
                            <span id="ShowHidePassword" class="dvShowHidePassword hint--top hint--bounce hint--rounded"data-hint="Show" onclick="ShowHidePassword(this.id);"><i class="fa fa-eye"></i>
                            </span>
                        </div>
                        <?php if ( isset($passconError) ) {?>
                            <h6 style = "text-align: left; color: red;"><?php echo $passconError; ?></h6>
                        <?php }?>
                    </div>
                    <input class="action-button w3-round" type ="submit" name = "btn-signup" value = "Sign Up"/>       
                </fieldset>
            </form>
                            
            </div>

        </div>    
        <p>&nbsp;</p>
        <p>&nbsp;</p>
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

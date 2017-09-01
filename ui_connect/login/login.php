<?php 
    //Database connection
    require_once '../../db_connect/dbconnection.php'; //Connection to Database?>

<?php
    //Login Fucntion
    require_once 'function/func_login.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php
            //All the meta and css links
            require_once '../../web_elements/head_link.php';
        ?>
    
    <title>Login: WD Trainee</title>
</head>

<body class="w3-theme-l5">

<!-- Page Container Start -->
    <div class="w3-container w3-content" style="max-width:1400px;margin-top:2px">   
    <!-- The Grid Start -->
        <div class="w3-row"> 

            <!-- Header -->
<!--AUG 1, 2017 [S]
            <header class="w3-container w3-theme w3-padding w3-round" id="myHeader">
                <div class="w3-center">
                    <h1 class="w3-xxlarge w3-animate-left">Welcome To</h1>
                    <h1 class="w3-xxxlarge w3-animate-right">Trainee Management System</h1>
                </div>
            </header>
AUG 1, 2017 [E]-->
            <p>&nbsp;</p>
             <p>&nbsp;</p>
              <p>&nbsp;</p>
             <p>&nbsp;</p>
              <p>&nbsp;</p>
               
        <!--Login Code-->
            <form class = "login_form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                <fieldset>
                    <h2 class="login-title">Login</h2>
                    <?php if ( isset($errMSG) ) {?>
                    <div class="login_error" style="color:red;">
                            <span class="fa fa-exclamation-circle" style="color:red;"></span> <?php echo $errMSG; ?>
                    </div>
                    <br/>
                    <?php } ?>
                    <div class = "form-group">
                    <input class=" form-control" type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" />
                    <li class="fa fa-envelope" aria-hidden="true"></li>
                    <?php if ( isset($emailError) ) {?>
                        <h6 style = "text-align: left; color: red;"><?php echo $emailError; ?></h6>
                    <?php }?>
                    </div>
                    <div class="form-group">
                        <?php require_once 'function/func_show_pass.php'; ?>
                        <input class = "form-control" type="password" name="pass" id =" pass" class="form-control" placeholder="Password" />
                        <span id="ShowHidePassword" class="dvShowHidePassword hint--top hint--bounce hint--rounded"
                        data-hint="Show" onclick="ShowHidePassword(this.id);"><i class="fa fa-eye"></i>
                        </span>
                        <?php if ( isset($passError) ) {?>
                        <h6 style = "text-align: left; color: red;"><?php echo $passError; ?></h6>
                    <?php }?>
                    </div>   
                    <input class="action-button w3-round" type ="submit" name = "btn-login" value = "Login"/>       
                </fieldset>
            </form>
        </div>
    </div>
                    
<p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p>
                <p>&nbsp;</p>
  <p>&nbsp;</p>
                <p>&nbsp;</p>
 <p>&nbsp;</p>
                <p>&nbsp;</p>
<!-- End Page Container -->


<?php 
    //Footer
//AUG 1, 2017    require_once '../../web_elements/footer.php'; ?> 

<?php
    //Script for toggling menu bar on small screen
    require_once '../../web_elements/script_menu.php';?>
</body>
</html> 

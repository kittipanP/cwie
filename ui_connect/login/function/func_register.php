<?php
    //Session Query
    require_once '../../ui_connect/login/query/session.php';?>

<?php
        $error = false;
        //get user input data
        if(isset($_POST['btn-signup']))
        {
                        $UInputName = trim($_POST['name_reg']);
			$UInputName = strip_tags($UInputName);
			$UInputName = htmlspecialchars($UInputName);
			
			$UInputEmail = trim($_POST['email_reg']);
			$UInputEmail = strip_tags($UInputEmail);
			$UInputEmail = htmlspecialchars($UInputEmail);
			
			$UInputPass = trim($_POST['pass_reg']);
			$UInputPass = strip_tags($UInputPass);
			$UInputPass = htmlspecialchars($UInputPass);
                        
                        $UInputPassCon = trim($_POST['pass_reg_conf']);
			$UInputPassCon = strip_tags($UInputPassCon);
			$UInputPassCon = htmlspecialchars($UInputPassCon);
                        
                        // basic name validation
                        if (empty($UInputName)) {
                                $error = true;
                                $nameError = "Please enter your full name";
                        } else if (strlen($UInputName) < 3) {
                                $error = true;
                                $nameError = "Name must have atleat 3 characters";
                        } else if (!preg_match("/^[a-zA-Z ]+$/",$UInputName)) {
                                $error = true;
                                $nameError = "Name must contain alphabets and space";
                        }
                        //basic email validation
                        if ( !filter_var($UInputEmail,FILTER_VALIDATE_EMAIL) ) {
                                $error = true;
                                $emailError = "Please enter valid email address";
                        } else {
                                // check email exist or not
                                $result =mysqli_query($link, "SELECT email FROM login_info WHERE email='$UInputEmail'");

                                $count = mysqli_num_rows($result);
                                if($count!=0){
                                        $error = true;
                                        $emailError = "Provided Email is already in use";
                                }
                        }
                        // password validation
                        if (empty($UInputPass)){
                                $error = true;
                                $passError = "Please enter password";
                        } else if(strlen($UInputPass) < 6) {
                                $error = true;
                                $passError = "Password must have atleast 6 characters";
                        }
                         // Confrim password validation
                        if (empty($UInputPassCon)){
                                $error = true;
                                $passError = "Please enter passwords";
                        } else if($UInputPassCon != $UInputPass) {
                                $error = true;
                                $passconError = "Password does not match";
                        }
                        
			$passwordEncypt = hash('sha256', $UInputPass);
			//call validation function here
			if( !$error ) {
				
				$query = mysqli_query( $link, "INSERT INTO login_info (full_name,email,password) VALUES('$UInputName','$UInputEmail','$passwordEncypt')");
				if ($query){
                                $errTyp = "success";
                                $errMSG = "Successfully registered";
                                header("Refresh: 1; url = update.php");
                                }
                        
				else
				{       $errTyp = "danger";
					$errMSG = "Something went wrong, please try again";	
				}
			
                        }
        }

?>
<?php 
    //Database Connection
    require_once '../../db_connect/dbconnection.php';?>
<!--Navigation Bar-->
<!-- Navbar (sit on top) -->
<div class="w3-top">
    <ul class=" w3-theme-d2"> 
        <!--Account Ask Bon to Help-->
        <li class=" w3-right w3-dropdown-hover w3-theme-d2 ">
            <!--<a href="#" class=" w3-hide-small w3-padding-large w3-hover-white w3-avatar" title=""><img src="img/Avatar/boy.png" alt="Avatar" width="106" height="102" class="w3-circle" style="height:25px;width:25px"></img></a>-->
            <h6 class=" w3-hover usernavh6 w3-username" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  <img  src="../../img/Avatar/boy.png"  width="24" height="24" title="<?php echo $userRow['full_name'];?>"> <?php echo $userRow[ 'full_name' ];?> &nbsp; </h6>
            <!--Drop Down Menu for Account-->
            <div class="w3-dropdown-content w3-white w3-card-4 ">
                <!--PHP Code here for the username to show-->
                <a style="font-size: 16px;" href="../../ui_connect/login/register.php">Add a user </a>
                <a style="font-size: 16px;" href="../../ui_connect/login/update.php">Update a user</a>
                <a style="font-size: 16px;" href="../../ui_connect/login/function/func_logout.php?logout">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </div>
        </li>
        <li class=" w3-right w3-dropdown-hover w3-theme-d2 ">
            <!--<a href="#" class=" w3-hide-small w3-padding-large w3-hover-white w3-avatar" title=""><img src="img/Avatar/boy.png" alt="Avatar" width="106" height="102" class="w3-circle" style="height:25px;width:25px"></img></a>-->
            <h6 class=" w3-hover usernavh6 w3-username" >  &nbsp;  &nbsp; &nbsp; &nbsp;  <a href="../../ui_connect/Student_Management/Student_Management.php" class=""><img  src="../../img/icon/house.png"  width="24" height="24" title="">&nbsp;&nbsp;Back</a> &nbsp; </h6>
            <!--Drop Down Menu for Account-->
        </li>
    </ul>
</div>
<!-- Navigation bar on small screens -->


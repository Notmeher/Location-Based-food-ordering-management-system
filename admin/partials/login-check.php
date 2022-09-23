<?php
    //Check whether the user is logged in or not
    if(!isset($_SESSION['user']))
    {
        //User is not logged in
        $_SESSION['no-login-message'] = "<div class='error text-center'>Access Denied</div>";
        //REdirect to Login Page
        header('location:'.SITEURL.'admin/login.php');
    }

?>

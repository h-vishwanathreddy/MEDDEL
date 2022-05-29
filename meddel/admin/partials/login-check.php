<?php

    //Authorization-Access Control
    if(!isset($_SESSION['user']))   //If user session is not set
{
    $_SESSION['no-login-message']="<div class='error text-center'>Please login to access Admin panel.</div>";

    // Redirect page to manage admin
    header('location:'.SITEURL.'admin/login.php');
}

?>
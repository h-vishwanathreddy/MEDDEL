<?php

include('../config/constants.php');

//Destroy seesion
session_destroy();

//Redirect to login page
header('location:'.SITEURL.'admin/login.php');



?>
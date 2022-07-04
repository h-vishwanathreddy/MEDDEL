
<?php
    ob_start();
    //Start session
    session_start();



    // Create constants to store non-repeating variables
    define('SITEURL','http://localhost/medicine-order/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','medicine-order');

    // Execute query and save data in database
    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error($conn));//Database connection
    $db_select = mysqli_select_db($conn,DB_NAME)or die(mysqli_error($conn)); //Selecting database

?>
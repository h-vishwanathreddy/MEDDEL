<?php include('../config/constants.php'); ?>


<html>

<head>
    <title>Login-Food Order System</title>

    <link rel="stylesheet" href="../css./admin.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>

</head>

<body>

    <div class="login">
        <h1 class="text-center">Login</h1>
        <br>

        <?php
        if(isset($_SESSION['login']))
            {
              echo $_SESSION['login'];//Displaying session message
              unset($_SESSION['login']);//Removing session message
            }

            if(isset($_SESSION['no-login-message']))
            {
              echo $_SESSION['no-login-message'];//Displaying session message
              unset($_SESSION['no-login-message']);//Removing session message
            }

?>
        <br><br>

        <!-- Login form starts here -->
        <form action="" method="post" class=text-center>
            <!-- Username: <br> -->
            <!-- <input type="text" name="username" placeholder="Enter Username"><br><br> -->

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter Username" id="username"
                    aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text"></div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" placeholder="Enter Password" class="form-control"
                    id="exampleInputPassword1">
            </div><br><br>

            <input class="btn btn-primary" type="submit" name="submit" value="Login"><br><br>

        </form>

        <p class="text-center">Created by <a href="#">Srujan Rao</a></p>
    </div>



</body>

</html>

<?php

if(isset($_POST['submit']))
{
    //Get all values from form 
     $username=$_POST['username'];
      $password= md5($_POST['password']);

     $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

     $res=mysqli_query($conn,$sql);

   

    //Count rows to check whether user exists or not
         $count=mysqli_num_rows($res);

            if($count==1)
            {
                $_SESSION['login']="<div class='success'>Login successful.</div>";
                $_SESSION['user']=$username; //to check whether user is logged in or not and logout will unset it

            // Redirect page to manage admin
                header('location:'.SITEURL.'admin/');
            }
            else{

                $_SESSION['login']="<div class='error text-center'>Username or Password did not match.</div>";

                // Redirect page to manage admin
                    header('location:'.SITEURL.'admin/login.php');
            }
     
}
?>
<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
    <br>

    <?php
         if(isset($_SESSION['add'])) //Checking whether session is set or not
         {
           echo $_SESSION['add'];//Disply the session message if set
           unset($_SESSION['add']);//Removing session message
         }
    ?>

<form action="" method="post">

    <table>
        <tr>
            <td>Full Name:</td>
            <td><input type="text" name="full_name" placeholder="Enter your name"></td>
        </tr>

        <tr>
            <td>Username:</td>
            <td><input type="text" name="username" placeholder="Your username"></td>
        </tr>

        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" placeholder="Your password"></td>
        </tr>

        <tr>
            <td>
            <input class="btn btn-success" type="submit" name="submit" value="Add Admin">

            <!-- <a name="submit" type="submit" class="btn btn-primary"value="Add Admin" href="#" role="button">Add Admin</a> -->
            </td>
        </tr>

    </table>
</form>

    </div>
</div>     

<?php include('partials/footer.php'); ?>

<?php
    // Process the value from form and save it in database
    // Check whether submit button is clicked or not

    if(isset($_POST['submit']))
    {
        //1. get data from form
        
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];
        $password=md5($_POST['password']);//Password encryption with MD5

        //2. Sql query to save data into database
        $sql="INSERT INTO tbl_admin SET
        full_name='$full_name',
        username= '$username',
        password='$password'
        ";

        
        //3. Excuting query and saving data into database
        $res=mysqli_query($conn,$sql) or die(mysqli_error());

        //4. Check whether (query is executed)data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            // Data inserted
            // echo "data inserted";
            //Create a session variable to display message
            $_SESSION['add'] ="Admin Added Successfully";
            // Redirect page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            // failed to insert data
            // echo "failed to insert data";
            //Create a session variable to display message

            $_SESSION['add']="Failed to Add Admin";
            // Redirect page to add admin
            header("location:".SITEURL.'admin/add-admin.php');
        }

    }
    
    
?>
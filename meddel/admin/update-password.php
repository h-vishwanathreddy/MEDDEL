<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br>

    <?php
        if(isset($_GET['id']))
    {
        $id=$_GET['id'];
    }
    ?>

        <form action="" method="post">

            <table>
                <tr>
                    <td>Current Password:</td>
                    <td><input type="password" name="current_password" placeholder="Current Password"></td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td><input type="password" name="new_password" placeholder="New Password"></td>
                </tr>

                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="confirm_password" placeholder="Confirm Password"></td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id;?>">

                        <input class="btn btn-success" type="submit" name="submit" value="Change Password">

                        <!-- <a name="submit" type="submit" class="btn btn-primary"value="Add Admin" href="#" role="button">Add Admin</a> -->
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>


<?php

if(isset($_POST['submit']))
{
    //Get all values fromform to update
     $id=$_POST['id'];
    $current_password=md5($_POST['current_password']);
    $new_password=md5($_POST['new_password']);
    $confirm_password=md5($_POST['confirm_password']);



    $sql="SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
    //Execute the query
    $res=mysqli_query($conn,$sql);

    // Check whether the query is executed or not
    if($res==TRUE)
    {
      //Count rows to check whether we have data in database or not
      $count=mysqli_num_rows($res);//Function to get all rows in database

      //Check the no. of rows
      if($count==1)
      {
        

        if($new_password==$confirm_password)
        {
            //Update Password
            $sql2="UPDATE tbl_admin SET password='new_password'WHERE id=$id";

            $res2=mysqli_query($conn,$sql2);

            if($res2==TRUE)
            {
                $_SESSION['change-pad']="<div class='success'>Password changed Successfully</div>";

                header('location:'.SITEURL.'admin/manage-admin.php');
            }
            else{

                $_SESSION['change-pad']="<div class='error'>Failed to change Password.</div>";

                header('location:'.SITEURL.'admin/manage-admin.php');
            }





        }
        else
        {
            $_SESSION['pad-not-match']="<div class='error'>Password did not match.</div>";

        header('location:'.SITEURL.'admin/manage-admin.php');
        }
      }
      else{
        $_SESSION['user-not-found']="<div class='error'>user not found.</div>";

        header('location:'.SITEURL.'admin/manage-admin.php');
      }
    }


}




?>

<?php include('partials/footer.php'); ?>
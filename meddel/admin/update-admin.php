<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br>

        <?php
            //1.Get the id of selected admin
            $id=$_GET['id'];
        
            //2.Create sql query to get the details
            $sql="SELECT * FROM tbl_admin WHERE id=$id";

            //Execute the query
            $res=mysqli_query($conn,$sql);

            //Check whether the query is executed or not
        if($res==TRUE)
        {
           
            $count=mysqli_num_rows($res);

            if($count==1)
            {
                //Get the details
                $rows=mysqli_fetch_assoc($res);

                $full_name=$rows['full_name'];
                $username=$rows['username'];
            }

            else{
                header('location:'.SITEURL.'admin/manage-admin.php');

            }
        }
                ?>


        <form action="" method="post">

            <table>
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name;?>"placeholder="Enter your name"></td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username"  value="<?php echo $username;?>"placeholder="Your username"></td>
                </tr>
                <tr>
                    <td></td>
                </tr>

                <tr>
                    <td>

                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input class="btn btn-success" type="submit" name="submit" value="Update Admin">

                        <!-- <a class="btn btn-success" href="" role="button">Update Admin</a> -->

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
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];

    //Create a sql query to update admin
    $sql="UPDATE tbl_admin SET full_name='$full_name',username='$username' WHERE id='$id'";

    //Execute the query
    $res=mysqli_query($conn,$sql);

    if($res==TRUE)
        {
            // Data inserted
            // echo "data inserted";
            //Create a session variable to display message
            $_SESSION['update']="<div class='success'>Admin Updated successfully</div>";
            // Redirect page to manage admin
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            // failed to insert data
            // echo "failed to insert data";
            //Create a session variable to display message

            $_SESSION['update']="<div class='error'>Failed to delete admin</div>";
            // Redirect page to add admin
            header('location:'.SITEURL.'admin/manage-admin.php');
        }

}


?>





<?php include('partials/footer.php'); ?>
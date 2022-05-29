<?php

include('../config/constants.php');

// <!-- 1. get the id of admin to be deleted  -->
$id=$_GET['id'];
// <!-- 2. Create sql query to delete admin  -->
$sql="DELETE FROM tbl_admin WHERE id=$id";

// <!-- Execute the query -->
$res=mysqli_query($conn,$sql);

// check whether query success or not 
if($res==true)
{
    $_SESSION['delete']="<div class='success'>Admin deleted successfully</div>";

    //Redirect to main Admin page 
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else{
    $_SESSION['delete']="<div class='error'>Failed to delete admin.Try again later </div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}

// <!-- 3. Redirect to manage admin page with message  -->


?>

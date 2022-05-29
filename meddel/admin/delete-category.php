<?php

include('../config/constants.php');

//Check whetether id and image_name value is set or not
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];

    //Remove the physical image file if available
    if($image_name!="")
    {
        //Image is available.So remove it 
        $path="../images/category/".$image_name;
        
        //Remove the image
        $remove=unlink($path);

        //If failed to remove image then add an error message and stop the process
        if($remove==false)
        {
            $_SESSION['remove']="<div class='error'>Failed to Remove Category image.</div>";

            header('location:'.SITEURL.'admin/manage-category.php');

            //Stop the process
            die();
        }
    }

    //Delete file from database 
    $sql="Delete FROM tbl_category WHERE id=$id";

    //Execute the query
    $res=mysqli_query($conn,$sql);

    //Check whether data is deleted or not
    if($res==true)
    {
        $_SESSION['delete']="<div class='success'>Category deleted successfully.</div>";

        header('location:'.SITEURL.'admin/manage-category.php');
    }
    else{

        $_SESSION['delete']="<div class='error'>Failed to delete Category.</div>";
    }
    
    //Redirect to manage category page with message
}
else
{
    header('location:'.SITEURL.'admin/manage-category.php');
}




?>
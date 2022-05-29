<?php
include('../config/constants.php');

//Check whetether id and image_name value is set or not
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    //Get id and image name
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];

    //Check and Remove the physical image file if available
    if($image_name!="")
    {
        //Image is available.So remove it 
        $path="../images/food/".$image_name;
        
        //Remove the image
        $remove=unlink($path);

        //Check and If failed to remove image then add an error message and stop the process
        if($remove==false)
        {
            $_SESSION['upload']="<div class='error'>Failed to Remove Image file.</div>";

            header('location:'.SITEURL.'admin/manage-food.php');

            //Stop the process
            die();
        }
    }

    //3.Delete file from database 
    $sql="Delete FROM tbl_food WHERE id=$id";

    //Execute the query
    $res=mysqli_query($conn,$sql);

    //Check whether data is deleted or not
    if($res==true)
    {
        $_SESSION['delete']="<div class='success'>Food deleted successfully.</div>";

        header('location:'.SITEURL.'admin/manage-food.php');
    }
    else{

        $_SESSION['delete']="<div class='error'>Failed to delete Food.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }
    
    
}
else
{
    $_SESSION['unauthorize']="<div class='error'>Unauthorized Access.</div>";
    header('location:'.SITEURL.'admin/manage-food.php');
}


?>
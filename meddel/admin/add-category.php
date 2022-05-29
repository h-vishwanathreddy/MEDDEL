<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>

        <?php
            if(isset($_SESSION['add']))
            {
              echo $_SESSION['add'];//Displaying session message
              unset($_SESSION['add']);//Removing session message
            }
            if(isset($_SESSION['upload']))
            {
              echo $_SESSION['upload'];//Displaying session message
              unset($_SESSION['upload']);//Removing session message
            }
         ?>

        <br><br>

        <form action="" method="post" enctype="multipart/form-data">

            <table>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" placeholder="Category Title"></td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="btn btn-success" type="submit" name="submit" value="Add Category">
                    </td>
                </tr>
            </table>
        </form>

        <?php

if(isset($_POST['submit']))
{
    $title=$_POST['title'];

    if(isset($_POST['featured']))
    {
        $featured=$_POST['featured'];
    }
    else{

        //Set the default value
        $featured="No";
    }



    if(isset($_POST['active']))
    {
        $active=$_POST['active'];
    }
    else{

        //Set the default value
        $active="No";
    }

    //Check whether image is selected or not and set value for image name accordngly

    /* print_r($_FILES['image']);

    die(); */  //Break code here

    if(isset($_FILES['image']['name']))
{
        //Upload image
        //to upload image, we need image name, source path and destination path
        $image_name=$_FILES['image']['name'];

        // Check if image is selected or not,then Upload image only if image is selected
        if($image_name!="")
        {

        //Auto rename our image
        //Get extension of our image(jpg,png,etc.)
        $ext = end(explode('.', $image_name));  //break into two..eg.srujan jpg

        //Rename the image
        $image_name="Food_Category_".rand(000,999).'.'.$ext;  //Food_Category_798.jpg



        $source_path=$_FILES['image']['tmp_name'];

        $destination_path="../images/Category/".$image_name;

        //Finally upload image
        $upload=move_uploaded_file($source_path,$destination_path);

        //Check whether the image is uploaded or not
        //If image is not uploaded, will redirect with error message
        if($upload==false)
        {
            $_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";

            // Redirect page to manage admin
            header('location:'.SITEURL.'admin/add-category.php');
            //Stop the process
            die();
        }
    }

}
    else{

        //Dont upload image and set image_name value as blank
        $image_name="";
    }




    //Execute sql query to insert category into database
    $sql="INSERT INTO tbl_category SET 
    title='$title',
    image_name='$image_name',
    featured='$featured',
    active='$active'
    ";

   //Execute the query and save in database 
   $res=mysqli_query($conn,$sql);

   if($res==TRUE)
        {
          
            //Create a session variable to display message
            $_SESSION['add']="<div class='success'>Category Added successfully</div>";
            // Redirect page to manage admin
            header('location:'.SITEURL.'admin/manage-category.php');
        }
     else{
        $_SESSION['add']="<div class='error'>Failed to add Category</div>";
        // Redirect page to manage admin
        header('location:'.SITEURL.'admin/manage-category.php');
     }
}

?>

    </div>
</div>





<?php include('partials/footer.php'); ?>
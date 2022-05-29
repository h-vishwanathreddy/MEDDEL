<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br>


        <?php
    if(isset($_GET['id']))
    {

        // echo "Getting the data";
        $id=$_GET['id'];

        $sql2="Select * FROM tbl_food WHERE id=$id";

        $res2=mysqli_query($conn,$sql2);

        $count=mysqli_num_rows($res2);

        
            $row2=mysqli_fetch_assoc($res2);
            $title=$row2['title'];
            $description=$row2['description'];
            $price=$row2['price'];
            $current_image=$row2['image_name'];
            $current_category=$row2['category_id'];
            $featured=$row2['featured'];
            $active=$row2['active'];
        
        
    }
    else{

        header('location:'.SITEURL.'admin/manage-food.php');
    }
    ?>


        <form action="" method="post" enctype="multipart/form-data">

            <table>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" value="<?php echo $title; ?>"></td>
                </tr>

                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" id="" cols="30" rows="5"><?php echo $description;?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td><input type="number" name="price" value="<?php echo $price; ?>"></td>
                </tr>

                <tr>
                    <td>Current Image:</td>
                    <td>
                        <?php
                    if($current_image!="")
                    {
                        ?>

                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image;?>" width="150px">

                        <?php

                    }
                    else{

                        echo "<div class='error'>Image not Available.</div>";

                    }
        ?>
                    </td>
                </tr>
                <tr>
                    <td>Select new Image:</td>
                    <td><input type="file" name="image"></td>
                </tr>

                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">

                            <?php
//Create php code to display categories from database

//Create SQL to get all active categories from database
$sql="SELECT* FROM tbl_category WHERE active='Yes'";

 //Execute the query
$res=mysqli_query($conn,$sql);

//Count rows to check whether we have data in database or not
 $count=mysqli_num_rows($res);

 if($count>0)
 {
    while($rows=mysqli_fetch_assoc($res))
{
//Get details of categories
$category_title=$rows['title'];
$category_id=$rows['id'];


?>
                            <option <?php if($current_category==$category_id){echo "selected";}?>
                                value="<?php echo $category_id;?> "><?php echo $category_title;?></option>
                            <?php
}

 }
 else{
    //We do not have category
    ?>

                            echo "<option value="0">Category not Available</option>";
                            <?php

 }
?>





                    </td>
                </tr <tr>
                <td>Featured:</td>
                <td>
                    <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes">Yes
                    <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No">No
                </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes">Yes
                        <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>

                        <input type="hidden" name="id" value="<?php echo $id;?>">

                        <input type="hidden" name="current_image" value="<?php echo $current_image;?>">

                        <input class="btn btn-success" type="submit" name="submit" value="Update Food">
                    </td>
                </tr>
            </table>
        </form>

        <?php

        if(isset($_POST['submit']))
        {
            $id=$_POST['id'];
            $title=$_POST['title'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $current_image=$_POST['image_name'];
           
            $featured=$_POST['featured'];
            $active=$_POST['active'];

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
                    $image_name="Food-Name-".rand(0000,9999).'.'.$ext;  //Food_Category_798.jpg
            
            
            
                    $src_path=$_FILES['image']['tmp_name'];
            
                    $dest_path="../images/food/".$image_name;
            
                    //Finally upload image
                    $upload=move_uploaded_file($src_path,$dest_path);
            
                    //Check whether the image is uploaded or not
                    //If image is not uploaded, will redirect with error message
                    if($upload==false)
                    {
                        $_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";
            
                        // Redirect page to manage admin
                        header('location:'.SITEURL.'admin/add-food.php');
                        //Stop the process
                        die();
                    }

                    if($current_image!="")
                    {
                        $remove_path="../images/food/".$current_image;

                        $remove=unlink($remove_path);

                        //Check whether the image is removed or not
                        //If failed to remove then displaay message and stop the process
                        if($remove==false)
                        {
                            //Failed to remove the image
                            $_SESSION['remove-failed']="<div class='error>Failed to remove current image.</div>";
                            header('location:'.SITEURL.'admin/manage-food.php');
                            die();//Stop the process
                        }
                    }
                    

                }
                else{

                    $image_name=$current_image;
                }
            
            }
                else{
            
                    //Dont upload image and set image_name value as blank
                    $image_name=$current_image;
                }

                //Update the database
                $sql3="UPDATE tbl_food SET title='$title',image_name='$image_name',description='$description',price=$price,image_name='$image_name',category_id='$category',featured='$featured',active='$active' WHERE id=$id";

                $res3=mysqli_query($conn,$sql3);

                if($res3==true)
                {
                    $_SESSION['update']="<div class='success'>Food Updated Successfully</div>";
                    // Redirect page to add admin
                    header('location:'.SITEURL.'admin/manage-food.php'); 
                }
                else{
                    $_SESSION['update']="<div class='error'>Failed to update Food</div>";
                    // Redirect page to add admin
                    header('location:'.SITEURL.'admin/manage-food.php');
                }









        }






?>




    </div>
</div>





<?php include('partials/footer.php'); ?>
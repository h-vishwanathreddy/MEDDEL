<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br>

        <?php
        if(isset($_SESSION['upload']))
            {
              echo $_SESSION['upload'];//Displaying session message
              unset($_SESSION['upload']);//Removing session message
            }
        ?>



        <form action="" method="post" enctype="multipart/form-data">

            <table>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" placeholder="Food Title"></td>
                </tr>

                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" id="" cols="30" rows="5"
                            placeholder="Description of the food."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td><input type="number" name="price"></td>
                </tr <tr>
                <td>Select Image:</td>
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
            $id=$rows['id'];
            $title=$rows['title'];

            ?>
                            <option value="<?php echo $id;?> "><?php echo $title;?></option>
                            <?php
        }

             }
             else{
                //We do not have category
                ?>

                            <option value="0">No Category Found</option>
                            <?php

             }
        ?>





                    </td>
                </tr <tr>
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
                        <input class="btn btn-success" type="submit" name="submit" value="Add Food">
                    </td>
                </tr>
            </table>
        </form>


        <?php

    //Check whether button is clicked or not
        if(isset($_POST['submit']))
    {
        //get data from form
         $title=$_POST['title'];
         $description=$_POST['description'];
         $price=$_POST['price'];
         $category=$_POST['category'];

        //Check whether radio button for featured and active are checked or not
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
             $image_name="Food-Name-".rand(0000,9999).'.'.$ext;  //Food_Category_798.jpg
     
     
     
             $src=$_FILES['image']['tmp_name'];
     
             $dst="../images/food/".$image_name;
     
             //Finally upload image
             $upload=move_uploaded_file($src,$dst);
     
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
         }
     
     }
         else{
     
             //Dont upload image and set image_name value as blank
             $image_name="";
         }
     
         //Execute sql query to insert category into database
         //for numerical, no need of ''.
         $sql2="INSERT INTO tbl_food SET 
         title='$title',
         description='$description',
         price=$price,  
         image_name='$image_name',
         category_id=$category,
         featured='$featured',
         active='$active'
         ";
     
        //Execute the query and save in database 
        $res2=mysqli_query($conn,$sql2
    );
     
        if($res2==TRUE)
             {
               
                 //Create a session variable to display message
                 $_SESSION['add']="<div class='success'>Food Added successfully</div>";
                 // Redirect page to manage admin
                 header('location:'.SITEURL.'admin/manage-food.php');
             }
          else{
             $_SESSION['add']="<div class='error'>Failed to add Food</div>";
             // Redirect page to manage admin
             header('location:'.SITEURL.'admin/manage-food.php');
          }
     }


?>



</div>
</div>





        <?php include('partials/footer.php'); ?>
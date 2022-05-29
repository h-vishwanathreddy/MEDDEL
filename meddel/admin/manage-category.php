<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br>


        <?php
            if(isset($_SESSION['add']))
            {
              echo $_SESSION['add'];//Displaying session message
              unset($_SESSION['add']);//Removing session message
            }

            if(isset($_SESSION['remove']))
            {
              echo $_SESSION['remove'];//Displaying session message
              unset($_SESSION['remove']);//Removing session message
            }

            if(isset($_SESSION['delete']))
            {
              echo $_SESSION['delete'];//Displaying session message
              unset($_SESSION['delete']);//Removing session message
            }
            if(isset($_SESSION['no-category-found']))
            {
              echo $_SESSION['no-category-found'];//Displaying session message
              unset($_SESSION['no-category-found']);//Removing session message
            }

            if(isset($_SESSION['update']))
            {
              echo $_SESSION['update'];//Displaying session message
              unset($_SESSION['update']);//Removing session message
            }
            if(isset($_SESSION['upload']))
            {
              echo $_SESSION['upload'];//Displaying session message
              unset($_SESSION['upload']);//Removing session message
            }
            if(isset($_SESSION['failed-remove']))
            {
              echo $_SESSION['failed-remove'];//Displaying session message
              unset($_SESSION['failed-remove']);//Removing session message
            }

         ?>


        <a class="btn btn-primary" href="<?php echo SITEURL; ?>admin/add-category.php" role="button">Add Category</a>
        <br>
        <br>



        <!-- <table>
                <tr>
                    <th>S.No</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>

                <tr>
                    <td>1.</td>
                    <td>Srujan Rao</td>
                    <td>srujanrao</td>
                    <td>
                        Update Admin
                        Delete Admin
                    </td>
                </tr>
            </table> -->

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Featured</th>
                    <th scope="col">Active</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <?php
    //Query to get all admin
    $sql="SELECT * FROM tbl_category";
    //Execute the query
    $res=mysqli_query($conn,$sql);

  
      //Count rows to check whether we have data in database or not
      $count=mysqli_num_rows($res);//Function to get all rows in database

      $sn=1;

      //Check the no. of rows
      if($count>0)
      {
         //We have data in database
         while($rows=mysqli_fetch_assoc($res))
         {
           // Using while loop to get all the data from database 
           //And while loop will run as long as we have data in database 
 
           //Get individual data
           $id=$rows['id'];
           $title=$rows['title'];
           $image_name=$rows['image_name'];
           $featured=$rows['featured'];
           $active=$rows['active'];

            ?>

            <tbody>
                <tr>
                    <th scope="row"><?php echo $sn++;?></th>
                    <td><?php echo $title;?></td>

                    <td>

                      <?php 
                      //Check whether the image name is available or not
                      if($image_name!="")
                      {
                        //Display the image
                        ?>
                        <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" width="100px"
                        <?php
                      } 
                      else{
                         //Display the message
                         echo "<div class='error'>Image not Added</div>";

                      }
                      ?>

                    </td>
                    <td><?php echo $featured;?></td>
                    <td><?php echo $active;?></td>

                      <td>
                    <a class="btn btn-success" href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id;?>" role="button">Update Category</a>

                    <a class="btn btn-danger" href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" role="button">Delete Category</a>

                    </td>
                </tr>

            </tbody>


            <?php

         }

 





      }
      else{

        ?>

            <tr>
                <td> colspan="6"<div class="error">No Category Added</div>
                </td>
            </tr>

            <?php
      }



  ?>
</table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>
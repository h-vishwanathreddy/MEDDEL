<?php include('partials-front/menu.php');?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>


            <?php
    //Create sql query to display categories from database
    $sql="SELECT * FROM tbl_category Where active='Yes' ";
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

          //Disply the values in our table
          ?>
        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
            <div class="box-3 float-container">
            <?php
            //Check whether the image is available or not
            if($image_name=="")
            {
                echo "<div class='error'>Image not Available</div>";
            }
            else
            {
                ?>
                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name;?>" alt="Pizza" class="img-responsive img-curve">
                <?php
            }
           ?>    

                <h3 class="float-text text-white"><?php echo $title;?> </h3>
            </div>
        </a>


        <?php

        }
    }
    else
    {
        echo "<div class='error'>Category not found</div>";
    }





?>


            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <?php include('partials-front/footer.php');?>
<?php include('partials-front/menu.php');?>

<!-- MED sEARCH Section Starts Here -->
<section class="medicine-search text-center">
    <div class="container">

        <form action="<?php echo SITEURL; ?>medicine-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Medicine.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- MED sEARCH Section Ends Here -->

<?php
            if(isset($_SESSION['order']))
            {
              echo $_SESSION['order'];//Displaying session message
              unset($_SESSION['order']);//Removing session message
            }
?>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Medicine</h2>

        <?php
    //Create sql query to display categories from database
    $sql="SELECT * FROM tbl_category Where active='Yes' AND featured='Yes' LIMIT 3";
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
        <a href="<?php echo SITEURL; ?>category-medicines.php?category_id=<?php echo $id; ?>">
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
                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name;?>" alt="medicine" class="img-responsive img-curve">
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
        echo "<div class='error'>Category not Added</div>";
    }





?>




        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->


<!-- MED MEnu Section Starts Here -->
<section class="medicine-menu">
    <div class="container">
        <h2 class="text-center">Medicine Menu</h2>


        <?php
    //Create sql query to display categories from database
    $sql2="SELECT * FROM tbl_medicine Where active='Yes' AND featured='Yes' LIMIT 6";
    //Execute the query
    $res2=mysqli_query($conn,$sql2);

      //Count rows to check whether we have data in database or not
      $count2=mysqli_num_rows($res2);//Function to get all rows in database

      $sn=1;

      //Check the no. of rows
      if($count2>0)
    {
        //We have data in database
        while($rows=mysqli_fetch_assoc($res2))
        {
          // Using while loop to get all the data from database 
          //And while loop will run as long as we have data in database 

          //Get individual data
          $id=$rows['id'];
          $title=$rows['title'];
          $price=$rows['price'];
          $description=$rows['description'];
          $image_name=$rows['image_name'];

          //Disply the values in our table
          ?>
       
       <div class="medicine-menu-box">
            <div class="medicine-menu-img">

            <?php
            //Check whether the image is available or not
            if($image_name=="")
            {
                echo "<div class='error'>Image not Available</div>";
            }
            else
            {
                ?>
                <img src="<?php echo SITEURL; ?>images/medicine/<?php echo $image_name;?>" alt="medicine" class="img-responsive img-curve">
                <?php
            }
           ?>    
    
            </div>

            <div class="medicine-menu-desc">
                <h4><?php echo $title;?></h4>
                <p class="medicine-price"><?php echo $price;?></p>
                <p class="medicine-detail">
                <?php echo $description;?>
                </p>
                <br>

                <a href="<?php echo SITEURL; ?>order.php?medicine_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
            </div>
        </div>

        <?php

        }
    }
    else
    {
        echo "<div class='error'>Medicine not Available</div>";
    }





?>


      


        <div class="clearfix"></div>



    </div>

    <p class="text-center">
        <a href="#">See All Medicines</a>
    </p>
</section>
<!-- MED Menu Section Ends Here -->

<?php include('partials-front/footer.php');?>
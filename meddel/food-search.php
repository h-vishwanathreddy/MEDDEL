<?php include('partials-front/menu.php');?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

<?php

    //Get the search keyword
    $search=$_POST['search'];

?>

        <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search;?>"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php

    $search=$_POST['search'];

    $sql="SELECT * FROM tbl_food Where title LIKE '%$search%' OR description LIKE '%$search%'" ;

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
        $price=$rows['price'];
        $description=$rows['description'];
        $image_name=$rows['image_name'];

        //Disply the values in our table
        ?>

        <div class="food-menu-box">
            <div class="food-menu-img">



                <?php
          //Check whether the image is available or not
          if($image_name=="")
          {
              echo "<div class='error'>Image not Available</div>";
          }
          else
          {
              ?>
                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>" alt="Pizza"
                    class="img-responsive img-curve">
                <?php
          }
         ?>


            </div>

            <div class="food-menu-desc">
                <h4><?php echo $title;?></h4>
                <p class="food-price"><?php echo $price;?></p>
                <p class="food-detail">
                    <?php echo $description;?>
                </p>
                <br>

                <a href="#" class="btn btn-primary">Order Now</a>
            </div>
        </div>



        <?php

      }
  }
  else
  {
      echo "<div class='error'>Food not Found</div>";
  }





?>



        
        

        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php');?>
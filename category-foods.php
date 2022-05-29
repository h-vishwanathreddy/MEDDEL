<?php include('partials-front/menu.php');?>

<?php

    if(isset($_GET['category_id']))
    {
        //Category id is set and get the id
        $category_id=$_GET['category_id'];
        //Get the category title based on category id
        $sql="SELECT title FROM tbl_category Where id=$category_id";

        $res=mysqli_query($conn,$sql);

        $rows=mysqli_fetch_assoc($res);

        //Get the title
        $category_title=$rows['title'];
    }
    else{

        header('location:'.SITEURL);
    }


?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php

    $sql2="SELECT * FROM tbl_food Where category_id=$category_id";

    $res2=mysqli_query($conn,$sql2);

      //Count rows to check whether we have data in database or not
      $count2=mysqli_num_rows($res2);//Function to get all rows in database

      $sn=1;

      //Check the no. of rows
      if($count2>0)
    {
        //We have data in database
        while($rows2=mysqli_fetch_assoc($res2))
        {
          // Using while loop to get all the data from database 
          //And while loop will run as long as we have data in database 

          //Get individual data
          $id=$rows2['id'];
          $title=$rows2['title'];
          $price=$rows2['price'];
          $description=$rows2['description'];
          $image_name=$rows2['image_name'];

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

                <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
            </div>
        </div>

        <?php

    }
}
    else
    {
        echo "<div class='error'>Food not Available</div>";
    }


?>

        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php');?>
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

<!-- MED sEARCH Section Starts Here -->
<section class="medicine-search text-center">
    <div class="container">

        <h2>Medicines on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

    </div>
</section>
<!-- MED sEARCH Section Ends Here -->



<!-- MED MEnu Section Starts Here -->
<section class="medicine-menu">
    <div class="container">
        <h2 class="text-center">Medicines Menu</h2>

        <?php

    $sql2="SELECT * FROM tbl_medicine Where category_id=$category_id";

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
                <img src="<?php echo SITEURL; ?>images/medicine/<?php echo $image_name;?>" alt="medicine"
                    class="img-responsive img-curve">
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

</section>
<!-- MED Menu Section Ends Here -->

<?php include('partials-front/footer.php');?>
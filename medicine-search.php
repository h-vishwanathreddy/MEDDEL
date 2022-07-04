<?php include('partials-front/menu.php');?>

<!-- MED sEARCH Section Starts Here -->
<section class="medicine-search text-center">
    <div class="container">

<?php

    //Get the search keyword
    $search=$_POST['search'];

?>

        <h2>Medicines on Your Search <a href="#" class="text-white">"<?php echo $search;?>"</a></h2>

    </div>
</section>
<!-- MED sEARCH Section Ends Here -->



<!-- MED MEnu Section Starts Here -->
<section class="medicine-menu">
    <div class="container">
        <h2 class="text-center">Medicine Menu</h2>

        <?php

    $search=$_POST['search'];

    $sql="SELECT * FROM tbl_medicine Where title LIKE '%$search%' OR description LIKE '%$search%'" ;

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

                <a href="#" class="btn btn-primary">Order Now</a>
            </div>
        </div>



        <?php

      }
  }
  else
  {
      echo "<div class='error'>Medicine not Found</div>";
  }





?>



        
        

        <div class="clearfix"></div>



    </div>

</section>
<!-- MED Menu Section Ends Here -->

<?php include('partials-front/footer.php');?>
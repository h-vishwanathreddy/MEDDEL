<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>
        <br>

<?php
        if(isset($_SESSION['update']))
            {
              echo $_SESSION['update'];//Displaying session message
              unset($_SESSION['update']);//Removing session message
            }
     ?>
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
                    <th scope="col">Food</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty.</th>
                    <th scope="col">Total</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col"> Contact</th>
                    <th scope="col"> Email</th>
                    <th scope="col"> Address</th>
                    <th scope="col"> Actions</th>
                </tr>
            </thead>
            <tbody>


                <?php
    $sql="SELECT * FROM tbl_order ORDER BY id DESC";  //Display the latest order at first
    //Execute the query
    $res=mysqli_query($conn,$sql);

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
        $food=$rows['food'];
        $price=$rows['price'];
        $qty=$rows['qty'];
        $total=$rows['total'];
        $order_date=$rows['order_date'];
        $status= $rows['status'];
        $customer_name=$rows['customer_name'];
        $customer_contact=$rows['customer_contact'];
        $customer_email=$rows['customer_email'];
        $customer_address=$rows['customer_address'];
      
        //Disply the values in our table
        ?>

                <tr>
                    <th scope="row"><?php echo $sn++;?>.</th>
                    <td><?php echo $food;?></td>
                    <td><?php echo $price;?></td>
                    <td><?php echo $qty;?></td>
                    <td><?php echo $total;?></td>
                    <td><?php echo $order_date;?></td>

                    <td>
                        <?php
                         if($status=="Ordered")
                        {
                            echo "<label> $status </label>";
                            
                        } 
                        else if($status=="On Delivery"){
                            echo "<label style='color:orange;'> $status </label>";
                        }
                        else if($status=="Delivered"){
                            echo "<label style='color:green;'> $status </label>";
                        }
                        else if($status=="Cancelled"){
                            echo "<label style='color:red;'> $status </label>";
                        }
                        ?>
                    </td>

                    <td><?php echo $customer_name;?></td>
                    <td><?php echo $customer_contact;?></td>
                    <td><?php echo $customer_email;?></td>
                    <td><?php echo $customer_address;?></td>
                    <td><a class="btn btn-success" href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id;?>" role="button">Update Order</a></td>
                </tr>

                <?php

      }
    }
    ?>

            </tbody>
        </table>
    </div>

</div>

<?php include('partials/footer.php'); ?>
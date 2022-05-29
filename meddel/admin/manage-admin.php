<?php include('partials/menu.php'); ?>


<!-- main content section starts here -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage-admin</h1>
        <br>


        <?php
            if(isset($_SESSION['add']))
            {
              echo $_SESSION['add'];//Displaying session message
              unset($_SESSION['add']);//Removing session message
            }

            if(isset($_SESSION['delete']))
            {
              echo $_SESSION['delete'];//Displaying session message
              unset($_SESSION['delete']);//Removing session message
            }

            if(isset($_SESSION['update']))
            {
              echo $_SESSION['update'];//Displaying session message
              unset($_SESSION['update']);//Removing session message
            }

            if(isset($_SESSION['user-not-found']))
            {
              echo $_SESSION['user-not-found'];//Displaying session message
              unset($_SESSION['user-not-found']);//Removing session message
            }
            if(isset($_SESSION['pad-not-match']))
            {
              echo $_SESSION['pad-not-match'];//Displaying session message
              unset($_SESSION['pad-not-match']);//Removing session message
            }
            
            if(isset($_SESSION['change-pad']))
            {
              echo $_SESSION['change-pad'];//Displaying session message
              unset($_SESSION['change-pad']);//Removing session message
            }
            
          ?>
        <br><br>

        <a class="btn btn-primary" href="add-admin.php" role="button">Add Admin</a>
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
                    <th scope="col">Full Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <?php
    //Query to get all admin
    $sql="SELECT * FROM tbl_admin";
    //Execute the query
    $res=mysqli_query($conn,$sql);

    // Check whether the query is executed or not
    if($res==TRUE)
    {
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
          $full_name=$rows['full_name'];
          $username=$rows['username'];

          //Disply the values in our table
          ?>

            <tr>
                <th scope="row"><?php echo $sn++;?></th>
                <td><?php echo $full_name;?></td>
                <td><?php echo $username;?></td>
                <td>
                    <a class="btn btn-primary" href=<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id;?>"" role="button">Change Password</a>
                    
                    <a class="btn btn-success" href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id;?>" role="button">Update Admin</a>

                    <!-- <button type="button"  class="btn btn-danger">Delete Admin</button> -->

                    <a class="btn btn-danger" href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id;?>" role="button">Delete Admin</a>
                  
                </td>
            </tr>

            <?php
        }

      }
      else
      {
        //We do not have data in database
      }
      
    }
  ?>
            <!-- <tbody>
    <tr>
      <th scope="row">1.</th>
      <td>Srujan Rao</td>
      <td>srujanrao</td>
      <td><button type="button" class="btn btn-success">Update Admin</button>

      <button type="button" class="btn btn-danger">Delete Admin</button></td>
    </tr>
    <tr>
      <th scope="row">2.</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td><button type="button" class="btn btn-success">Update Admin</button>

      <button type="button" class="btn btn-danger">Delete Admin</button></td>
    </tr>
    <tr>
      <th scope="row">3.</th>
      <td colspan="2">Larry the Bird</td>
      <td><button type="button" class="btn btn-success">Update Admin</button>

      <button type="button" class="btn btn-danger">Delete Admin</button></td>
    </tr>
  </tbody> -->
        </table>

    </div>

</div>
<!-- main content section ends -->


<?php include('partials/footer.php'); ?>
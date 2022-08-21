
<?php
require('top.php');
?>

<div class="body1 font-poppin bg-gra-01 p-t-100 p-d-180px ">
  <div class="wrapper wrapper--w780 p-d-20"> 
    <div class="card card-3">
        
        <div class="card-body">
        <h2>Driver Registation</h2>
            <form action="update_driver.php" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    
                    <input class="form-control" placeholder="Firstname" type="text" name="firstname" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Lastname" type="text" name="lastname" placeholder="Enter Lastname" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Nation ID Number" type="text" name="nic" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Mobile Number" type="tel" name="mobile_number" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Driving Licence Number" type="text" name="driver_license" required>
  	            </div>
                  <div class="input-group">
                   
                    <input class="form-control" placeholder="Username" type="text" name="username" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Password" type="password" name="password" required>
  	            </div>
                  <div class="input-group">
                    <input class="form-control" type="file" name="image" required>
                    <?php if(isset($_GET['error'])):
                    ?>
                        <p><?php echo $_GET['error']; ?> </p>
                    <?php endif ?>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Vehical Category ID" type="int" name="vehical_category_id" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Vehical ID" type="int" name="vehical_detail_id" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Branch ID" type="int" name="branch_id" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Status" type="int" name="status" required>
  	            </div>
                 <input class="btn submit" type="submit" name="create" value="Register">

            </form>

        </div>
    </div>
</div>

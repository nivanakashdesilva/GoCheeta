<?php
include('includes/header.php'); 
include('includes/navbar.php'); 


$result= mysqli_query($conn,"SELECT * from vehical_detail where id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);

?>

<div class="body1 font-poppin bg-gra-01 p-t-100 p-d-180px ">
  <div class="wrapper wrapper--w780 p-d-20"> 
    <div class="card card-3">
        
        <div class="card-body">
        <h2>Vehical Registation</h2>
            <form action="update_vehical.php" method="post" enctype="multipart/form-data">
                <div class="input-group">  

                    <input class="form-control" placeholder="Vehical Make" type="text" name="vehical_make"
                    value="<?php echo $row['vehical_make'];?>" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Vehical Model" type="text" name="vehical_model" 
                    value="<?php echo $row['vehical_model'];?>"required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Vehical Manufacured Year" type="text" name="vehical_year"
                    value="<?php echo $row['vehical_year'];?>" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Number Plate" type="text" name="vehical_number"
                    value="<?php echo $row['vehical_number'];?>" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Vehical Category ID" type="int" name="vehical_category_id"
                    value="<?php echo $row['vehical_category_id'];?>" required>
  	            </div>
                <div class="input-group">
                    
                    <input class="form-control" placeholder="Number of Seats" type="int" name="number_of_seats"
                    value="<?php echo $row['number_of_seats'];?>" required>
  	            </div>
                  <div class="input-group">
                   
                    <input class="form-control" placeholder="Chasie Number" type="text" name="vehical_chasie_number"
                    value="<?php echo $row['vehical_chasie_number'];?>" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Insurance provider" type="text" name="vehical_insurance_provider"
                    value="<?php echo $row['vehical_insurance_provider'];?>" required>
  	            </div>
                <div class="input-group">
                    
                    <input class="form-control" placeholder="Insurance policy number" type="text" name="vehical_insurance_policy_number"
                    value="<?php echo $row['vehical_insurance_policy_number'];?>" required>
  	            </div>

                  <div class="form-group">
                  <a> Front Image of Vehical</a>
                    <input class="form-control" type="file" name="vehical_front_image"
                    value="<?php echo $row['vehical_front_image'];?>" required>
                    <?php if(isset($_GET['error'])):
                    ?>
                        <p><?php echo $_GET['error']; ?> </p>
                    <?php endif ?>
  	            </div>

                <div class="form-group">
                <a>Left Side Image of Vehical</a>
                    <input class="form-control" type="file" name="vehical_leftside_image"
                    value="<?php echo $row['vehical_leftside_image'];?>" required>
                    <?php if(isset($_GET['error'])):
                    ?>
                        <p><?php echo $_GET['error']; ?> </p>
                    <?php endif ?>
  	            </div>
                
                <div class="form-group">
                <a> Right Side Image of Vehical</a>
                    <input class="form-control" type="file" name="vehical_rightside_image"
                    value="<?php echo $row['vehical_rightside_image'];?>" required>
                    <?php if(isset($_GET['error'])):
                    ?>
                        <p><?php echo $_GET['error']; ?> </p>
                    <?php endif ?>
  	            </div>
                
                <div class="form-group">
                <a> Rear Image of Vehical</a>
                    <input class="form-control" type="file" name="vehical_rear_image"
                    value="<?php echo $row['vehical_rear_image'];?>" required>
                    <?php if(isset($_GET['error'])):
                    ?>
                        <p><?php echo $_GET['error']; ?> </p>
                    <?php endif ?>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Color of Vehical" type="text" name="vehical_color" 
                    value="<?php echo $row['vehical_color'];?>"required>
                    </div>
                 <input class="btns submits" type="submit" name="create" value="Register">

            </form>

        </div>
    </div>
</div>

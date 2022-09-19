
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="body1 font-poppin bg-gra-01 p-t-100 p-d-180px ">
  <div class="wrapper wrapper--w780 p-d-20"> 
    <div class="card card-3">
        
        <div class="card-body">
        <h2>Client Registation</h2>
            <form action="update_client_user.php" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    
                    <input class="form-control" placeholder="Firstname" type="text" name="firstname" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Lastname" type="text" name="lastname" placeholder="Enter Lastname" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Nation ID Number" type="text" name="nic" required>
  	            </div><div class="input-group">
                    
                    <input class="form-control" placeholder="Address" type="text" name="address" required>
  	            </div>
                <div class="input-group">
                  <select class="form-control" name="location" required>
                                    <option>Select Location</option>
                                    <?php 
                                    $res=mysqli_query($conn,"select id,location from branch order by location asc");
                                    while($row=mysqli_fetch_assoc($res)){
                                       if($row['id']==$address){
                                          echo " <option selected value=".$row['id'].">".$row['location']."</option>";
                                       }else{
                                          echo " <option value=".$row['id'].">".$row['location']."</option>";
                                       }
                                       
                                    }
                                    ?>
                                    </select>
                    
  	            </div>
                  <div class="input-group">
                   
                    <input class="form-control" placeholder="Mobile Number" type="tel" name="mobile_number" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Email Address" type="email" name="email_address" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Date of Brith" type="date" name="date_of_birth" required>
  	            </div>
                <div class="input-group">
                  <select class="form-control" name="gender" required>
                                    <option>Select Gender</option>
                                    <?php 
                                    $res=mysqli_query($conn,"select id,gender from gender order by gender asc");
                                    while($row=mysqli_fetch_assoc($res)){
                                       if($row['id']==$address){
                                          echo " <option selected value=".$row['id'].">".$row['gender']."</option>";
                                       }else{
                                          echo " <option value=".$row['id'].">".$row['gender']."</option>";
                                       }
                                       
                                    }
                                    ?>
                                    </select>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Username" type="text" name="username" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Password" type="password" name="password" required>
  	            </div>
                 <input class="btns submits" type="submit" name="create" value="Register">

            </form>

        </div>
    </div>
</div>

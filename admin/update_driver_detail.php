
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
$firstname='';
$lastname='';
$nic='';
$driver_license='';
$mobile_number='';
$username='';
$password='';
$vehical_category_id='';
$vehical_detail_id='';
$branch_id='';
$status='';
$msg='';

if(isset($_GET['id']) && $_GET['id']!=''){
   $id=get_safe_value($conn,$_GET['id']);
   $res=mysqli_query($conn,"select * from driver where id='$id'");
   $check=mysqli_num_rows($res);
   if($check>0){
      $row=mysqli_fetch_assoc($res);
      $firstname=$row['firstname'];
      $lastname=$row['lastname'];
      $nic=$row['nic'];
      $driver_license=$row['driver_license'];
      $mobile_number=$row['mobile_number'];
      $username=$row['username'];
      $password=$row['password'];
      $vehical_category_id=$row['vehical_category_id'];
      $vehical_detail_id=$row['vehical_detail_id'];
      $branch_id=$row['branch_id'];
      $status=$row['status'];
     
   }else{
      header('location:driver.php');
      die();
   }
 
}


if(isset($_POST['submit'])){
   $firstname=get_safe_value($conn,$_POST['firstname']);
   $lastname=get_safe_value($conn,$_POST['lastname']);
   $nic=get_safe_value($conn,$_POST['nic']);
   $driver_license=get_safe_value($conn,$_POST['driver_license']);
   $mobile_number=get_safe_value($conn,$_POST['mobile_number']);
   $username=get_safe_value($conn,$_POST['username']);
   $password=get_safe_value($conn,$_POST['password']);
   $vehical_category_id=get_safe_value($conn,$_POST['vehical_category_id']);
   $vehical_detail_id=get_safe_value($conn,$_POST['vehical_detail_id']);
   $branch_id=get_safe_value($conn,$_POST['branch_id']);
   $status=get_safe_value($conn,$_POST['status']);
   $res=mysqli_query($conn,"select * from driver where id='$id'");
   $ress=mysqli_query($conn,"select * from driver where driver_license='$driver_license'");
   $check=mysqli_num_rows($res);
   if($check>0){
      if(isset($_GET['id']) && $_GET['id']!=''){
         $getData=mysqli_fetch_assoc($res);
         if($id==$getData['id']){

         }else{
            $msg="Driver already exists";
         }
      }else{
         $msg="Driver already exists";
      }

   }
   if($msg==''){
      
         if(isset($_GET['id']) && $_GET['id']!=''){
               $update_sql="update driver set firstname='$firstname',lastname='$lastname',
               nic='$nic',driver_license='$driver_license',mobile_number='$mobile_number',username='$username',
               password='$password',vehical_category_id='$vehical_category_id',
               vehical_detail_id='$vehical_detail_id',branch_id='$branch_id',status='$status' where id='$id'";
            }else{
               $update_sql="update driver set firstname='$firstname',lastname='$lastname',
               nic='$nic',driver_license='$driver_license',mobile_number='$mobile_number',username='$username',
               password='$password',vehical_category_id='$vehical_category_id',
               vehical_detail_id='$vehical_detail_id',branch_id='$branch_id',status='$status' where id='$id'";
            }
            mysqli_query($conn,$update_sql);
         }else{
            mysqli_query($conn,"insert into driver (firstname, lastname, nic, driver_license, mobile_number, username, password, vehical_category_id, vehical_detail_id, branch_id, status, date_added)
            values('$firstname', '$lastname', '$nic', '$driver_license', '$mobile_number', '$username', '$password', '$vehical_category_id','$vehical_detail_id', '$branch_id','$status', NOW())");
         }
         echo 'Record Updated Successfully';
   
         
         die();
   }



?>

<div class="body1 font-poppin bg-gra-01 p-t-100 p-d-180px ">
  <div class="wrapper wrapper--w780 p-d-20"> 
    <div class="card card-3">
        
        <div class="card-body">
        <h2>Driver Registation</h2>
            <form method="post" enctype="multipart/form-data">
                <div class="input-group">
                    
                    <input class="form-control" placeholder="Firstname" type="text" name="firstname"
                    value="<?php echo $row['firstname'];?>" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Lastname" type="text" name="lastname" placeholder="Enter Lastname"
                    value="<?php echo $row['lastname'];?>" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Nation ID Number" type="text" name="nic" 
                    value="<?php echo $row['nic'];?>"required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Mobile Number" type="tel" name="mobile_number" 
                    value="<?php echo $row['mobile_number'];?>"required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Driving Licence Number" type="text" name="driver_license"
                    value="<?php echo $row['driver_license'];?>" required>
  	            </div>
                  <div class="input-group">
                   
                    <input class="form-control" placeholder="Username" type="text" name="username" 
                    value="<?php echo $row['username'];?>"required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Password" type="password" name="password"
                    value="<?php echo $row['password'];?>" required>
  	            </div>
                  <div class="input-group">
                    <input class="form-control" type="file" name="image" >
                    <?php if(isset($_GET['error'])):
                    ?>
                        <p><?php echo $_GET['error']; ?> </p>
                    <?php endif ?>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Vehical Category ID" type="int" name="vehical_category_id" 
                    value="<?php echo $row['vehical_category_id'];?>" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Vehical ID" type="int" name="vehical_detail_id"
                    value="<?php echo $row['vehical_detail_id'];?>" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Branch ID" type="int" name="branch_id"
                    value="<?php echo $row['branch_id'];?>" required>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Status" type="int" name="status"
                    value="<?php echo $row['status'];?>" required>
  	            </div>
                 <input class="btns submits" type="submit" name="submit" value="UPDATE">

            </form>

        </div>
    </div>
</div>

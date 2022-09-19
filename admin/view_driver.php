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
$driver_image='';
$date_added='';
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
      $driver_image=$row['avatar'];
      $date_added=$row['date_added'];
     
   }else{
      header('location:driver.php');
      die();
   }
 
}?>
<style>
   .row{
      padding-top: 2rem;
      margin-right: 5%;
      margin-left: 5%;
      display: flex;
      justify-content: space-between;
      align-items: center;
    
   }
   h1{
      text-align: center;
      
   }
   h5{
      color: black;
   }
   .container{
      width: 80%;
      height:70%;
   }
   
</style>


<div class="container">
<h1> Driver Details</h1>
   <div class="row">
   
      <div class="colmun1">
      <img src="asset/Images/uploads/<?php echo $driver_image?>" style="width: 200px;, height: 200px;">
      
      </div>
      <div class="colmun2">
       
      <h5> Driver ID </h5><?php echo $id;?>

      <h5> Driver First Name </h5><?php echo $firstname;?>

      <h5> Driver Last Name </h5><?php echo $lastname;?>

      <h5> Driver NIC </h5><?php echo $nic;?>
      <h5> Driving license number </h5><?php echo $driver_license;?>
      <h5> Mobile Number </h5><?php echo $mobile_number;?>
      

      
      </div>
      <div class="colmun3">
      <h5> Username </h5><?php echo $username;?>
      <h5> Vehical Category  </h5><?php echo $vehical_category_id;?>

      <h5> Vehical Detail  </h5><?php echo $vehical_detail_id;?>
      
      <h5> Branch  </h5><?php echo $branch_id;?>
      <h5> Status </h5><?php echo $status;?>
      <h5> Date Added </h5><?php echo $date_added;?>
      
      </div>
   </div>
</div>


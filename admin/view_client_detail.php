<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
$firstname='';
$lastname='';
$nic='';
$address='';
$location='';
$mobile_number='';
$email_address='';
$date_of_birth='';
$gender='';
$username='';
$last_login='';
$date_added='';
$msg='';

if(isset($_GET['id']) && $_GET['id']!=''){
   $id=get_safe_value($conn,$_GET['id']);
   $res=mysqli_query($conn,"select * from client_list where id='$id'");
   $check=mysqli_num_rows($res);
   if($check>0){
      $row=mysqli_fetch_assoc($res);
      $firstname=$row['firstname'];
      $lastname=$row['lastname'];
      $nic=$row['nic'];
      $address=$row['address'];
      $location=$row['location'];
      $mobile_number=$row['mobile_number'];
      $email_address=$row['email_address'];
      $date_of_birth=$row['date_of_birth'];
      $gender=$row['gender'];
      $username=$row['username'];
      $last_login=$row['last_login'];
      $date_added=$row['date_added'];
     
     
   }else{
      header('location:client_user.php');
      die();
   }
 
}
 
?>
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
      width: 50%;
      height:70%;
   }
   
</style>


<div class="container">
<h1> Client Details</h1>
   <div class="row">
   
      
      <div class="colmun2">
       
      <h5> Client ID </h5><?php echo $id;?>

      <h5> First Name </h5><?php echo $firstname;?>

      <h5> Last Name </h5><?php echo $lastname;?>

      
      <h5> NIC </h5><?php echo $nic;?>
      <h5> Address </h5><?php echo $address;?>
      <h5> Location </h5><?php echo $location;?>
      

      
      </div>
      <div class="colmun3">
      <h5> Mobile Number  </h5><?php echo $mobile_number;?>
      
      <h5> Email Address  </h5><?php echo $email_address;?>

      <h5> Date Of Birth  </h5><?php echo $date_of_birth;?>
      
      <h5> Gender  </h5><?php echo $gender;?>
      <h5> Username </h5><?php echo $username;?>
      <h5> Last Login </h5><?php echo $last_login;?>
      <h5> Date Added </h5><?php echo $date_added;?>
      
      </div>
   </div>
</div>
<br>
<br>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
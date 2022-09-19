<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
$vehical_make='';
$vehical_model='';
$vehical_year='';
$vehical_number='';
$number_of_seats='';
$vehical_category_id='';
$vehical_chasie_number='';
$vehical_insurance_provider='';
$vehical_insurance_policy_number='';
$vehical_color='';
$vehical_front_image='';
$vehical_leftside_image='';
$vehical_rightside_image='';
$vehical_rear_image='';
$vehical_added_date='';
$msg='';

if(isset($_GET['id']) && $_GET['id']!=''){
   $id=get_safe_value($conn,$_GET['id']);
   $res=mysqli_query($conn,"select * from vehical_detail where id='$id'");
   $check=mysqli_num_rows($res);
   if($check>0){
      $row=mysqli_fetch_assoc($res);
      $vehical_make=$row['vehical_make'];
      $vehical_model=$row['vehical_model'];
      $vehical_year=$row['vehical_year'];
      $vehical_number=$row['vehical_number'];
      $number_of_seats=$row['number_of_seats'];
      $vehical_category_id=$row['vehical_category_id'];
      $vehical_chasie_number=$row['vehical_chasie_number'];
      $vehical_insurance_provider=$row['vehical_insurance_provider'];
      $vehical_insurance_policy_number=$row['vehical_insurance_policy_number'];
      $vehical_color=$row['vehical_color'];
      $vehical_front_image=$row['vehical_front_image'];
      $vehical_leftside_image=$row['vehical_leftside_image'];
      $vehical_rightside_image=$row['vehical_rightside_image'];
      $vehical_rear_image=$row['vehical_rear_image'];
      $vehical_added_date=$row['vehical_added_date'];

     
   }else{
      header('location:vehical.php');
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
      width: 80%;
      height:70%;
   }
   
</style>


<div class="container">
<h1> Vehical Details</h1>
   <div class="row">
   
      <div class="colmun1">
      <img src="asset/Images/uploads/<?php echo $vehical_front_image?>" style="width: 100px;, height: 100px;">
      <img src="asset/Images/uploads/<?php echo $vehical_leftside_image?>" style="width: 100px;, height: 100px;">
      <img src="asset/Images/uploads/<?php echo $vehical_rightside_image?>" style="width: 100px;, height: 100px;">
      <img src="asset/Images/uploads/<?php echo $vehical_rear_image?>" style="width: 100px;, height: 100px;">
      
      </div>
      <div class="colmun2">
       
      <h5> Driver ID </h5><?php echo $id;?>

      <h5> Vehical Make </h5><?php echo $vehical_make;?>

      <h5> Vehical Model </h5><?php echo $vehical_model;?>

      
      <h5> Year of  Register </h5><?php echo $vehical_year;?>
      <h5> Vehical Number </h5><?php echo $vehical_number;?>
      <h5> Number of Seats </h5><?php echo $number_of_seats;?>
      

      
      </div>
      <div class="colmun3">
      
      <h5> Vehical Category  </h5><?php echo $vehical_category_id;?>

      <h5> Vehical Chasie Number  </h5><?php echo $vehical_chasie_number;?>
      
      <h5> Insurance Provider  </h5><?php echo $vehical_insurance_provider;?>
      <h5> Insurance Policy Number </h5><?php echo $vehical_insurance_policy_number;?>
      <h5> Vehical Color </h5><?php echo $vehical_color;?>
      <h5> Date Added </h5><?php echo $vehical_added_date;?>
      
      </div>
   </div>
</div>
<br>
<br>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
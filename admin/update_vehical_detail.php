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
     
   }else{
      header('location:vehical.php');
      die();
   }
 
}


if(isset($_POST['submit'])){
   $vehical_make=get_safe_value($conn,$_POST['vehical_make']);
   $vehical_model=get_safe_value($conn,$_POST['vehical_model']);
   $vehical_year=get_safe_value($conn,$_POST['vehical_year']);
   $vehical_number=get_safe_value($conn,$_POST['vehical_number']);
   $number_of_seats=get_safe_value($conn,$_POST['number_of_seats']);
   $vehical_category_id=get_safe_value($conn,$_POST['vehical_category_id']);
   $vehical_chasie_number=get_safe_value($conn,$_POST['vehical_chasie_number']);
   $vehical_insurance_provider=get_safe_value($conn,$_POST['vehical_insurance_provider']);
   $vehical_insurance_policy_number=get_safe_value($conn,$_POST['vehical_insurance_policy_number']);
   $vehical_color=get_safe_value($conn,$_POST['vehical_color']);
   
   $res=mysqli_query($conn,"select * from vehical_detail where vehical_number='$vehical_number'");
   $check=mysqli_num_rows($res);
   if($check>0){
      if(isset($_GET['id']) && $_GET['id']!=''){
         $getData=mysqli_fetch_assoc($res);
         if($id==$getData['id']){

         }else{
            $msg="Vehical already exists";
         }
      }else{
         $msg="Vehical already exists";
      }

   }
   if($msg==''){
      
         if(isset($_GET['id']) && $_GET['id']!=''){
               $update_sql="update vehical_detail set vehical_make='$vehical_make',vehical_model='$vehical_model',
               vehical_year='$vehical_year',vehical_number='$vehical_number',number_of_seats='$number_of_seats',vehical_category_id='$vehical_category_id',
               vehical_chasie_number='$vehical_chasie_number',vehical_insurance_provider='$vehical_insurance_provider',
               vehical_insurance_policy_number='$vehical_insurance_policy_number',vehical_color='$vehical_color' where id='$id'";
            }else{
               $update_sql="update vehical_detail set vehical_make='$vehical_make',vehical_model='$vehical_model',
               vehical_year='$vehical_year',vehical_number='$vehical_number',number_of_seats='$number_of_seats',vehical_category_id='$vehical_category_id',
               vehical_chasie_number='$vehical_chasie_number',vehical_insurance_provider='$vehical_insurance_provider',
               vehical_insurance_policy_number='$vehical_insurance_policy_number',vehical_color='$vehical_color' where id='$id'";
            }
            mysqli_query($conn,$update_sql);
         }else{
            mysqli_query($conn,"insert into vehical_detail (vehical_make, vehical_model, vehical_year, vehical_number, number_of_seats, vehical_category_id, vehical_chasie_number, vehical_insurance_provider, vehical_insurance_policy_number, vehical_color, vehical_added_date)
            values('$vehical_make', '$vehical_model', '$vehical_year', '$vehical_number', '$number_of_seats', '$vehical_category_id', '$vehical_chasie_number', '$vehical_insurance_provider','$vehical_insurance_policy_number', '$vehical_color', NOW())");
         }
         echo 'Record Updated Successfully';
   
         
         die();
   }



?>
<div class="body1 font-poppin bg-gra-01 p-t-100 p-d-180px ">
  <div class="wrapper wrapper--w780 p-d-20"> 
    <div class="card card-3">
        
        <div class="card-body">
        <h2>Vehical Registation</h2>
            <form method="post" enctype="multipart/form-data">
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
                    value="<?php echo $row['vehical_front_image'];?>" >
                    <?php if(isset($_GET['error'])):
                    ?>
                        <p><?php echo $_GET['error']; ?> </p>
                    <?php endif ?>
  	            </div>

                <div class="form-group">
                <a>Left Side Image of Vehical</a>
                    <input class="form-control" type="file" name="vehical_leftside_image"
                    value="<?php echo $row['vehical_leftside_image'];?>" >
                    <?php if(isset($_GET['error'])):
                    ?>
                        <p><?php echo $_GET['error']; ?> </p>
                    <?php endif ?>
  	            </div>
                
                <div class="form-group">
                <a> Right Side Image of Vehical</a>
                    <input class="form-control" type="file" name="vehical_rightside_image"
                    value="<?php echo $row['vehical_rightside_image'];?>" >
                    <?php if(isset($_GET['error'])):
                    ?>
                        <p><?php echo $_GET['error']; ?> </p>
                    <?php endif ?>
  	            </div>
                
                <div class="form-group">
                <a> Rear Image of Vehical</a>
                    <input class="form-control" type="file" name="vehical_rear_image"
                    value="<?php echo $row['vehical_rear_image'];?>" >
                    <?php if(isset($_GET['error'])):
                    ?>
                        <p><?php echo $_GET['error']; ?> </p>
                    <?php endif ?>
  	            </div>
                  <div class="input-group">
                    
                    <input class="form-control" placeholder="Color of Vehical" type="text" name="vehical_color" 
                    value="<?php echo $row['vehical_color'];?>"required>
                    </div>
                 <input class="btns submits" type="submit" name="submit" value="UPDATE">

            </form>

        </div>
    </div>
</div>

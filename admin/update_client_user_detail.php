
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
$firstname='';
$lastname='';
$nic='';
$Address='';
$location='';
$mobile_Number='';
$email_address='';
$date_of_birth='';
$gender='';
$username='';
$password='';
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
      $Address=$row['Address'];
      $location=$row['location'];
      $mobile_Number=$row['mobile_Number'];
      $email_address=$row['email_address'];
      $date_of_birth	=$row['date_of_birth'];
      $gender=$row['gender'];
      $username=$row['username'];
      $password=$row['password'];
     
   }else{
      header('location:client_user.php');
      die();
   }
 
}


if(isset($_POST['submit'])){
   $firstname=get_safe_value($conn,$_POST['firstname']);
   $lastname=get_safe_value($conn,$_POST['lastname']);
   $nic=get_safe_value($conn,$_POST['nic']);
   $Address=get_safe_value($conn,$_POST['Address']);
   $location=get_safe_value($conn,$_POST['location']);
   $mobile_Number=get_safe_value($conn,$_POST['mobile_Number']);
   $email_address=get_safe_value($conn,$_POST['email_address']);
   $date_of_birth=get_safe_value($conn,$_POST['date_of_birth']);
   $gender=get_safe_value($conn,$_POST['gender']);
   $username=get_safe_value($conn,$_POST['username']);
   $password=get_safe_value($conn,$_POST['password']);
   $res=mysqli_query($conn,"select * from client_list where id='$id'");
   $ress=mysqli_query($conn,"select * from client_list where Address='$Address'");
   $check=mysqli_num_rows($res);
   if($check>0){
      if(isset($_GET['id']) && $_GET['id']!=''){
         $getData=mysqli_fetch_assoc($res);
         if($id==$getData['id']){

         }else{
            $msg="client already exists";
         }
      }else{
         $msg="client already exists";
      }

   }
   if($msg==''){
      
         if(isset($_GET['id']) && $_GET['id']!=''){
               $update_sql="update client_list set firstname='$firstname',lastname='$lastname',
               nic='$nic',Address='$Address',location='$location',mobile_Number='$mobile_Number',
               email_address='$email_address',date_of_birth='$date_of_birth',
               gender='$gender',username='$username',password='$password' where id='$id'";
            }else{
               $update_sql="update client_list set firstname='$firstname',lastname='$lastname',
               nic='$nic',Address='$Address',location='$location',mobile_Number='$mobile_Number',
               email_address='$email_address',date_of_birth='$date_of_birth',
               gender='$gender',username='$username',password='$password' where id='$id'";
            }
            mysqli_query($conn,$update_sql);
         }else{
            mysqli_query($conn,"insert into client_list (firstname, lastname, nic, Address, location, mobile_Number, email_address, date_of_birth, gender, username, password, date_added)
            values('$firstname', '$lastname', '$nic', '$Address', '$location', '$mobile_Number', '$email_address', '$date_of_birth','$gender', '$username','$password', NOW())");
         }
         echo 'Record Updated Successfully';
   
         
         die();
   }



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
                    
                    <input class="form-control" placeholder="Date of Brith" type="date" name="date_of_brith" required>
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

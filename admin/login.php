<?php


include('includes/connection.php'); 
include('includes/errors.php'); 
include('includes/functions.php'); 
$msg='';    
if (isset($_POST['login_btn'])) {
   //data sanitization to prevent SQL injection
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);

   //error message if the input field is left blank
   if (empty($username)) {
      array_push($errors, "Username is required");
   }
   if (empty($password)) {
      array_push($errors, "Password is required");
   }

   
   if (count($errors) == 0) {
      $password = md5($password); 
      $query = "select * from admin_users where username = '$username' and password = '$password'";
      $results = mysqli_query($conn, $query);

      
      if (mysqli_num_rows($results) == 1) {
         $_SESSION['username'] = $username; 
         $_SESSION['success'] = "You have logged in!"; 
         header('location: index.php'); 
      }else {
         array_push($errors, "Username or password incorrect"); 
         
      }
   }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> GoCheeta | Admin Panel</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/sb-admin-2.css" rel="stylesheet">


  

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                
              </div>

                <form class="user" action="#" method="POST">
                  

                    <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-user" placeholder="Enter Username..." required>
                    </div>
                    <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Enter Password" required>
                    </div>
            
                    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                    <hr>
                </form>


            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>


<?php
include('includes/scripts.php'); 
?>
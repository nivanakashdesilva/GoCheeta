<?php

require('connection.php');
require('functions.php');
$msg='';    
if (isset($_POST['login_user'])) {
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
         header('location: home.php'); 
      }else {
         array_push($errors, "Username or password incorrect"); 
         
      }
   }

}
?><!DOCTYPE html>
<html>
<head>
    <title>
        Login and Registration
        System - LAMP Stack
    </title>
</head>
<body>
    <div class="header">
        <h2>Login Here!</h2>
    </div>
      
    <form method="post" action="login.php">
  
        <?php include('errors.php'); ?>
  
        <div class="input-group">
            <label>Enter Username</label>
            <input type="text" name="username" required >
        </div>
        <div class="input-group">
            <label>Enter Password</label>
            <input type="password" name="password" required>
        </div>
        <div class="input-group">
            <button type="submit" class="btn"
                        name="login_user">
                Login
            </button>
        </div>
         
 
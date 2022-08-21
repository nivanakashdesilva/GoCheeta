<?php
include_once 'connection.php';

if (isset($_POST['create'])) {

    // receiving the values entered and storing in the variables
    //data sanitization is done to prevent SQL injections
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    // ensuring that the user has not left any input field blank
    // error messages will be displayed for every blank input
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }

    if ($password != $password_2) {
        array_push($errors, "The two passwords do not match");
        //checking if the passwords match
    }

    // if the form is error free, then register the user
    if (count($errors) == 0) {
        $password = md5($password);//password encryption to increase data security
        $query = "INSERT INTO admin_users (username, email, password) 
                  VALUES('$username', '$email', '$password')"; //inserting data into table
        mysqli_query($conn, $query);

        header("location:add_admin.php"); 
        //page on which the user will be redirected after logging in
    }

}


?>

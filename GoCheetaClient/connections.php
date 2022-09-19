<?php

$username = "";
$email    = "";
$errors = array(); 
$_SESSION['success'] = "";

session_start();
$conn = mysqli_connect("localhost", "root", "", "gocheeta");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>


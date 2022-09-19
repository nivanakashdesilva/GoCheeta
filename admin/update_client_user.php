<?php
include('includes/connection.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$nic = $_POST['nic'];
$Address = $_POST['address'];
$location = $_POST['location'];
$mobile_Number = $_POST['mobile_number'];
$email_address = $_POST['email_address'];
$date_of_birth = $_POST['date_of_birth'];
$gender = $_POST['gender'];
$username = $_POST['username'];
$password = $_POST['password'];
$date_added = $_POST['date_added'];

if(isset($_POST['create'])){
        $query= "insert into client_list (firstname, lastname, nic, address, location, mobile_number, email_address, date_of_birth, gender, username, password, date_added)
        values('$firstname', '$lastname', '$nic', '$Address', '$location', '$mobile_Number', '$email_address', '$date_of_birth', '$gender', '$username', '$password', NOW())";

        $run = mysqli_query($conn,$query) or die (mysqli_query());

        if($run){
            echo "form submitted sucessfully";
            header("location:client_user.php");
        }else {
            echo "form submit not successful";
            header("location:client_user.php");
        }
    }else{
        echo " all feilds required";
    }

    
?>


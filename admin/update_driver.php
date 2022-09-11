<?php
include('includes/connection.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$nic = $_POST['nic'];
$mobile_number = $_POST['mobile_number'];
$driver_license = $_POST['driver_license'];
$username = $_POST['username'];
$password = $_POST['password'];
$vehical_category_id = $_POST['vehical_category_id'];
$vehical_detail_id = $_POST['vehical_detail_id'];
$branch_id = $_POST['branch_id'];
$status = $_POST['status'];






?>

<?php

if (isset($_POST['create']) && isset($_FILES['image'])) {

    echo "<pre>";
    print_r($_FILES['image']);
    echo "</pre>";

    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

    if ($error === 0) {
        if ($img_size > 125000) {
            $em = "Sorry, your file is too large!";
            header("location: add_driver.php?error=$em");
        }
        else {
            $img_ex=pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc=strtolower($img_ex);

            $allow_exs= array("jpg", "jpeg", "png");

            if(in_array($img_ex_lc, $allow_exs)){
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'asset/images/uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                mysqli_query($conn, "insert into driver (firstname, lastname, nic, mobile_number, driver_license, username, password, avatar, vehical_category_id, vehical_detail_id, branch_id, status, date_added)
 values('$firstname', '$lastname', '$nic', '$mobile_number', '$driver_license', '$username', '$password','$new_img_name', '$vehical_category_id', '$vehical_detail_id', '$branch_id', '$status', NOW())");
                header("location: driver.php");

            }else{
                $em = "You can't upload files of this type";
                header("location: add_driver.php?error=$em");
            }
        }
    }
    else {
        $em = "unknown error occured!";
        header("location: add_driver.php?error=$em");
    }


}
else {
    header("location:driver.php");
};
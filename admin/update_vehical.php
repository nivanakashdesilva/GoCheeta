<?php
include('includes/connection.php');



    $vehical_make = $_POST['vehical_make'];
	$vehical_model = $_POST['vehical_model'];
    $vehical_year = $_POST['vehical_year'];
	$vehical_number = $_POST['vehical_number'];
	$number_of_seats = $_POST['number_of_seats'];
    $vehical_category_id = $_POST['vehical_category_id'];
	$vehical_chasie_number = $_POST['vehical_chasie_number'];
	$vehical_insurance_provider = $_POST['vehical_insurance_provider'];
	$vehical_insurance_policy_number = $_POST['vehical_insurance_policy_number'];
	$vehical_color = $_POST['vehical_color'];
    
    
    

?>

<?php

if (isset($_POST['create']) && isset($_FILES['vehical_front_image']) && isset($_FILES['vehical_leftside_image']) && isset($_FILES['vehical_rightside_image']) && isset($_FILES['vehical_rear_image'])) {

    echo "<pre>";
    print_r($_FILES['vehical_front_image']);
    print_r($_FILES['vehical_leftside_image']);
    print_r($_FILES['vehical_rightside_image']);
    print_r($_FILES['vehical_rear_image']);
    echo "</pre>";

    $front_img_name = $_FILES['vehical_front_image']['name'];
    $front_img_size = $_FILES['vehical_front_image']['size'];
    $front_tmp_name = $_FILES['vehical_front_image']['tmp_name'];
    $front_error = $_FILES['vehical_front_image']['error'];

    $leftside_img_name = $_FILES['vehical_leftside_image']['name'];
    $leftside_img_size = $_FILES['vehical_leftside_image']['size'];
    $leftside_tmp_name = $_FILES['vehical_leftside_image']['tmp_name'];
    $leftside_error = $_FILES['vehical_leftside_image']['error'];

    $rightside_img_name = $_FILES['vehical_rightside_image']['name'];
    $rightside_img_size = $_FILES['vehical_rightside_image']['size'];
    $rightside_tmp_name = $_FILES['vehical_rightside_image']['tmp_name'];
    $rightside_error = $_FILES['vehical_rightside_image']['error'];

    $rear_img_name = $_FILES['vehical_rear_image']['name'];
    $rear_img_size = $_FILES['vehical_rear_image']['size'];
    $rear_tmp_name = $_FILES['vehical_rear_image']['tmp_name'];
    $rear_error = $_FILES['vehical_rear_image']['error'];

    if ($front_error === 0 && $leftside_error === 0 && $rightside_error === 0 && $rear_error === 0) {
        echo "</pre>";
        if ($front_img_size > 125000 && $leftside_img_size > 125000 && $rightside_img_size > 125000 && $rear_img_size > 125000 ) {
            $em = "Sorry, your file is too large!";
            header("location: add_vehical.php?error=$em");
        }
        else {
            $front_img_ex=pathinfo($front_img_name, PATHINFO_EXTENSION);
            $front_img_ex_lc=strtolower($front_img_ex);

            $leftside_img_ex=pathinfo($leftside_img_name, PATHINFO_EXTENSION);
            $leftside_img_ex_lc=strtolower($leftside_img_ex);

            $rightside_img_ex=pathinfo($rightside_img_name, PATHINFO_EXTENSION);
            $rightside_img_ex_lc=strtolower($rightside_img_ex);

            $rear_img_ex=pathinfo($rear_img_name, PATHINFO_EXTENSION);
            $rear_img_ex_lc=strtolower($rear_img_ex);


            $allow_exs= array("jpg", "jpeg", "png");
            

            if(in_array($front_img_ex_lc, $allow_exs)){
                            $front_new_img_name = uniqid("IMG-", true).'.'.$front_img_ex_lc;
                            $leftside_new_img_name = uniqid("IMG-", true).'.'.$leftside_img_ex_lc;
                            $rightside_new_img_name = uniqid("IMG-", true).'.'.$rightside_img_ex_lc;
                            $rear_new_img_name = uniqid("IMG-", true).'.'.$rear_img_ex_lc;

                            $front_img_upload_path = 'asset/images/uploads/'.$front_new_img_name;
                            $leftside_img_upload_path = 'asset/images/uploads/'.$leftside_new_img_name;
                            $rightside_img_upload_path = 'asset/images/uploads/'.$rightside_new_img_name;
                            $rear_img_upload_path = 'asset/images/uploads/'.$rear_new_img_name;

                            move_uploaded_file($front_tmp_name, $front_img_upload_path);
                            move_uploaded_file($leftside_tmp_name, $leftside_img_upload_path);
                            move_uploaded_file($rightside_tmp_name, $rightside_img_upload_path);
                            move_uploaded_file($rear_tmp_name, $rear_img_upload_path);
                            mysqli_query($conn, "insert into vehical_detail (vehical_make, vehical_model, vehical_year, vehical_number, number_of_seats, vehical_category_id, vehical_chasie_number, vehical_insurance_provider, vehical_insurance_policy_number, vehical_front_image, vehical_leftside_image, vehical_rightside_image, vehical_rear_image, vehical_color, vehical_added_date)
                                                            values('$vehical_make', '$vehical_model', '$vehical_year', '$vehical_number', '$number_of_seats', '$vehical_category_id', '$vehical_chasie_number', '$vehical_insurance_provider','$vehical_insurance_policy_number', '$front_new_img_name', '$leftside_new_img_name', '$rightside_new_img_name', '$rear_new_img_name','$vehical_color', NOW())");
                            header("location: vehical.php");
                       
            }else{
                $em = "You can't upload front files of this type";
                header("location: add_vehical.php?error=$em");
            }
        }
    }
    else {
        $em = "unknown error occured!";
        header("location: add_vehical.php?error=$em");
    }


}
else {
    header("location: vehical.php");
};
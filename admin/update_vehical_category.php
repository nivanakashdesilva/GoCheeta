<?php
include('includes/connection.php');

if(isset($_POST['create'])){
    if(!empty($_POST['category'])){
        $category=$_POST['category'];
        $query="insert into vehical_category (category) value('$category')";

        $run = mysqli_query($conn,$query) or die (mysqli_query());

        if($run){
            echo "form submitted sucessfully";
            header("location:vehical_category.php");
        }else {
            echo "form submit not successful";
            header("location:vehical_category.php");
        }
    }else{
        echo " all feilds required";
    }
}
    
?>

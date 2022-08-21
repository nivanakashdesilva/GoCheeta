<?php
include_once 'connection.php';

if(isset($_POST['create'])){
    if(!empty($_POST['location'])){
        $location=$_POST['location'];
        $query="insert into branch (location) value('$location')";

        $run = mysqli_query($conn,$query) or die (mysqli_query());

        if($run){
            echo "form submitted sucessfully";
            header("location:add_branch.php");
        }else {
            echo "form submit not successful";
            header("location:add_branch.php");
        }
    }else{
        echo " all feilds required";
    }
}
    
?>

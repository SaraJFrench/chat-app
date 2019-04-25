<?php

// session_start();
include("connection.php");


if(isset($_POST['sign_up'])){

$name = htmlentities(mysqli_real_escape_string($con, $_POST['user_name']));
$pass = htmlentities(mysqli_real_escape_string($con, $_POST['user_pass']));
$email = htmlentities(mysqli_real_escape_string($con, $_POST['user_email']));
$country = htmlentities(mysqli_real_escape_string($con, $_POST['user_country']));
$gender = htmlentities(mysqli_real_escape_string($con, $_POST['user_gender']));
$rand = rand(1, 2);

if($name == ''){
    echo"<script alert('Unable to verify name')></script>";
}
if(strlen($pass)<8){
    echo"<script alert('Password must be 8 charecters')></script>";
    exit();
}
$check_email = "SELECT * from users where user_email='$email'";
$run_email = mysqli_query($con, $check_email);
$check = mysqli_num_rows($run_email);

if($check == 1){
    echo"<script alert('email already exists')></script>";
    echo"<script>window.open('signup.php','_self')></script>";
    exit();


    }
 if($rand == 1)  
     $profile_pic = "profile1.jpg";
 
 else if($rand == 2)
    $profile_pic = "profile2.jpg";

$insert = "INSERT into users(user_name, user_pass, user_email, user_profile, user_country, user_gender) values('$name', '$pass', '$email', '$profile_pic', '$country', '$gender')";  

$query = mysqli_query($con, $insert);
    if($query){
        echo"<script alert('Congrats $name, your accaout has been created')></script>";
        echo"<script>window.open('signin.php','_self')> </script>";
    }
    else{
        echo"<script alert('Registration failed')></script>";
        echo"<script>window.open('signup.php','_self')></script>";

        }

    }
?>


<!DOCTYPE html>
<?php
session_start();
include("connection.php");
include("header.php");

if(!isset($_SESSION['user_email'])){
    header("location: signin.php");
}
 else{ ?>
<html>
<head>
  <title>Change Profile Picture</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="find_people.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 </head>
 <style>
     .card{
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    max-width: 400px;
    margin: auto;
    text-align: center;
    font-family: arial;
}
.card img{
    height: 200px;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align:center;
    cursor:pointer;
    width: 100%;
    font-size:18px;
}
.title{
    color: grey;
    font-size: 18px;
}
.button{
    border:none;
    display:inline-block;
    padding:8px;
    color: mediumturquoise;
    background-color: #000;
    text-align: center;
    width:100%;
    cursor: pointer;
}
#update_profile{
    border:none;
    cursor: pointer;
    padding:10px;
    color: white;
    background-color: #000;
    border-radius:4px;
}
lable{
    padding:7px;
    display:table;
    color:#fff;
}
input[type="file"]{
    display:none;
}

 </style>
 <body>
     <?php
 $user = $_SESSION['user_email'];
              $get_user = "select * from users where user_email='$user'";
              $run_user = mysqli_query($con, $get_user);
              $row = mysqli_fetch_array($run_user);

              $user_profile = $row['user_profile'];
              $user_name = $row['user_name'];

              echo"
              <div class='card'>
              <img src='$user_profile'>
              <h1>$user_name</h1>
              <form method='post' enctype='multipart/form-data'>
             <label id='update_profile'><i class='fa fa-circle-o' aria-hidden='true'></i>Select Profile
             <input type ='file' name='u_image' size='60'> </label>
           
             <button id='button_profile' name='update'>&nbsp&nbsp<i class='fa fa-heart'aria-hidden='true'></i>
             Update Profile </button> 
       
              </form>
          </div><br><br>
          
              ";
              if(isset($_POST['update'])){
                  $u_image = $_FILES['u_image']['name'];
                  $image_tmp = $_FILES['u_image']['tmp_name'];
                  $random_number = rand(1,100);

                  if($u_image==''){
                      echo"<script>alert('Please Select Profile')</script>";
                      echo"<script>window.open('upload.php', '_self')</script>";
                  }else{
                      move_uploaded_file($image_tmp, "$u_image.$random_number");

                     $update = "update users set user_profile = '$u_image.$random_number' where user_email='$user'";
                     $run = mysqli_query($con, $update);

                    if($run){
                        echo"<script>alert('Profile Updated')</script>";
                      echo"<script>window.open('upload.php', '_self')</script>";
                    }

                  }
                }
 

              ?>

 </body>

 </html>
            <?php } ?>
<!-- links -->
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
<body>
    <div class="signin-form">
        <form action="" method="post">
            <div class="form-header">
                <h2>Forgot Password</h2>
                <p>MyChat</p>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="bf" placeholder="Someone..." autocomplete="off" required>
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary btn-block btn-lg" name="submit">Submit</button>
    </div>
</form>
<div class="text-center small" style="color: #67428B;">Back to Signin? <a href="signin.php"> Click here</a></div>
</div>
<?php session_start();
include("connection.php");
    if(isset($_POST['submit'])){
        $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
        $recovery_account = htmlentities(mysqli_real_escape_string($con, $_POST['bf']));

        $select_user = "select * from users where user_email='$email' AND 
        forgotten_answer='$recovery_account'";
        $query = mysqli_query($con, $select_user);
        $check_user = mysqli_query_num_rows($query);
        if($check_user==1) {
            $_SESSION['user_email']=$email;
            echo"<script>window.open('create_password.php', '_self')</script>";
        }else{
            echo "<script>alert('Your email or best friend is incorrect.')</script>";
            echo "<script>window.open('forgot_pass.php', '_self')</script";
        }

    }

?>
</body>
</html>
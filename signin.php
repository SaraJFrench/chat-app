<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login to your account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="signin.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="signin-form">
    <form action="" method="post">
        <div class="form-header">
            <h2>Sign In</h2>
            <p>Login to MyChat</p>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="someone@site.com"
            autocomplete="off" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="pass" placeholder="Password"
            autocomplete="off" required>
        </div>
        <div class="small">Forgot Password <a href="forgot_pass.php">Click Here </a></div><br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn btn-block btn btn-lg" name="sign_in">Sign In</button>
        </div>
      

        <?php include("signin_user.php"); ?> 
        
    </form>
    <div  class ="text-center small" style="color: #67428B;">Dont have an account?<a href="signup.php">  Create One  </a></div>


</div>
</body>
</html>

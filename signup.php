<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create New Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="signup.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="signup-form">
    <form action="" method="post">
        <div class="form-header">
            <h2>Sign Up</h2>
            <p>Fill Out To Chat</p>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="user_name" placeholder=""
            autocomplete="off" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="user_pass" placeholder="Password"
            autocomplete="off" required>
       <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="user_email" placeholder="someone@site.com"
            autocomplete="off" required>
        </div>
        <div class="form-group">
            <label>Country</label>
            <select class="form-control" name="user_country" required>
                <option disabled="">Select a Country</option>
                <option>USA</option>
                <option>Canada</option>
                <option>UK</option>
                <option>Australia</option>
            </select>
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select class="form-control" name="user_gender" required>
                <option disabled="">Select Your Gender</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>

            </select>
        </div>
        <div class="form-group">
        <label class ="checkbox-inline"><input type="checkbox" required>I accept the <a href="#">
            Terms of Use</a>&amp;<a href="#">Privacy </a></label>
        </div>
        <div class="form-group">  
        <button type="submit" class="btn btn-primary btn btn-block btn btn-lg" name="sign_up">Sign Up</button>
        </div>
                 
        
        <?php include ("signup_user.php"); ?>
        
    </form>
    <div  class ="text-center small" style="color: #67428B;">  Already have an account?  <a href="signin.php">  Sign in Here </a></div>


</div>
</body>
</html>

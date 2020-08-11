<?php
  require 'database/connect.php';

  $error = '';
  $invalid = '';

  session_start();
  if(isset($_SESSION['login_user'])){
    header('location:index.php');
  }

  if(isset($_POST['submit'])){
     // echo "<script> alert('working')</script>";
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['pass']);

    if($email==NULL || $password==NULL){
      $error = "This field is requierd";
    }
    else {
      $password = md5($password);

      $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password' LIMIT 1";
      $query = mysqli_query($conn,$sql);

      if(mysqli_num_rows($query)>0){
        $_SESSION['login_user']=$email;
        header('location:index.php');
      }
      else {
        $invalid = "Invaild email and password";
      }
    }
  }
 ?>
<!DOCTYPE HTML>
<html>
<head>
<title>HasanHero</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="js/jquery-2.1.1.min.js"></script>
<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet">
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
</head>
<body>
<div class="login-page">
    <div class="login-main">
    	 <div class="login-head">
				<h1>Login</h1>
			</div>
			<div class="login-block">
				<form method="post">
					<input type="text" name="email" placeholder="Email">
          <span class="text-danger"><?= $error; ?></span>
					<input type="password" name="pass" class="lock" placeholder="Password">
          <span class="text-danger"><?= $error; ?><?= $invalid; ?></span>
					<div class="forgot-top-grids">
						<div class="forgot-grid">
						</div>

						<div class="clearfix"> </div>
					</div>
					<input type="submit" name="submit" value="Login">
					<h3>Not a member?<a href="signup.php"> Sign up now</a></h3>
          <!-- <a href="#">Forgot password?</a> -->
				</form>
			</div>
      </div>
</div>
<?php
require 'layouts/footer.php';
?>
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
<script src="js/bootstrap.js"> </script>
</body>
</html>

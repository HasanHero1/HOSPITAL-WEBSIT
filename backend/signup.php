<?php
 require 'database/connect.php';

 $error ='';
 $length ='';
 $pass='';
 $email_check='';

 if(isset($_POST['submit'])){
   // echo "<script> alert('working')</script>";
   $name = mysqli_real_escape_string($conn,$_POST['name']);
   $email = mysqli_real_escape_string($conn,$_POST['email']);
   $password = mysqli_real_escape_string($conn,$_POST['pass']);
   $ConfirmPassword = mysqli_real_escape_string($conn,$_POST['con_pass']);

   $email_exist = "SELECT email FROM admin WHERE email ='$email' LIMIT 1";
   $query = mysqli_query($conn,$email_exist);

   if(mysqli_num_rows($query)>0){
     $email_check = "You email is already existed";
   }
   else if($name==NULL || $email==NULL  || $password==NULL || $ConfirmPassword==NULL){
     $error = "This field is required";
   }
   else if(strlen($password)<5){
     $length = "Length must be greater than 4";
   }
   else if($password != $ConfirmPassword){
     $pass="Your Password Does Not Match";
   }
   else{
     $password = md5($password);

     $sql = "INSERT INTO admin (`name`,`email`,`password`) VALUES ('$name','$email','$password')";
     $query = mysqli_query($conn,$sql);

     if($query){
       header('location:login.php');
     }
     else{
       echo mysqli_error($conn);
     }

   }
 }
 // else {
 //   echo "<script> alert('Something went wrong')</script>";
 // }
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
<!--//charts-->
</head>
<body>
<!--inner block start here-->
<div class="signup-page-main">
     <div class="signup-main">
    	 <div class="signup-head">
				<h1>Sign Up</h1>
			</div>
			<div class="signup-block">
				<form method="POST">
					<input type="text" name="name" placeholder="Name" >
          <span class="text-danger"><?= $error; ?></span>

					<input type="text" name="email" placeholder="Email" >
          <span class="text-danger"><?= $error; ?><?= $email_check; ?></span>

					<input type="password" name="pass" class="lock" placeholder="Password">
          <span class="text-danger"><?= $error; ?><?= $length; ?></span>

          <input type="password" name="con_pass" class="lock" placeholder="Confirm-Password">
          <span class="text-danger"><?= $error; ?><?= $pass; ?></span>


					<input type="submit" name="submit" value="Sign up">
				</form>
				<div class="sign-down">
				<h4>Already have an account? <a href="login.html"> Login here.</a></h4>
				  <h5><a href="index.php">Go Back to Home</a></h5>
				</div>
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

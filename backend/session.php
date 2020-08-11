<?php
  require 'database/connect.php';

  session_start();
  $user_check = $_SESSION['login_user'];

  $sql = "SELECT * FROM admin WHERE email = '$user_check' LIMIT 1";
  $query = mysqli_query($conn,$sql);

  $row = (mysqli_fetch_assoc($query));
  $login_session = $row['name'];
  $_SESSION['login_id'] = $row['id'];

  if(!isset($login_session)){
    mysqli_close($conn);
    header('location:login.php');
  }
 ?>

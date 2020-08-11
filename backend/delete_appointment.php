<?php
  require 'database/connect.php';

  if(isset($_GET['id'])){
    $sql = "DELETE FROM appointment WHERE id=" . $_GET['id'];
    $query = mysqli_query($conn,$sql);

    if($query){
      header('location:appointment.php');
    }else {
      echo "<script> alert('Something went wrong,please try again')";
    }
  }
?>

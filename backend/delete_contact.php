<?php
  require 'database/connect.php';

  if(isset($_GET['id'])){
    $sql = "DELETE FROM contact WHERE id=" . $_GET['id'];
    $query = mysqli_query($conn,$sql);

    if($query){
      header('location:contact.php');
    }else {
      echo "<script> alert('Something went wrong,please try again')";
    }
  }
?>

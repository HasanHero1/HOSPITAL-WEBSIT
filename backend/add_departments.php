
<?php
    require 'database/connect.php';

    $error ='';
    $product_check = '';

    if(isset($_POST['submit'])){
        $name = mysqli_escape_string($conn,$_POST['name']);
        $details = mysqli_escape_string($conn,$_POST['details']);


        if($name==NULL || $details==NULL){
            $error = "This filled can not be empty";
        }
        else{
          $image = rand(11111111,99999999).$_FILES['image']['name'];
          move_uploaded_file($_FILES['image']['tmp_name'],'../image/departments/'. $image);

            $sql = "INSERT INTO departments (`name`,`status`,`image`,`details`) VALUES ('$name',1,'$image','$details')";
            $query = mysqli_query($conn,$sql);

            if($query){
              echo "<script> alert('Your Category is Successfuly Inserted')</script>".header('location:departments.php');
            }
            else{
              echo mysqli_error($conn);
            }
        }
    }
    // else{
    //     echo "<script> alert('Something went wrong')</script>";
    // }
?>
<!DOCTYPE HTML>
<html>
<?php
require 'layouts/topbar.php';
include 'layouts/add_cat.css';
?>
<div class="inner-block">
<div class="chit-chat-layer1">
	<div class="col-md-10 chit-chat-layer1-left">
    <form  method="POST" action="#" enctype="multipart/form-data">
      <div class="container">
        <h1>Add Department</h1>
        <p>Please fill in this form to create new Department.</p>
        <hr>

        <label for="text"><b>Department Name</b></label>
        <input type="text" placeholder="Enter Categorie Details" name="name">
        <!-- <span class="text-danger"><?= $error; ?></span> -->

        <label for="text"><b>Image<br>Size:W-620p x H-420p</b></label>
        <input type="file" placeholder="Enter Categorie Details" name="image">
        <!-- <span class="text-danger"><?= $error; ?></span> --><br><br>

        <label for="text"><b>Details</b></label>
        <input type="text" placeholder="Enter Categorie Details" name="details">
        <!-- <span class="text-danger"><?= $error; ?></span> -->

        <div class="clearfix">
          <button type="submit" name="submit" class="signupbtn">Sign Up</button>
        </div>
      </div>
    </form>
      </div>
</div>
  <div class="clearfix"> </div>
</div>
</div>
<?php
require 'layouts/footer.php';
?>
</div>
</div>
<?php
require 'layouts/sidebar.php';
?>
</body>
</html>

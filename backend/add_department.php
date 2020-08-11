
<?php
    require 'database/connect.php';

    $error ='';
    $product_check = '';

    if(isset($_POST['submit'])){
        $name = mysqli_escape_string($conn,$_POST['department']);


        if($name==NULL){
            $error = "This filled can not be empty";
        }
        else{
          $image = rand(11111111,99999999).$_FILES['image']['name'];
          move_uploaded_file($_FILES['image']['tmp_name'],'../image/department/'. $image);

            $sql = "INSERT INTO department (`name`,`status`,`image`) VALUES ('$name',1,'$image')";
            $query = mysqli_query($conn,$sql);

            if($query){
              echo "<script> alert('Your Category is Successfuly Inserted')</script>".header('location:index.php');
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
        <p>Please fill in this form to create new department.</p>
        <hr>
        <label for="email"><b>Image<br>Size:W-620p, H-420p</b></label><br>
        <input type="file" placeholder="Enter Banner Image" name="image">
        <!-- <span class="text-danger"><?= $error; ?></span><br> --><br><br>

        <label for="name"><b>Department Nmae</b></label><br>
        <input type="text" placeholder="Enter Department Name" name="department">
        <!-- <span class="text-danger"><?= $error; ?></span><br> --><br><br>

        <div class="clearfix">
          <button type="submit" name="submit" class="signupbtn">Add Department</button>
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

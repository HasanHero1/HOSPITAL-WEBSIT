
<?php
    require 'database/connect.php';

    if(isset($_POST['submit'])){
          $image = rand(11111111,99999999).$_FILES['image']['name'];
          move_uploaded_file($_FILES['image']['tmp_name'],'../images/banner_add/'. $image);

            $sql = "INSERT INTO banner_add (`image`,`status`) VALUES ('$image',1)";
            $query = mysqli_query($conn,$sql);

            if($query){
              echo "<script> alert('Your Category is Successfuly Inserted')</script>".header('location:index.php');
            }
            else{
              echo mysqli_error($conn);
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
        <h1>Add Banner Image</h1>
        <p>Please fill in this form to create new banner image.</p>
        <hr>
        <label for="email"><b>Banner Image</b></label><br>
        <input type="file" placeholder="Enter Banner Image" name="image">
        <!-- <span class="text-danger"><?= $error; ?></span><br> --><br><br>

        <div class="clearfix">
          <button type="submit" name="submit" class="signupbtn">Add Banner Image</button>
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

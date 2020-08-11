<?php
    include 'database/connect.php';

    $id='';
    $image='';

    if(isset($_GET['id'])){
      $sql = "SELECT * FROM banner_add where id=".$_GET['id'];
      $query = mysqli_query($conn,$sql);
      if($query){
        if(mysqli_num_rows($query)>0){
          while($row=mysqli_fetch_assoc($query)){
            $id = $row['id'];
            $image = $row['image'];
          }
        }
      }
    }

    if(isset($_POST['submit'])){
        $id= mysqli_escape_string($conn,$_POST['uid']);

        $image = rand(11111111,99999999).$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],'../images/banner_add/'. $image);

        $sql= "UPDATE banner_add SET image='$image' WHERE id='$id'";
        $query = mysqli_query($conn,$sql);
        if($query){
          header('location:index.php');
        }
        else{
          echo "<script> alert('Something Went Wrong')</script>".mysqli_error($conn);
        }
    }
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
        <h1>Update Banner Image</h1>
        <p>Please fill in this form to update banner image.</p>
        <hr>
        <label for="email"><b>Banner Image</b></label>
        <input type="file" placeholder="Enter Banner Image" value="<?= $image ?>" name="image">

        <label for="id"></label>
        <input type="hidden" placeholder="Enter Categorie Details" value="<?= $id; ?>" name="uid">

        <div class="clearfix">
          <button type="submit" name="submit" class="signupbtn">Update</button>
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

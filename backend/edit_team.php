<?php
    include 'database/connect.php';

    $id='';
    $name='';
    $details='';

    if(isset($_GET['id'])){
      $sql = "SELECT * FROM our_team where id=".$_GET['id'];
      $query = mysqli_query($conn,$sql);
      if($query){
        if(mysqli_num_rows($query)>0){
          while($row=mysqli_fetch_assoc($query)){
            $id = $row['id'];
            $name = $row['name'];
            $details = $row['image'];
          }
        }
      }
    }

    if(isset($_POST['submit'])){
        $cat_name = mysqli_escape_string($conn,$_POST['name']) ;
        $details = mysqli_escape_string($conn,$_POST['image']);
        $id= mysqli_escape_string($conn,$_POST['uid']);

        $sql= "UPDATE our_team SET name='$name', image='$image' WHERE id='$id'";
        $query = mysqli_query($conn,$sql);
        if($query){
          header('location:our_team.php');
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
    <form  method="POST" action="#">
      <div class="container">
        <h1>Update Info</h1>
        <p>Please fill in this form to update Our Team.</p>
        <hr>
        <label for="email"><b>Name</b></label>
        <input type="text" placeholder="Enter Categorie Name" value="<?= $name ?>" name="name">

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

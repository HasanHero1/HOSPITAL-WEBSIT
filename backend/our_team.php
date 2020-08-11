<?php
  require 'database/connect.php';

  if(isset($_GET['type']) && $_GET['type'] !=''){
    $type = mysqli_real_escape_string($conn,$_GET['type']);

    if($type=='status'){
      $operation = mysqli_real_escape_string($conn,$_GET['operation']);
      $id = mysqli_real_escape_string($conn,$_GET['id']);

      if($operation=='active'){
        $status = '1';
      }else {
        $status = '0';
      }
      $sql = "UPDATE our_team SET status='$status' WHERE id='$id'";
      $query = mysqli_query($conn,$sql);
    }
  }
?>
<!DOCTYPE HTML>
<html>
<?php
require 'layouts/topbar.php';
?>
<div class="inner-block">
<div class="chit-chat-layer1">
  <a href="add_team.php" class="btn btn-info">Add Member</a><br><br>

	<div class="col-md-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Our Team
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Name</th>
                                      <th>Image</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
								                  require 'database/connect.php';

								                  $sql = "SELECT * FROM our_team";
								                  $query = mysqli_query($conn,$sql);

								                  if($query){
								                    if(mysqli_num_rows($query)>0){
								                      while($row=mysqli_fetch_assoc($query)){

								                 ?>
                                <tr>
                                  <td><?= $row['id']; ?></td>
                                  <td><?= $row['name']; ?></td>
                                  <td><img width="60px" height="60px"src="../image/our_team/<?= $row['image']; ?>"/></td>

                                  <td class="btncol">
                                    <?php
                                      if($row['status']==1){
                                        echo "<span class='btn btn-info'>
                                        <a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>";
                                      }else {
                                        echo "<span class='btn btn-warning'>
                                        <a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>";
                                      }
                                    ?>
                                  </td>
                                  <td>
                                    <a href="edit_team.php?id=<?= $row['id'] ?>" class="btn btn-success">Edit</a>
                                    <a href="delete_team.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                                  </td>
                              </tr>
                              <?php
                                    }
                                  }
                                }
                              ?>
                          </tbody>
                      </table>
                  </div>
             </div>
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

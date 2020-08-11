<?php
  require 'database/connect.php';
?>
<!DOCTYPE HTML>
<html>
<?php
require 'layouts/topbar.php';
?>
<div class="inner-block">
<div class="chit-chat-layer1">
  <a href="add_departments.php" class="btn btn-info">Add Department</a><br><br>

	<div class="col-md-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Categories
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Department Name</th>
                                      <th>Image</th>
                                      <th>Details</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
								                  require 'database/connect.php';

								                  $sql = "SELECT * FROM departments";
								                  $query = mysqli_query($conn,$sql);

								                  if($query){
								                    if(mysqli_num_rows($query)>0){
								                      while($row=mysqli_fetch_assoc($query)){

								                 ?>
                                <tr>
                                  <td><?= $row['id']; ?></td>
                                  <td><?= $row['name']; ?></td>
                                  <td><img width="60px" height="40px"src="../image/departments/<?= $row['image']; ?>"/></td>
                                  <td><?= $row['details']; ?></td>

                                  <td>
                                    <a href="edit_categorie.php?id=<?= $row['id'] ?>" class="btn btn-success">Edit</a>
                                    <a href="delete_categorie.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
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

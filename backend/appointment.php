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
                                      <th>Name</th>
                                      <th>Number</th>
                                      <th>Email</th>
                                      <th>Symptoms</th>
                                      <th>Department</th>
                                      <th>Gender</th>
                                      <th>Date</th>
                                      <th>Time</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
								                  require 'database/connect.php';

								                  $sql = "SELECT * FROM appointment";
								                  $query = mysqli_query($conn,$sql);

								                  if($query){
								                    if(mysqli_num_rows($query)>0){
								                      while($row=mysqli_fetch_assoc($query)){

								                 ?>
                                <tr>
                                  <td><?= $row['id']; ?></td>
                                  <td><?= $row['name']; ?></td>
                                  <td><?= $row['mobile']; ?></td>
                                  <td><?= $row['email']; ?></td>
                                  <td><?= $row['symptoms']; ?></td>
                                  <td><?= $row['department']; ?></td>
                                  <td><?= $row['gender']; ?></td>
                                  <td><?= $row['date']; ?></td>
                                  <td><?= $row['time']; ?></td>

                                  <td>
                                    <a href="delete_appointment.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
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

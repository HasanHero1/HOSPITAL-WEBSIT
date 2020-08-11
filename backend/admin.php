

<!DOCTYPE HTML>
<html>
<?php
require 'layouts/topbar.php';
?>
<div class="inner-block">
<div class="chit-chat-layer1">

	<div class="col-md-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Admin Table
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Mobile</th>
                                  </tr>
                              </thead>
                              <tbody>
																<?php
								                  require 'database/connect.php';

								                  $sql = "SELECT * FROM admin";
								                  $query = mysqli_query($conn,$sql);

								                  if($query){
								                    if(mysqli_num_rows($query)>0){
								                      while($row=mysqli_fetch_assoc($query)){

								                 ?>
                                <tr>
                                  <td><?= $row['id']; ?></td>
                                  <td><?= $row['name']; ?></td>
                                  <td><?= $row['email']; ?></td>
                                  <td><?= $row['mobile']; ?></td>
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

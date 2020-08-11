<?php
  require 'database/connect.php';
	require 'session.php';

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
      $sql = "UPDATE banner_add SET status='$status' WHERE id='$id'";
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
	 <div class="market-updates">
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-8 market-update-left">
						<h3>83</h3>
						<h4>Registered User</h4>
						<p>Other hand, we denounce</p>
					</div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-file-text-o"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-2">
				 <div class="col-md-8 market-update-left">
					<h3>135</h3>
					<h4>Daily Visitors</h4>
					<p>Other hand, we denounce</p>
				  </div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-8 market-update-left">
						<h3>23</h3>
						<h4>New Messages</h4>
						<p>Other hand, we denounce</p>
					</div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-envelope-o"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
<!--market updates end here-->
<!--mainpage chit-chating-->
<div class="chit-chat-layer1">
	<div class="col-md-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Banner Add
                            </div>
														<a href="add_banner_add.php" class="btn btn-info">Add Banner Image</a><br><br>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Image</th>
																			<th>Status</th>
																			<th>Action</th>
                                  </tr>
                                </thead>
                              <tbody>
																<?php
								                  require 'database/connect.php';

								                  $sql = "SELECT * FROM banner_add";
								                  $query = mysqli_query($conn,$sql);

								                  if($query){
								                    if(mysqli_num_rows($query)>0){
								                      while($row=mysqli_fetch_assoc($query)){

								                 ?>
                                <tr>
                                  <td><?= $row['id']; ?></td>
                                  <td><img width="60px" height="40px"src="../images/banner_add/<?= $row['image']; ?>"/></td>
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
                                    <a href="edit_banner_add.php?id=<?= $row['id'] ?>" class="btn btn-success">Edit</a>
                                    <a href="delete_banner_add.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
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
<div class="chit-chat-layer1">
	<div class="col-md-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Department
                            </div>
														<a href="add_department.php" class="btn btn-info">Add Department</a><br><br>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Image</th>
																			<th>Name</th>
                                      <th>Status</th>
																			<th>Action</th>
                                  </tr>
                                </thead>
                              <tbody>
																<?php
								                  require 'database/connect.php';

								                  $sql = "SELECT * FROM department";
								                  $query = mysqli_query($conn,$sql);

								                  if($query){
								                    if(mysqli_num_rows($query)>0){
								                      while($row=mysqli_fetch_assoc($query)){

								                 ?>
                                <tr>
                                  <td><?= $row['id']; ?></td>
                                  <td><img width="60px" height="40px"src="../image/department/<?= $row['image']; ?>"/></td>
                                  <td><?= $row['name']; ?></td>
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
                                    <a href="edit_banner_add.php?id=<?= $row['id'] ?>" class="btn btn-success">Edit</a>
                                    <a href="delete_banner_add.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
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

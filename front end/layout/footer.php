<?php
    require 'database/connect.php';

    if(isset($_POST['submit'])){

      $email    = mysqli_escape_string($conn,$_POST['email']);

      $sql   = "INSERT INTO newsletter (email) VALUES ('$email')";
      $query = mysqli_query($conn,$sql);

      if($query){
        header('location:index.php');
        http_response_code(200);
        echo "<script> alert('DONE')</script>";
      }
      else {
        http_response_code(200);
        echo "<script> alert('FAILER')</script>".mysqli_error($conn);
      }
    }
?>
<div class="footer">
  <div class="container">
    <h4>Subscribe to <span>Newsletter</span></h4>
    <form action="#" method="POST" enctype="multipart/form-data">
      <input type="email" name="email" placeholder="Enter Your Email..." required="">
      <input type="submit" name="submit" value="Send">
    </form>
    <div class="agile_footer_copy">
      <div class="w3agile_footer_grids">
        <div class="col-md-4 w3agile_footer_grid">
          <h3>About Us</h3>
          <p>Hello,<br>My name is Hasibul Hasan. You may call me Hasan. I am a Freelancer and a student too. I am a Web Developer & Graphic Designer.<span>I have doing Web Development job as a freelancer. I have created many websit during this moment.</span></p>
        </div>
        <div class="col-md-4 w3agile_footer_grid">
          <h3>Contact Info</h3>
          <ul>
            <li><i class="fa fa-map-marker" aria-hidden="true"></i>Dhaka, <span>Bangladesh.</span></li>
            <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="itshasanhero@gmail.com">itshasanhero@gmail.com</a></li>
            <li><i class="fa fa-phone" aria-hidden="true"></i>+8801303279573</li>
          </ul>
        </div>
        <div class="col-md-4 w3agile_footer_grid w3agile_footer_grid1">
          <h3>Navigation</h3>
          <ul>
            <li><span class="fa fa-long-arrow-right" aria-hidden="true"></span><a href="gallery.html">Department</a></li>
            <li><span class="fa fa-long-arrow-right" aria-hidden="true"></span><a href="appointment.html">Appointment</a></li>
            <li><span class="fa fa-long-arrow-right" aria-hidden="true"></span><a href="about.html">About</a></li>
            <li><span class="fa fa-long-arrow-right" aria-hidden="true"></span><a href="contact.html">Contact Us</a></li>
          </ul>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
    <div class="w3_agileits_copy_right_social">
      <div class="col-md-6 agileits_w3layouts_copy_right">
        <p>©<?= date('Y'); ?> Health Plus. All rights reserved | Design by <a href="#">Hasibul-Hasan</a></p>
      </div>
      <div class="col-md-6 w3_agile_copy_right">
        <ul class="agileits_social_list">
              <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
              <li><a href="#" class="w3_agile_rss"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
            </ul>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
</div>

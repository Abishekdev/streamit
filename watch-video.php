<!-- php -->
<?php
   include "includes/db.php";
   include 'includes/auth.php';
   loggedin();
?>
<!doctype html>
<html lang="en-US">
<head>
<?php include 'includes/head.php';
   $title="Watch Video";
?>
</head>
<body>
   <div id="loading">
      <div id="loading-center">
      </div>
   </div>

<!-- Video Start -->
   <section class="height-100-vh iq-main-slider">
      <video class="video d-block" width="100%" height="100%" controls>
         <source src="video/trailer.mp4" type="video/mp4">
      </video>
   </section>
<!-- Video End -->

<!-- Back_to_top Start's -->
<?php include 'includes/back_to_top.php'?>
      <!-- Back_to_top End's -->
      
<!-- Includes Start's -->
<?php include 'includes/include.php'?>
      <!-- Includes End's -->
</body>
</html>
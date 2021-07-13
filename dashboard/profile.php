<!doctype html>
<html lang="en">
<head>
<?php include 'includes/head.php';
include "includes/db.php" ?>
</head>
<body class="sidebar-main-active right-column-fixed">
   <!-- loader Start -->
   <div id="loading">
      <div id="loading-center">
      </div>
   </div>
   <!-- loader END -->
   <!-- Wrapper Start -->
   <div class="wrapper">
   <!-- sidebar start's -->
   <?php include 'includes/sidebar.php';?>
   <!-- sidebar end -->
   <!-- TOP Nav Bar -->
   
   <?php include 'includes/navbar.php'; ?>
   <!-- TOP Nav Bar END -->
   <!-- Page Content  -->
   <?php
   $cookie_email=$_COOKIE['admin_email']; 
   $select_user="SELECT * FROM users WHERE user_email = '".$cookie_email."'";
   $user_result=mysqli_query($db_connect,$select_user);
   $user_row=mysqli_fetch_assoc($user_result);
   $cookie_user_id=$user_row['user_id'];
   $user_name=$user_row['user_name'];
         $user_id=$user_row['user_id'];
         $user_bio=$user_row['user_bio'];
         $user_email=$user_row['user_email'];
         $user_image=$user_row['user_profile'];
         
   ?>
   <div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row profile-content">
            <div class="col-12 col-md-12 col-lg-12">
               <div class="iq-card">
                  <div class="iq-card-body profile-page">
                     <div class="profile-header">
                        <div class="cover-container text-center">
                           <img src="<?php echo"../$user_image";?>" style="width: 30%;" alt="profile-bg" class="rounded-circle img-fluid mx-auto mb-1">
                           <div class="profile-detail mt-3">
                              <h3><?php echo" $user_name"; ?></h3>
                              <p><?php echo "$user_bio"; ?></p>
                              <p><?php echo "$user_email"; ?></p>
                           </div>
                           <div class="iq-social d-inline-block align-items-center">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            </div>
            </div>
            </div>
<!-- Wrapper END -->
   <!-- Footer -->
   <?php include 'includes/footer.php'?>
   <!-- Footer END -->
   <!-- Optional JavaScript Start's -->
   <?php include 'includes/includes.php'?>
   <!-- Optional JavaScript END -->
</body>
</html>
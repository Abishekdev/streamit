<!-- php -->
<?php
include 'includes/time.php';
   include "includes/db.php";
   $title="Watch Later";
   // include 'includes/auth.php';
   // loggedin();
?>
<!doctype html>
<html lang="en-US">
<head>
<?php include 'includes/head.php' ?>
<style>
   body {
  overflow-x: hidden; /* Hide scrollbar */
}
</style>
</head>

<body>
   <!-- <div id="loading">
      <div id="loading-center">
      </div>
   </div> -->
<!-- Header Start's -->
<?php include 'includes/header.php';?>
<!--Header End's-->
<div " class="main-content">
   <div style="margin-top: 3%;" class="elementor-section elementor-top-section elementor-element elementor-element-916a5f9 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="916a5f9" data-element_type="section">
      
         <div class="row wl watchlist-grid">
                                          
                                            <?php
                                            $wl_user=$_COOKIE['email'];
      $select_all_wl="SELECT * FROM watch_later WHERE wl_user='".$wl_user."'";
      $wl_result=mysqli_query($db_connect,$select_all_wl);
      while($wl_row=mysqli_fetch_assoc($wl_result)){
      $user_post_id=$wl_row['wl_post_id'];
      if(isset($wl_row)){
      $select_all_post="SELECT * FROM post WHERE post_id=$user_post_id";
      $post_result=mysqli_query($db_connect,$select_all_post);
      while($post_row=mysqli_fetch_assoc($post_result)){
         $post_name=$post_row['post_name'];
         $post_author=$post_row['post_author'];
         $post_date=$post_row['post_date'];
         $post_description=$post_row['post_description'];
         $post_image=$post_row['post_image'];
         $post_id=$post_row['post_id'];
         $time=time_ago($post_date);

         echo "
         <div class='col-lg-3 col-md-4 col-sm-6 wl-child'>
            <style>
               @media (min-width: 1920px) {}
            </style>
               <li class='slide-item'>
               <a href='post-details.php?post=$post_id'>
                  <div class='block-images position-relative'>
                     <div class='img-box'>
                        <img src='$post_image' class='img-fluid' alt=''>
                     </div>
                     <div class='block-description'>
                        <h6>$post_name</h6>
                        <div class='movie-time d-flex align-items-center my-2'>
                           <span class='text-white'>$time</span>
                        </div>
                        <div class='hover-buttons'>
                           <span class='btn btn-hover'><i class='fa fa-play mr-1' aria-hidden='true'></i>
                           Play Now</span>
                        </div>
                     </div>
                  </div>
               </a>
            </li>
            </div>";
         }
      }
   }
                                          ?>
         </div>
      </div>
   </div>
           <!-- Footer Start's -->
      <?php include 'includes/footer.php'?>
      <!-- Footer End's -->

   <!-- MainContent End-->
<!-- Back_to_top Start's -->
<?php include 'includes/back_to_top.php'?>
      <!-- Back_to_top End's -->
      
<!-- Includes Start's -->
<?php include 'includes/include.php'?>
      <!-- Includes End's -->
</body>
</html>

<!-- php -->
<?php
include 'includes/time.php';
   include "includes/db.php";
   $title="Show Category";
   // include 'includes/auth.php';
   // loggedin();
?>
<!doctype html>
<html lang="en-US">
<head>
<?php include 'includes/head.php' ?>
</head>

<body>
   <!-- <div id="loading">
      <div id="loading-center">
      </div>
   </div> -->
<!-- Header Start's -->
<?php include 'includes/header.php';?>
<!--Header End's-->

   <!-- Slider Start -->
   <section class="iq-main-slider p-0">
      <div id="tvshows-slider">
      <?php
      
      if(isset($_GET['category'])){
         $post_category=$_GET['category'];
      }
      $select_all_post="SELECT * FROM post WHERE post_category = '".$post_category."'";
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
         
         <div>
            <a href='post-details.php?post=$post_id'>
               <div class='shows-img'>
                  <img src='$post_image' class='w-100' alt=''>
                  <div class='shows-content'>
                     <h4 class='text-white mb-1'>$post_name</h4>
                     <div class='movie-time d-flex align-items-center'>
                     
                     <div class='badge badge-secondary p-1 mr-2'>$post_author</div>
                        <span class='text-white'>$time</span>
                     </div>
                  </div>
               </div>
            </a>
         </div> ";

      }
      if(!isset($post_id)){
         $no_post="No Results Found";
         
      }
?>        
      </div>
   </section>
   <!-- Slider End -->
   <!-- MainContent -->
   <div class="main-content">
      <section id="iq-favorites">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12 overflow-hidden">
                  <div class="iq-main-header d-flex align-items-center justify-content-between">
                     <h4 class="main-title"><?php if(isset($no_post)){echo "$no_post";}else{echo "Popular Shows";}?></h4>
                  </div>
                  <div class="favorites-contens">
                     <ul class="favorites-slider list-inline  row p-0 mb-0">

                        <?php
      $select_all_post="SELECT * FROM post WHERE post_category = '".$post_category."'";
      $post_result=mysqli_query($db_connect,$select_all_post);
      while($post_row=mysqli_fetch_assoc($post_result)){
         $post_name=$post_row['post_name'];
         $post_author=$post_row['post_author'];
         $post_date=$post_row['post_date'];
         $post_description=$post_row['post_description'];
         $post_image=$post_row['post_image'];
         $post_id=$post_row['post_id'];
         $time=time_ago($post_date);

         echo "<li class='slide-item'>
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
      </li> ";
      }
?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section id="iq-suggestede">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12 overflow-hidden">
                  <div class="iq-main-header d-flex align-items-center justify-content-between">
                     <h4 class="main-title"><?php if(isset($no_post)){echo "$no_post";}else{echo "Shows We Recommend";}?></h4>
                  </div>
                  <div class="suggestede-contens">
                     <ul class="favorites-slider list-inline  row p-0 mb-0">
                     <?php
      $select_all_post="SELECT * FROM post WHERE post_category = '".$post_category."'";
      $post_result=mysqli_query($db_connect,$select_all_post);
      while($post_row=mysqli_fetch_assoc($post_result)){
         $post_name=$post_row['post_name'];
         $post_author=$post_row['post_author'];
         $post_date=$post_row['post_date'];
         $post_description=$post_row['post_description'];
         $post_image=$post_row['post_image'];
         $post_id=$post_row['post_id'];
         $time=time_ago($post_date);

         echo "<li class='slide-item'>
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
      </li> ";
      }
?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
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
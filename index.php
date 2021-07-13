<!-- php -->
<?php
ob_start();
   include "includes/db.php";
   $title="Home";
   include 'includes/time.php';
   include 'includes/auth.php';
   // loggedin();

?>

<!doctype html>
<html lang="en-US">
<head>
      <?php
      include 'includes/head.php';

       ?>
   </head>
   <body>
      <!-- loader Start -->
       <!-- <div id="loading">
      <div id="loading-center">
         </div>
      </div> -->
      <!-- loader END -->
<!-- Header Start's -->
<?php include 'includes/header.php';?>
<!--Header End's-->

      <!-- Slider Start -->
      <section id="home" class="iq-main-slider p-0">
         <div  id="home-slider" class="slider m-0 p-0">
<!--str-->

<?php
      $select_all_post="SELECT * FROM post";
      $post_result=mysqli_query($db_connect,$select_all_post);
      while($post_row=mysqli_fetch_assoc($post_result)){
         $post_id=$post_row['post_id'];
         $post_name=substr($post_row['post_name'],0,25);
         $post_author=$post_row['post_author'];
         $post_date=$post_row['post_date'];
         $post_description=substr($post_row['post_description'],0,100);
         $post_date=$post_row['post_date'];
         $post_image=$post_row['post_image'];
         $post_video=$post_row['post_video'];
         $time=time_ago($post_date);
         echo "
         <div style='background-image: url($post_image)!important;' class='slide slick-bg s-bg-1'>
            <div class='container-fluid position-relative h-100'>
               <div class='slider-inner h-100'>
                  <div class='row align-items-center  h-100'>
                     <div class='col-xl-6 col-lg-12 col-md-12'>
                        <a href='javascript:void(0);'>
                           <div class='channel-logo' data-animation-in='fadeInLeft' data-delay-in='0.5'>
                              <img src='images/logo.png' class='c-logo' alt='streamit'>
                           </div>
                        </a>
                        <h2 class='slider-text big-title title text-uppercase' data-animation-in='fadeInLeft'
                           data-delay-in='0.6'>$post_name</h2>
                        <div class='d-flex align-items-center' data-animation-in='fadeInUp' data-delay-in='1'>
                           <span class='badge badge-secondary p-2'>$post_author</span>
                           <span class='ml-3'>$time</span>
                        </div>
                        <p data-animation-in='fadeInUp' data-delay-in='1.2'>$post_description
                        </p>
                        <div class='d-flex align-items-center r-mb-23' data-animation-in='fadeInUp' data-delay-in='1.2'>
                           <a href='post-details.php?post=$post_id' class='btn btn-hover'><i class='fa fa-play mr-2'
                              aria-hidden='true'></i>Play Now</a>
                           <a href='post-details.php?post=$post_id' class='btn btn-link'>More details</a>
                        </div>
                     </div>
                  </div>
                  <div class='trailor-video'>
                     <a href='$post_video' class='video-open playbtn'>
                        <svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'
                           x='0px' y='0px' width='80px' height='80px' viewBox='0 0 213.7 213.7'
                           enable-background='new 0 0 213.7 213.7' xml:space='preserve'>
                           <polygon class='triangle' fill='none' stroke-width='7' stroke-linecap='round'
                              stroke-linejoin='round' stroke-miterlimit='10'
                              points='73.5,62.5 148.5,105.8 73.5,149.1 ' />
                           <circle class='circle' fill='none' stroke-width='7' stroke-linecap='round'
                              stroke-linejoin='round' stroke-miterlimit='10' cx='106.8' cy='106.8' r='103.3'/>
                        </svg>
                        <span class='w-trailor'>Watch Movie</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>";
      }
      ?>
                     <!--str-->
                  </div>
               </div>
            </div>
         </div>
         <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" width="44px" height="44px" id="circle"
               fill="none" stroke="currentColor">
               <circle r="20" cy="22" cx="22" id="test"></circle>
            </symbol>
         </svg>
      </section>
      <!-- Slider End -->
      <!-- MainContent -->
      <div class="main-content">
         <section id="iq-favorites">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 overflow-hidden">
                     <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h4 class="main-title">Your Favorites</h4>
                        <!-- <a href="movie-category.php" class="text-primary">View all</a> -->
                     </div>
                     <div class="favorites-contens">
                        <ul class="favorites-slider list-inline  row p-0 mb-0">
<?php
    $select_all_post="SELECT * FROM post";
    $post_result=mysqli_query($db_connect,$select_all_post);
    while($post_row=mysqli_fetch_assoc($post_result)){
       $post_name=$post_row['post_name'];
       $post_author=$post_row['post_author'];
       $post_date=$post_row['post_date'];
       $post_description=$post_row['post_description'];
        $post_image=$post_row['post_image'];
        $time=time_ago($post_date);
                                    echo "
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
               Play Now
               </span>
              
            </div>
         </div> 
         </a>
      </div>
   
</li>";
                                 }
                                 ?>
                        </ul>
                     </div>

                  </div>
               </div>
            </div>
         </section>
         <section id="iq-topten">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 overflow-hidden">
                     <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h4 class="main-title topten-title-sm">Top 10 in India</h4>
                     </div>
                     <div class="topten-contens">
                        <h4 class="main-title topten-title">Top 10 in India</h4>
                        <ul id="top-ten-slider" class="list-inline p-0 m-0  d-flex align-items-center">
                        <?php
      $select_all_post="SELECT * FROM post";
      $post_result=mysqli_query($db_connect,$select_all_post);
      while($post_row=mysqli_fetch_assoc($post_result)){
         $post_name=$post_row['post_name'];
         $post_author=$post_row['post_author'];
         $post_date=$post_row['post_date'];
         $post_description=$post_row['post_description'];
         $post_image=$post_row['post_image'];
         $time=time_ago($post_date);
         echo "<li>
         <a href='post-details.php?post=$post_id'>
         <img src='$post_image' class='img-fluid w-100' alt=''>
         </a>
      </li>";
      }
?>
                        </ul>
                        <div class="vertical_s">
                           <ul id="top-ten-slider-nav" class="list-inline p-0 m-0  d-flex align-items-center">
                           <?php
      $select_all_post="SELECT * FROM post";
      $post_result=mysqli_query($db_connect,$select_all_post);
      while($post_row=mysqli_fetch_assoc($post_result)){
         $post_name=$post_row['post_name'];
         $post_author=$post_row['post_author'];
         $post_date=$post_row['post_date'];
         $post_description=$post_row['post_description'];
         $post_image=$post_row['post_image'];
         $time=time_ago($post_date);
         echo "<li>
         <div class='block-images position-relative'>
            <a href='post-detail.php'>
            <img src='$post_image' class='img-fluid w-100'>
            </a>
            <div class='block-description'>
               <h5>$post_name</h5>
               <div class='movie-time d-flex align-items-center my-2'>
                  <div class='badge badge-secondary p-1 mr-2'>$post_author</div>
                  <span class='text-white'>$time</span>
               </div>
               <div class='hover-buttons'>
                  <a href='post-details.php?post=$post_id' class='btn btn-hover' tabindex='0'>
                  <i class='fa fa-play mr-1' aria-hidden='true'></i> Play Now
                  </a>
               </div>
            </div>
         </div>
      </li>";
      }
?>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <?php
                                 $select_all_category="SELECT * FROM category";
                                 $cat_result=mysqli_query($db_connect,$select_all_category);
                                 while($cat_row=mysqli_fetch_assoc($cat_result))
                                    $categroy_name=$cat_row['category_name'];


                                   ?>


<section id='iq-<?php echo "$categroy_name"?>' class='s-margin'>
            <div class='container-fluid'>
               <div class='row'>
                  <div class='col-sm-12 overflow-hidden'>
                     <div class='iq-main-header d-flex align-items-center justify-content-between'>
                        <h4 class='main-title'><?php echo "$categroy_name"?></h4>
                        <!-- <a href='show-category.php' class='text-primary'>View all</a> -->
                     </div>
                           <div class='<?php echo "$categroy_name"?>-contens'>
                           <ul class='list-inline favorites-slider row p-0 mb-0'>

                        <?php
                        $select_all_post="SELECT * FROM post WHERE post_category = '".$category_name."';";
                        $post_result=mysqli_query($db_connect,$select_all_post);
                        while($post_row=mysqli_fetch_assoc($post_result)){
                           $post_name=$post_row['post_name'];
                           $post_author=$post_row['post_author'];
                           $post_date=$post_row['post_date'];
                           $post_description=$post_row['post_description'];
                           $post_image=$post_row['post_image'];
                           $post_id=$post_row['post_id'];
                           $time=time_ago($post_date);

                        echo"
                        <li class='slide-item'>
      <a href='post-details.php?post=$post_id'>
      <div class='block-images position-relative'>
      <div class='img-box'>
         <img src='$post_image' class='img-fluid' alt=''>
      </div>
      <div class='block-description'>
         <h6>$post_name</h6>
         <div class='movie-time d-flex align-items-center my-2'>
            <div class='badge badge-secondary p-1 mr-2'></div>
            <span class='text-white'>$time</span>
         </div>
         <div class='hover-buttons'>
            <span class='btn btn-hover'><i class='fa fa-play mr-1' aria-hidden='true'></i>
            Play Now
            </span>
         </div>
      </div>
      </div>
      </a>
      </li>
      ";
   } ?>

      </ul>
   </div>

                  </div>
               </div>
            </div>
         </section>

         <section id="iq-tvthrillers" class="s-margin">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 overflow-hidden">
                     <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h4 class="main-title">TV Thrillers</h4>
                        <!-- <a href="post-details.php?post=" class="text-primary">View all</a> -->
                     </div>
                     <div class="tvthrillers-contens">
                        <ul class="favorites-slider list-inline row p-0 mb-0">
                        <?php
                                 $select_all_post="SELECT * FROM post";
                                 $post_result=mysqli_query($db_connect,$select_all_post);
                                 while($post_row=mysqli_fetch_assoc($post_result)){
                                    $post_name=$post_row['post_name'];
                                    $post_author=$post_row['post_author'];
                                    $post_date=$post_row['post_date'];
                                    $post_description=substr($post_row['post_description'],0,10);
                                    $post_image=$post_row['post_image'];
                                    $time=time_ago($post_date);

                                    echo "
                                    <li class='slide-item'>
   <a href='post-details.php?post=$post_id'>
      <div class='block-images position-relative'>
         <div class='img-box'>
            <img src='$post_image' class='img-fluid' alt=''>
         </div>
         <div class='block-description'>
            <h6>$post_name</h6>
            <div class='movie-time d-flex align-items-center my-2'>
               <div class='badge badge-secondary p-1 mr-2'></div>
               <span class='text-white'>$time</span>
            </div>
            <div class='hover-buttons'>
               <span class='btn btn-hover'><i class='fa fa-play mr-1' aria-hidden='true'></i>
               Play Now
               </span>
            </div>
         </div>
      </div>
   </a>
</li>";
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

      <!-- Back_to_top Start's -->
      <?php include 'includes/back_to_top.php'?>
      <!-- Back_to_top End's -->

      <!-- MainContent End-->
      <!-- Includes Start's -->
      <?php include 'includes/include.php'?>
      <!-- Includes End's -->
   </body>
</html>
<?php
   if(isset($_POST['watch_later'])){
      $wl=$_POST['watch_later'];
      $wl_user=$_COOKIE['email'];
      $watch_later_query="INSERT INTO `watch_later` (`wl_id`,`wl_user`,`wl_post`) VALUES (NULL,$wl_user,'post_id')";
      $wl_result=mysqli_query($db_connect,$watch_later_query);
      header("Refresh:0"); 
   }
?>
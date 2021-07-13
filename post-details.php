<!-- php -->
<?php
ob_start();
   include "includes/db.php";
   $title="Post Details";
   
   include 'includes/time.php';
   include 'includes/get-url.php';
   include 'includes/auth.php';
   loggedin();
   $cookie_email=$_COOKIE['email']; 
            $select_user="SELECT * FROM users WHERE user_email = '".$cookie_email."'";
            $user_result=mysqli_query($db_connect,$select_user);
            $user_row=mysqli_fetch_assoc($user_result);
            $cookie_user_id=$user_row['user_id'];
?>
<!doctype html>
<html lang="en-US">
<head>
   <style>
   .hr-tag{
      border: 0;
    height: 1px;
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
   }
      .form-control:focus {
    background: transparent!important;
    box-shadow: none!important;
    border: 1px solid var(--iq-primary)!important;
}
   </style>
<?php include 'includes/head.php' ?>
      <link rel="stylesheet" href="css/responsive.css" />
</head>

<body>
   <div id="loading">
      <div id="loading-center">
      </div>
   </div>
<!-- Header Start's -->
<?php include 'includes/header.php';?>
<!--Header End's-->
<?php
   $post_id=$_GET['post'];
      $select_all_post="SELECT * FROM post WHERE post_id=$post_id";
      $post_result=mysqli_query($db_connect,$select_all_post);
      while($post_row=mysqli_fetch_assoc($post_result)){
         $post_id=$post_row['post_id'];
         $post_name=$post_row['post_name'];
         $post_author=$post_row['post_author'];
         $post_description=$post_row['post_description'];
         $post_date=$post_row['post_date'];
         $post_image=$post_row['post_image'];
         $post_duration=$post_row['post_duration'];
         $post_video=$post_row['post_video'];
         $post_category=$post_row['post_category'];
         $like_count=$post_row['like_count'];
      }
      
      
         ?>
   <!-- Banner Start -->
   <div class="video-container iq-main-slider">
      <video class="video d-block" controls loop>
         <source src="<?php echo"$post_video"?>" type="video/mp4">
      </video>
   </div>
   <!-- Banner End -->
   <!-- MainContent -->
   <div class="main-content movi">
      <section class="movie-detail container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <div class="trending-info g-border">
                  <h1 class="trending-text big-title text-uppercase mt-0"><?php echo"$post_name"?></h1>
                  <ul class="p-0 list-inline d-flex align-items-center movie-content">
                     <li class="text-white"><?php echo $post_category?></li>
                  </ul>
                  <div class="d-flex align-items-center text-white text-detail">
                     <span class="ml-3"><?php echo"$post_duration"?></span>
                     <span class="trending-year"><?php echo"$post_author"?></span>
                  </div>
                  <p class="trending-dec w-100 mb-0"><?php echo"$post_description"?></p>
                  <ul class="list-inline p-0 mt-4 share-icons music-play-lists">
                    
                     <a href="post-details.php?post=<?php echo"$post_id"?>&like=<?php echo"$post_id"?>"><li><span><i class="ri-heart-fill"></i><span class="count-box"><?php echo"$like_count"?></span></span></li></a>
                     <a href="post-details.php?post=<?php echo"$post_id"?>&wl=<?php echo"$post_id"?>"><li><span><i class="ri-add-line"></i></span></li></a>
                     <li class="share">
                        <span><i class="ri-share-fill"></i></span>
                        <div class="share-box">
                           <div class="d-flex align-items-center">
                              <a target="_blank" href="https://api.whatsapp.com/send?text=<?php echo "$url" ?>" data-action="share/whatsapp/share" class="share-ico"><i class="fab fa-whatsapp"></i></a>
                              <a target="_blank" href="https://twitter.com/share?url=<?php echo "$url" ?>" class="share-ico"><i class="ri-twitter-fill"></i></a>
                              <a href="https://www.facebook.com/sharer.php?u=<?php echo "$url"?>" target="_blank" class="share-ico"><i class="fab fa-instagram"></i></a>
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </section>
      <section id="iq-favorites" class="s-margin">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12 overflow-hidden">
                  <div class="iq-main-header d-flex align-items-center justify-content-between">
                     <h4 class="main-title">More Like This</h4>
                  </div>
                  <div class="favorites-contens">
                     <ul class="list-inline favorites-slider row p-0 mb-0">
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
         $post_video=$post_row['post_video'];
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
      <section id="iq-upcoming-movie">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12 overflow-hidden">
                  <div class="iq-main-header d-flex align-items-center justify-content-between">
                     <h4 class="main-title">Latest</h4>
                  </div>
                  <div class="upcoming-contens">
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
   <!-- comment section -->
   <div style="padding-bottom: 1%;" id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-body">
                           <!-- code -->
                     <div class="iq-card">
                        <div style="width:50%;float:left" class="iq-card-body">
                        <?php 
                         $post_id=$_GET['post'];
                        $comment_count="SELECT COUNT(*) AS total FROM comments WHERE comment_post_id = $post_id";
                        $comment_count_result=mysqli_query($db_connect,$comment_count);
                        while($comment_count_row=mysqli_fetch_assoc($comment_count_result)){
                        $count=$comment_count_row['total'];
                        
                     }

                        ?>
                           <h5><?php echo "$count"?> Comments</h5>
                           <form action="post-details.php?post=<?php echo "$post_id"?>" method="post" class="mt-4">
                           <div class="form-group">
                           <label>Leave Your Comments</label>
                           <textarea style="border-radius: 10px;" name="comment" type="text" class="form-control" id="exampleInputl2" autocomplete="off" required="" rows="4"></textarea>
                           </div>
                              <button type="submit" name="submit" class="btn btn-hover">Comment</button>
                           </form>
                        </div>
                     </div>
                     <div style="width:45%;float:right;margin-top:8%;" class="iq-card-body">
                     <!-- comment -->
                     <?php
                      $select_all_comments="SELECT * FROM comments WHERE comment_post_id = '".$post_id."'";
      $comment_result=mysqli_query($db_connect,$select_all_comments);
      while($comment_row=mysqli_fetch_assoc($comment_result)){
      $comment=$comment_row['comment'];
      $comment_id=$comment_row['comment_id'];
      $comment_date=$comment_row['comment_time'];
      $commented_by=$comment_row['commented_by'];
      $com_time=time_ago($comment_date);
      $select_user="SELECT * FROM users WHERE user_id = $commented_by";
                     $user_result=mysqli_query($db_connect,$select_user);
                     $user_row=mysqli_fetch_assoc($user_result);
                     $username=$user_row['user_name'];
                     $user_profile=$user_row['user_profile'];
                     $user_email=$user_row['user_email'];
                     

         ?>

<div class='comment'>
      <img style='float:left;' class='img-fluid avatar-50 rounded-circle' src='<?php echo $user_profile ?>'>
      <div style='margin-left:15%;'>
      <h5 style='float:left;'><?php echo $username?></h5> 
      <p style='margin-left: 26%;'><?php echo $com_time?></p>
      <p ><?php echo $comment?></p>
      <?php
      if($user_email===$_COOKIE['email']){
         echo"
         <a style='background: #141414 !important;' class='iq-bg-primary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete' href='post-details.php?post=$post_id&delete=$comment_id'>
               <i class='far fa-trash-alt'></i></a>
         ";
            if(isset($_GET['delete'])){
                     $cam_delete_id=$_GET['delete'];
                     $cam_delete_query="DELETE FROM `comments` WHERE `comments`.`comment_id` = $cam_delete_id;";
                     mysqli_query($db_connect,$cam_delete_query);
                     header("location: post-details.php?post=$post_id");

                  }
      }
      
      ?>
     
      </div>
      <hr class='hr-tag'>
      <br>
      </div>
         <?php } ?>
         <!--  -->
         
                           </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
                    
                           <!-- code -->
                        
      <?php
      $user_email=$_COOKIE['email'];
      $post_id=$_GET['post'];
      $select_all_post="SELECT * FROM post WHERE post_id= $post_id";
      $post_result=mysqli_query($db_connect,$select_all_post);
      $post_row=mysqli_fetch_assoc($post_result);
         $i=$post_row['like_count'];
      
      
      if(isset($_GET['post'])){
         if(isset($_GET['like'])){
                  
            $create_like_query="INSERT INTO `like` (`l_id`,`l_by`,`l_post_id`,`l_status`) VALUES (NULL,'$user_email',$post_id,'liked')";
            $create_like_result=mysqli_query($db_connect,$create_like_query);
            $like_count_query="UPDATE `post` SET `like_count` =$i+1 WHERE `post`.`post_id` =$post_id ;";
            $like_count_result=mysqli_query($db_connect,$like_count_query);
            header("location:post-details.php?post=$post_id");
         }
         if(isset($_GET['wl'])){
                  
            $create_wl_query="INSERT INTO `watch_later` (`wl_id`,`wl_user`,`wl_post_id`) VALUES (NULL,'$user_email',$post_id)";
            $create_wl_result=mysqli_query($db_connect,$create_wl_query);
            header("location:post-details.php?post=$post_id");
         }
      }
            if(isset($_POST['submit'])){
            $comment_contant=$_POST['comment'];            
            $create_comment_query="INSERT INTO `comments` (`comment_id`,`comment`,`comment_time`,`comment_post_id`,`commented_by`) VALUES (NULL,' $comment_contant',CURRENT_TIMESTAMP(),'$post_id','$cookie_user_id')";
            $create_comment_result=mysqli_query($db_connect,$create_comment_query);
            header("Refresh:0");   
         }
            ?>
<!-- Wrapper END 
   <!-- comment section -->
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
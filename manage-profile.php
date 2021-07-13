<!-- php -->
<?php
   include "includes/db.php";
   $title="Manage Profile";
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
<?php include 'includes/head.php' ?>
</head>

<body>
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
<!-- Header Start's -->
<?php include 'includes/header.php';?>
<!--Header End's-->

    <!-- MainContent -->
    <section class="m-profile setting-wrapper">        
        <div class="container">
            <h4 class="main-title mb-4">Manage Profile</h4>
            <div class="row">
            <?php 
      $select_all_users="SELECT * FROM users WHERE user_id=$cookie_user_id";
      $user_result=mysqli_query($db_connect,$select_all_users);
      while($user_row=mysqli_fetch_assoc($user_result)){
         $user_name=$user_row['user_name'];
         $user_id=$user_row['user_id'];
         $user_bio=$user_row['user_bio'];
         $join_date=$user_row['join_date'];
         $user_email=$user_row['user_email'];
         $user_profile=$user_row['user_profile'];
          $user_language=$user_row['user_language'];
         $user_role=$user_row['user_role'];
         $user_gender=$user_row['user_gender'];
         $user_password=$user_row['user_password'];
          }
          $j=strlen("$user_password");
          if($user_profile==''){
            $profile="images/user/user.jpg";
            
        }else{
            $profile=$user_profile;
        }
    ?>
                <div class="col-lg-4 mb-3">
                    <div class="sign-user_card text-center">
                        <img style="width: 60%;" src="<?php echo $profile ?>" class="rounded-circle img-fluid d-block mx-auto mb-3" alt="user">
                        <h4 class="mb-3"><?php echo $user_name?></h4>
                        <p><?php echo $user_bio?></p>
                        <a href="edit-profile.php" class="edit-icon text-primary">Edit</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="sign-user_card"
                        <h5 class="mb-3 pb-3 a-border">Personal Details</h5>
                        <div class="row align-items-center justify-content-between mb-3">
                            <div class="col-md-8">
                                <span class="text-light font-size-13">Email</span>
                                <p class="mb-0"><a href="mailto:<?php echo $user_email?>" class="__cf_email__" data-cfemail="c5a0bda4a8b5a9a085a2a8a4aca9eba6aaa8"><?php echo $user_email?></a></p>
                            </div> 
                        </div>
                        <div class="row align-items-center justify-content-between mb-3">
                            <div class="col-md-8">
                                <span class="text-light font-size-13">Password</span>
                                <p class="mb-0"><?php for($i=1;$i<=$j;$i++){
                                echo'*';
                                }?></p>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-between">
                            <div class="col-md-8">
                                <span class="text-light font-size-13">Language</span>
                                <p class="mb-0"><?php echo $user_language?></p>
                            </div>
                        <br>
                        </div>
                        <br>
                        <div class="row align-items-center justify-content-between">
                            <div class="col-md-8">
                                <span class="text-light font-size-13">Gender</span>
                                <p class="mb-0"><?php echo $user_gender?></p>
                            </div>
                        </div>
                        <br>
                        <div class="text-primary">Joined Date <?php echo"$join_date" ?> </div>
                        </div>
                        
                        <br>
                        <!-- <div class="row">
                            <div class="col-12 setting">
                                <a href="#" class="text-body d-block mb-1">Recent device streaming activity</a>
                                <a href="#" class="text-body d-block mb-1">Sign out of all devices </a>
                                <a href="#" class="text-body d-block">Download your person information</a>
                            </div>                            
                        </div> -->
                    </div>
                </div>
            </div>
        
    </section>
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
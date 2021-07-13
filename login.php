<!-- php -->
<?php
ob_start();
   include "includes/db.php";
   include 'includes/auth.php';
   $title="Login";
   
   if(isset($_COOKIE['email']) && isset($_COOKIE['token'])){
   $cookie_email=$_COOKIE['email'];
   $select_user="SELECT * FROM users WHERE user_email = '".$cookie_email."'";
   $user_result=mysqli_query($db_connect,$select_user);
   $user_row=mysqli_fetch_assoc($user_result);
   $db_user_email=$user_row['user_email'];
   $db_user_password=$user_row['user_password'];
   $db_user_password=$db_user_password;
   if($db_user_email===$_COOKIE['email'] and $db_user_password===$_COOKIE['token']){
   
      header("location:index.php");
   }
}
?>
<!doctype html>
<html lang="en-US">
<head>
<?php include 'includes/head.php' ?>
</head>
<body>

<!-- loader Start -->
<div id="loading">
   <div id="loading-center">
   </div>
</div>
<!-- loader END -->
<!-- MainContent -->
<section class="sign-in-page">
   <div class="container">
      <div class="row justify-content-center align-items-center height-self-center">
         <div class="col-lg-5 col-md-12 align-self-center">
            <div class="sign-user_card ">                    
               <div class="sign-in-page-data">
                  <div class="sign-in-from w-100 m-auto">
                     <h3 class="mb-3 text-center">Login</h3>
                     <form class="mt-4" method="POST" action="login.php">
                        <div class="form-group">                                 
                           <input name="user_email" type="email" class="form-control mb-0" id="exampleInputEmail1" placeholder="Enter email" autocomplete="off" required>
                           <?php
                           if(isset($_GET['error'])){
               if($_GET['error']=="1"){
                  echo "
                  <div class='text-primary'> Email is Incorrect</div>";
               }
            }
               ?>
                        </div>
                        <div class="form-group">                                 
                           <input name="user_password" type="password" class="form-control mb-0" id="exampleInputPassword2" placeholder="Password" required>
                           <?php
                           if(isset($_GET['error'])){
               if($_GET['error']=="2"){
                  echo "
                  <div class='text-primary'>Password is Incorrect</div>";
               }
            }
               ?>
                        </div>
                        <?php
                        if(isset($_GET['error'])){
               if($_GET['error']=="3"){
                  echo "
                  <div class='text-primary'>Email And Password is Incorrect</div>";
               }
            }
               ?>
                           <div class="sign-info">
                              <button name="submit" type="submit" class="btn btn-hover">Sign in</button>
                              <div class="custom-control custom-checkbox d-inline-block">
                                 <input type="checkbox"name="remember" value="1" class="custom-control-input" id="customCheck">
                                 <label class="custom-control-label"  for="customCheck">Remember Me</label>
                              </div>                                
                           </div>                                    
                     </form>
                  </div>
               </div>
               <div class="mt-3">
                  <div class="d-flex justify-content-center links">
                     Don't have an account? <a  href="sign-up.php" class="text-primary ml-2">Sign Up</a>
                  </div>
                  <div class="d-flex justify-content-center links">
                     <a href="reset-password.php" class="f-link">Forgot your password?</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- MainContent End-->
<!-- Back_to_top Start's -->
<?php include 'includes/back_to_top.php'?>
      <!-- Back_to_top End's -->
      
<!-- Includes Start's -->
<?php include 'includes/include.php';
?>
      <!-- Includes End's -->
</body>
</html>
<?php
$remember=$_POST['remember'];
login($email,$user_email,$password,$user_password,$remember,$token);

?>
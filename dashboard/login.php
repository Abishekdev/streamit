<?php 
ob_start();
   include "includes/db.php";
   include 'includes/auth.php';
   if(isset($_COOKIE['admin_email']) && isset($_COOKIE['admin_token'])){
   $admin_email=$_COOKIE['admin_email'];
   $select_user="SELECT * FROM users WHERE user_email = '".$admin_email."'";
   $user_result=mysqli_query($db_connect,$select_user);
   $user_row=mysqli_fetch_assoc($user_result);
   $db_user_email=$user_row['user_email'];
   $db_user_password=$user_row['user_password'];
   $user_role=$user_row['user_role'];
   if($db_user_email==$_COOKIE['admin_email'] and $db_user_password==$_COOKIE['admin_token'] and $user_role=='admin'){
   
      header("location:index.php");
   }
}
?><!doctype html>
<html lang="en">
<head>
<?php include 'includes/head.php';?>

   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
        <!-- Sign in Start -->
        <section class="sign-in-page">
          <div class="container">
            <div class="row justify-content-center align-items-center height-self-center">
               <div class="col-lg-5 col-md-12 align-self-center">
                  <div class="sign-user_card ">                    
                     <div class="sign-in-page-data">
                        <div class="sign-in-from w-100 m-auto">
                           <h3 class="mb-3 text-center">Sign in</h3>
                           <form class="mt-4" method="POST" action="login.php">
                              <div class="form-group">                                 
                                 <input type="email" name="user_email" class="form-control mb-0" id="exampleInputEmail2" placeholder="Enter email" autocomplete="off" required>
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
                                 <input type="password" name="user_password" class="form-control mb-0" id="exampleInputPassword2" placeholder="Password" required>
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
                                    <button name='submit' type="submit" class="btn btn-primary">Sign in</button>
                                    <div class="custom-control custom-checkbox d-inline-block">
                                       <input type="checkbox" name="remember" value="1" class="custom-control-input" id="customCheck">
                                       <label class="custom-control-label" for="customCheck">Remember Me</label>
                                    </div>                                
                                 </div>                                    
                           </form>
                        </div>
                     </div>
                        <div class="d-flex justify-content-center links">
                           <a href="pages-recoverpw.php" class="f-link">Forgot your password?</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Sign in END -->
            <!-- color-customizer -->
         </div>
      </section>
        <!-- Sign in END -->
   <!-- Optional JavaScript Start's -->
   <?php include 'includes/includes.php'?>
   <!-- Optional JavaScript END -->
   </body>
</html>
<?php
$remember=$_POST['remember'];
login($email,$user_email,$password,$user_password,$remember,$token);

?>

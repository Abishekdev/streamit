<!-- php -->
<?php
   include "includes/db.php";
   $title="Reset Password";
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

<!-- MainContent -->
<section class="sign-in-page">
   <div class="container">
      <div class="row justify-content-center align-items-center height-self-center">
         <div class="col-lg-5 col-md-12 align-self-center">
            <div class="sign-user_card ">                    
               <div class="sign-in-page-data">
                  <div class="sign-in-from w-100 m-auto">
                     <h3 class="mb-3 text-center">Reset Password</h3>
                     <p class="text-body">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                     <form class="mt-4" action="https://iqonic.design/themes/streamitnew/frontend/html/index.php">
                        <div class="form-group">                                 
                           <input type="email" class="form-control mb-0" id="exampleInputEmail2" placeholder="Enter email" autocomplete="off" required>
                        </div>                           
                        <div class="sign-info">
                           <button type="submit" class="btn btn-hover">Reset</button>                                                            
                        </div>                                       
                     </form>
                  </div>
               </div>                    
            </div>
         </div>
      </div>
      <!-- Sign in END -->
      <!-- color-customizer -->
   </div>
</section>
<!-- MainContent End-->
<!-- Back_to_top Start's -->
<?php include 'includes/back_to_top.php'?>
      <!-- Back_to_top End's -->
      
<!-- Includes Start's -->
<?php include 'includes/include.php'?>
      <!-- Includes End's -->
      
</body>
</html>
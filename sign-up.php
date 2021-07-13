<!-- php -->
<?php

   include "includes/db.php";
   $title="Sign Up";
   ob_start();
   include 'includes/auth.php';
   if(isset($_COOKIE['email']) and isset($_COOKIE['token'])){
              
      header("location:index.php");
      }
?>
<!doctype html>
<html lang="en-US">
<head>
<?php
 include 'includes/head.php' ?>
 <style>
    .form_gallery:focus{
    box-shadow: none;
    border: 1px solid red;
    }
    
    

    </style>
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
                     <h3 class="mb-3 text-center">Sign Up</h3>
                     <form class="mt-4" enctype="multipart/form-data" method="POST" action="sign-up.php">
                        <div class="form-group">                                 
                           <input name="user_name" type="text" class="form-control mb-0" id="exampleInputEmail2" placeholder="Enter Full Name" autocomplete="off" required>
                        </div>
                        <div class="form-group">                                 
                           <input name="user_bio" type="text" class="form-control mb-0" id="exampleInputEmail2" placeholder="Enter Your Bio" autocomplete="off" required>
                        </div><div class="form-group">
                        <label  for="file">Upload profile</label>
                        <input name="user_profile" type="file" id="file" accept=".png, .jpg, .jpeg, .gif"> 
                        </div>
                        <div class="form-group">                                 
                           <input name="user_email" type="email" class="form-control mb-0" id="exampleInputEmail3" placeholder="Enter email" autocomplete="off" required>
                        </div>
                        <div class="form-group">                                 
                           <input name="user_password" type="password" class="form-control mb-0" id="exampleInputPassword2" placeholder="Password" required>
                        </div>  
                        <div class="form-group d-flex flex-md-row flex-column">
                                            <div class="iq-custom-select col-md-4 manage-gen">
                                                <select name="user_gender" class="form-control pro-dropdown">
                                                <option value="Female">Female</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Transgender">Transgender</option>
                                                </select>
                                            </div>
                                            <div class="iq-custom-select col-md-4 manage-gen">
                                                <select name="user_language" class="form-control pro-dropdown">
                                                    <option value="Tamil">Tamil</option>
                                                    <option value="English">English</option>
                                                    <option value="Hindi">Hindi</option>
                                                    <option value="Gujarati">Gujarati</option>
                                                    <option value="Bengali">Bengali</option>
                                                    <option value="Marathi">Marathi</option>
                                                    <option value="Kannada">Kannada</option>
                                                </select>
                                            </div>
                                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                           <input type="checkbox" class="custom-control-input" id="customCheck">
                           <label class="custom-control-label" for="customCheck">I accept <a href="#" class="text-primary"> Terms and Conditions</a></label>
                        </div>                      
                           
                        <button name="submit" type="submit" class="btn btn-hover">Sign Up</button>
                                                            
                     </form>
                  </div>
               </div>    
               <div class="mt-3">
                  <div class="d-flex justify-content-center links">
                     Already have an account? <a href="login.php" class="text-primary ml-2">Sign In</a>
                  </div>                        
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- MainContent End-->
<!-- Includes Start's -->
<?php include 'includes/include.php'?>
      <!-- Includes End's -->
</body>
</html>
<?php

signup($user_name,$user_bio,$user_email,$user_password,$user_gender,$user_language);
      ?>
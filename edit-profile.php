<!-- php -->
<?php
ob_start();
   include "includes/db.php";
   $title="Edit Profile";
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

@media only screen and (min-width: 600px) {
    #log{
    margin-bottom: 10%;
}
}
@media only screen and (max-width: 600px) {
    #log{
    margin-bottom: 100%;
  }
}
@media only screen and (max-width: 768px) {
    #log{
    margin-bottom: 40%;
  }
}
@media only screen and (max-width: 320px) {
    #log{
    margin-bottom: 150%;
  }
}
</style>
<?php include 'includes/head.php' ?>
</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
<!-- Header Start's -->
<?php include 'includes/header.php';?>
<!--Header End's-->

    <!-- MainContent -->
    <section id="log" class="m-profile manage-p">
        <div  class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-lg-10">
                    <div class="sign-user_card">
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
        if($user_profile==''){
            $profile="images/user/user.jpg";
            
        }else{
            $profile=$user_profile;
        }
        ?>
                            
                            <div class="col-lg-2">
                            <h4 class="mb-4">Edit Profile</h4>
                                <div class="upload_profile d-inline-block">
                                <img  src="<?php echo $profile; ?>" name="user_profile" class="profile-pic rounded-circle img-fluid" alt="user">
                                </div>
                            </div>
                            
                            <div class="col-lg-10 device-margin">
                                <div class="profile-from">
                                    
                                    <form class="mt-6" enctype="multipart/form-data" action="edit-profile.php" method="POST">
                                    <div class="col-12 form_gallery form-group">
                                       <input data-name="#gallery2" value="<?php echo $user_profile;?>" name="user_profile" id="form_gallery-upload" class="upload-file" type="file" accept=".png, .jpg, .jpeg, .gif">
                                    </div>
                                    <div class="form-group d-flex flex-md-row flex-column">
                                        <div  class="col-md-6 form-group">
                                            <label>Name</label>
                                            <input name="user_name"  type="text" class="form-control" id="exampleInputl2"
                                                placeholder="Enter Your Name" autocomplete="off" value="<?php echo $user_name; ?>" required>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                <label>Bio</label>
                                            <input name="user_bio" type="text"  class="form-control" id="exampleInputl2"
                                                placeholder="Bio" autocomplete="off" value="<?php echo $user_bio; ?>" required>
                                                </div>
                                        </div>
                                       
                                        <div class="form-group col-md-12">
                                            <label>Email</label>
                                            <input name="user_email" type="text" class="form-control mb-0" id="exampleInputl2"
                                                placeholder="email" autocomplete="off" value="<?php echo $user_email; ?>" required>
                                        </div>
                                        <div class="form-group d-flex flex-md-row flex-column">
                                            <div class="iq-custom-select col-md-4 manage-gen">
                                                <select name="user_gender" class="form-control pro-dropdown">
                                                <option selected value="<?php echo $user_gender; ?>"><?php echo $user_gender; ?></option>    
                                                <option value="Female">Female</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Transgender">Transgender</option>
                                                </select>
                                            </div>
                                            <div class="iq-custom-select col-md-4 manage-gen">
                                                <select name="user_language" class="form-control pro-dropdown" id="lang"
                                                    multiple="multiple">
                                                    <option selected value="<?php echo $user_language; ?>"><?php echo $user_language; ?></option>
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
                                        <div class="d-flex">
                                            <button name="submit" type="submit" class="btn btn-hover">Save</button>
                                            <a href="manage-profile.php" class="btn btn-link">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
<?php
      if(isset($_POST['submit'])){
          //file
         $filename = $_FILES['user_profile']['name'];
         $filetmpname = $_FILES['user_profile']['tmp_name'];
         $folder = 'uploads/profile/';
         move_uploaded_file($filetmpname, $folder.$filename);
         $img="$folder$filename";
         if($filename==''){
            $image=$user_profile;
         }else{
             $image=$img;
         }

        $edit_user_profile=$_POST['user_profile'];
        $edit_user_bio=$_POST['user_bio'];
        $edit_user_email=$_POST['user_email'];
        $edit_user_name=$_POST['user_name'];
        $edit_user_language=$_POST['user_language'];
        $edit_user_gender=$_POST['user_gender'];
         $edit_user_query="UPDATE `users` SET `user_name` = '$edit_user_name' , `user_bio` = '$edit_user_bio', `user_language` = '$edit_user_language', `user_email` = '$edit_user_email', `user_profile` = '$image', `user_gender` = '$edit_user_gender' WHERE `users`.`user_id` =$cookie_user_id ;";
         $edit_user_result=mysqli_query($db_connect,$edit_user_query);
         header('location:manage-profile.php');
      }
?>
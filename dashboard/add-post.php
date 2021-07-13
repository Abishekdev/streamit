<?php
include 'includes/db.php';
?>
   
<!doctype html>
<html lang="en">
<head>
   <?php include 'includes/head.php'; ?>
</head>

<body>
   <!-- loader Start-->
   <!-- <div id="loading">
      <div id="loading-center">
      </div>
   </div>  -->
   <!-- loader END -->
   <!-- Wrapper Start -->
   <div class="wrapper">
         <!-- sidebar start's -->
<?php include 'includes/sidebar.php';?>
   <!-- sidebar end -->
      <!-- TOP Nav Bar -->
      <?php include 'includes/navbar.php'; ?>
      <!-- TOP Nav Bar END -->

      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Add Post</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <form method="post" action="add-post.php" enctype="multipart/form-data">
                           <div class="row">
                              <div class="col-lg-7">
                                 <div class="row">
                                 <div class="col-12 form-group">
                                       <input type="text" name="post_name" class="form-control" placeholder="Title">
                                    </div>
                                 <div class="col-12 form_gallery form-group">
                                       <label id="gallery2" for="form_gallery-upload">Upload Image</label>
                                       <input data-name="#gallery2" name="post_image" id="form_gallery-upload" class="form_gallery-upload"
                                          type="file" accept=".png, .jpg, .jpeg">
                                    </div>
         <?php
         if(isset($_POST['submit'])) {
         $filename = $_FILES['post_image']['name'];
         $filetmpname = $_FILES['post_image']['tmp_name'];
         $folder = '../uploads/thumbnail/';
         move_uploaded_file($filetmpname, $folder.$filename);
         $image="uploads/thumbnail/$filename";
         
         }
               ?>
                                    <p style="padding-left:20px;color:#414141;">Image Size Must Be <b>677x381</b> or <b>1920x1080</b></p>
                                    <br>
                                    
                                    

                                    <div class="col-md-6 form-group">
                                       <select name="post_category" name="post_category_name" class="form-control" id="exampleFormControlSelect1">
                                          <option disabled>Choose Post Category</option>
                                          <?php
                                                $select_all_category="SELECT * FROM category";
                                                $category_result=mysqli_query($db_connect,$select_all_category);
                                                while($cat_row=mysqli_fetch_assoc($category_result)){
                                                   $category_name=$cat_row['category_name'];
                                                   echo "<option value='$category_name'>$category_name</option>";
                                                }
                                          ?>
                                       </select>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                       <select name="post_quality" class="form-control" id="exampleFormControlSelect2">
                                          <option disabled="">Choose quality</option>
                                          <option value='FULLHD'>FULLHD</option>
                                          <option value='HD'>HD</option>
                                       </select>
                                    </div>
                                    <div class="col-12 form-group">
                                       <textarea id="text" name="post_description" rows="5" class="form-control"
                                          placeholder="Description"></textarea>
                                    </div>
                                 </div>
                              </div>
                           <?php
                        if(isset($_POST['submit'])) {
                        $v_filename = $_FILES['post_video']['name'];
                        $v_filetmpname = $_FILES['post_video']['tmp_name'];
                        $v_folder = '../uploads/videos/';
                        move_uploaded_file($v_filetmpname, $v_folder.$v_filename);
                        $video="uploads/videos/$v_filename";
                        
                        }
                        ?>
                              <div class="col-lg-5">
                                 <div class="d-block position-relative">
                                    <div class="form_video-upload">
                                       <input type="file" name="post_video" accept="video/*" multiple>
                                       <p>Upload video</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-6 form-group">
                                 <select name='post_language' class="form-control" id="exampleFormControlSelect3">
                                    <option selected disabled="">Choose Language</option>
                                    <option value='English'>English</option>
                                    <option value='Hindi'>Hindi</option>
                                    <option value='Tamil'>Tamil</option>
                                    <option value='Gujarati'>Gujarati</option>
                                    <option value='Other'>Other</option>
                                 </select>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <input name='post_duration' type="text" class="form-control" value="2h 15m" placeholder="Duration">
                              </div>
                              <div class="col-12 form-group ">
                                 <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                 <button type="reset" class="btn btn-danger">Cancel</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php
          if(isset($_POST['submit'])){
            $email=$_COOKIE['admin_email'];
            $select_user="SELECT * FROM users WHERE user_email='".$email."'";
            $user_result=mysqli_query($db_connect,$select_user);
            while($user_row=mysqli_fetch_assoc($user_result)){
               $post_author=$user_row['user_name'];

            $post_category=$_POST['post_category'];
            $post_name=$_POST['post_name'];
            $post_description=$_POST['post_description'];
            $post_quality=$_POST['post_quality'];
            $post_language=$_POST['post_language'];
            $post_duration=$_POST['post_duration'];
            $create_post_query="INSERT INTO `post` (`post_id`, `post_name`, `post_author`, `post_image`, `post_date`, `post_description`, `post_quality`, `post_language`, `post_duration`, `post_video`,`post_category`) VALUES (NULL, '$post_name', '$post_author', '$image',CURRENT_TIMESTAMP(), '$post_description', '$post_quality', '$post_language', '$post_duration','$video','$post_category')";
            $create_post_result=mysqli_query($db_connect,$create_post_query);
            }
         }
            ?>
<!-- Wrapper END -->
      <!-- Footer And Optional JavaScript Start's -->
      
      <?php
      
      include 'includes/footer.php';
      include 'includes/includes.php';
      ?>
   <!-- Footer And Optional JavaScript END -->
</body>
</html>
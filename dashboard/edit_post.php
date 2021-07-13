<?php
ob_start();
include 'includes/db.php';
?>
<!doctype html>
<html lang="en">
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
   <!-- Wrapper Start -->
   <div class="wrapper">
         <!-- sidebar start's -->
<?php include 'includes/sidebar.php';?>
   <!-- sidebar end -->
      <!-- TOP Nav Bar -->
      <?php include 'includes/navbar.php'; ?>
      <!-- TOP Nav Bar END -->
    <?php
    $post_id=$_GET['edit_post'];
    $select_all_post="SELECT * FROM post WHERE post_id = $post_id";
    $post_result=mysqli_query($db_connect,$select_all_post);
    while($post_row=mysqli_fetch_assoc($post_result)){
       $post_id=$post_row['post_id'];
       $post_name=$post_row['post_name'];
       $post_description=$post_row['post_description'];
       $post_language=$post_row['post_language'];
       $post_quality=$post_row['post_quality'];
       $post_date=$post_row['post_date'];
       $post_duration=$post_row['post_duration'];
       $post_author=$post_row['post_author'];     
       $post_image=$post_row['post_image'];  
       $post_video=$post_row['post_video'];  
      }
    ?>
      <!-- Page Content  -->
      
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Edit Post</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <form method="post" action="edit_post.php?edit_post=<?php echo $post_id ?>" enctype="multipart/form-data">
                           <div class="row">
                              <div class="col-lg-7">
                                 <div class="row">
                                    <div class="col-12 form-group">
                                    
                                       <input type="text" class="form-control" name="post_name" value='<?php echo "$post_name"?>' placeholder="Title">
                                    </div>
                                    <div class="col-12 form_gallery form-group">
                                       <label src="<?php echo "$post_image" ?>" value="<?php echo "$post_image" ?>" id="gallery2" for="form_gallery-upload">Upload Image</label>
                                       <input  data-name="#gallery2" name="post_image" id="form_gallery-upload" class="form_gallery-upload"
                                          type="file" accept=".png, .jpg, .jpeg">
                                    </div>
                                    <?php
         if(isset($_POST['update'])) {
         $filename = $_FILES['post_image']['name'];
         $filetmpname = $_FILES['post_image']['tmp_name'];
         $folder = '../uploads/thumbnail/';
         move_uploaded_file($filetmpname, $folder.$filename);
         $image="uploads/thumbnail/$filename";
         
         }
               ?>
                                    <div class="col-md-6 form-group">
                                       <select name="post_category_name" class="form-control" id="exampleFormControlSelect1">
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
                                          <option selected value='<?php echo "$post_quality"?>'><?php echo"$post_quality"?></option>
                                          <option value='FULLHD'>FULLHD</option>
                                          <option value='HD'>HD</option>
                                       </select>
                                    </div>
                                    <div class="col-12 form-group">
                                       <textarea id="text" name="post_description"rows="5" class="form-control"
                                          placeholder="Description"><?php echo"$post_description";?></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-5">
                                 <div class="d-block position-relative">
                                    <div class="form_video-upload">
                                       <input name="post_video" src="<?php echo "$post_video" ?>" value="<?php echo "$post_video" ?>" type="file" accept="video/mp4,video/x-m4v,video/*" multiple>
                                       <p>Upload video</p>
                                    </div>
                                 </div>
                              </div>
                              <?php
                        if(isset($_POST['update'])) {
                        $v_filename = $_FILES['post_video']['name'];
                        $v_filetmpname = $_FILES['post_video']['tmp_name'];
                        $v_folder = '../uploads/videos/';
                        move_uploaded_file($v_filetmpname, $v_folder.$v_filename);
                        $video="uploads/videos/$v_filename";
                        
                        }
                        ?>
                           </div>
                           <div class="row">
                              <div class="col-sm-6 form-group">
                                 <select value='' name='post_language' class="form-control" id="exampleFormControlSelect3">
                                    <option selected disabled="">Choose Language</option>
                                    <option selected value='<?php echo "$post_language"?>'><?php echo"$post_language"?></option>
                                    <option value='English'>English</option>
                                    <option value='Hindi'>Hindi</option>
                                    <option value='Tamil'>Tamil</option>
                                    <option value='Gujarati'>Gujarati</option>
                                    <option value="Other">Other</option>
                                 </select>
                              </div>
                              <div class="col-sm-12 form-group">
                                 <input value="<?php echo"$post_duration"?>" name='post_duration' type="text" class="form-control"  placeholder="Duration">
                              </div>
                              <div class="col-12 form-group ">
                                 <button name="update" type="update" class="btn btn-primary">Update</button>
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
    if(isset($_POST['update'])){
      $edit_post_name=$_POST['post_name'];
      $edit_post_author=$_POST['post_author'];
      $edit_post_description=$_POST['post_description'];
      $edit_post_quality=$_POST['post_quality'];
      $edit_post_language=$_POST['post_language'];
      $edit_post_duration=$_POST['post_duration'];
      $edit_post_video=$post_row['post_video'];  
      $edit_post_image=$post_row['post_image'];  

   $edit_post_query="UPDATE `post` SET `post_name` = '$edit_post_name',`post_description` = '$edit_post_description',`post_quality` = '$edit_post_quality',`post_language` = '$edit_post_language',`post_duration` = '$edit_post_duration' WHERE `post`.`post_id` = $post_id";
   $edit_post_result=mysqli_query($db_connect,$edit_post_query);
   
   if($image!='uploads/thumbnail/'){
   $edit_post_query="UPDATE `post` SET `post_image` = '$image' WHERE `post`.`post_id` = $post_id";
   $edit_post_result=mysqli_query($db_connect,$edit_post_query);
   }
   if($video!='uploads/videos/'){
      $edit_post_query="UPDATE `post` SET ,`post_video` = '$video' WHERE `post`.`post_id` = $post_id";
      $edit_post_result=mysqli_query($db_connect,$edit_post_query);
      }
      header('location: post-list.php');
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
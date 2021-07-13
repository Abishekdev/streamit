<!doctype html>
<html lang="en">
<head>
<?php include 'includes/head.php';
ob_start()
 ?>
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
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Post Lists</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                           <a href="add-post.php" class="btn btn-primary">Add Post</a>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-view">
                           <table class="data-tables table movie_table " style="width:100%">
                              <thead>
                                 <tr>
                                    <th>Post</th>
                                    <th>Quality</th>
                                    <th>Category</th>
                                    <th>Release Date</th>
                                    <th>Language</th>
                                    <th style="width: 20%;">Description</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                              <?php
                              include 'includes/db.php';
                                 $select_all_post="SELECT * FROM post";
                                 $post_result=mysqli_query($db_connect,$select_all_post);
                                 while($post_row=mysqli_fetch_assoc($post_result)){
                                    $post_id=$post_row['post_id'];
                                    $post_name=$post_row['post_name'];
                                    $post_description=$post_row['post_description'];
                                    $post_language=$post_row['post_language'];
                                    $post_quality=$post_row['post_quality'];
                                    $post_date=$post_row['post_date'];
                                    $post_category=$post_row['post_category'];
                                    $post_duration=$post_row['post_duration'];
                                    $post_image=$post_row['post_image'];
                                  
                                    
                                    echo "
                                 <tr>
                                    <td>
                                       <div class='media align-items-center'>
                                          <div class='iq-movie'>
                                             <a href='javascript:void(0);'><img
                                                   src='../$post_image'
                                                   class='img-border-radius avatar-40 img-fluid' alt=''></a>
                                          </div>
                                          <div class='media-body text-white text-left ml-3'>
                                             <p class='mb-0'>$post_name</p>
                                             <small>$post_duration</small>
                                          </div>
                                       </div>
                                    </td>
                                    <td>$post_quality</td>
                                    <td>$post_category</td>
                                    <td>$post_date</td>
                                    <td>$post_language</td>
                                    <td>
                                       <p>$post_description</p>
                                    </td>
                                    <td>
                                       <div class='flex align-items-center list-user-action'>
                                          <a class='iq-bg-warning' data-toggle='tooltip' data-placement='top' title=''
                                             data-original-title='View' target='_blank' href='../post-details.php?post=$post_id'><i class='far fa-eye'></i></a>
                                          <a class='iq-bg-success' data-toggle='tooltip' data-placement='top' title=''
                                             data-original-title='Edit' href='edit_post.php?edit_post=$post_id'><i class='far fa-edit'></i></a>
                                          <a class='iq-bg-primary' data-toggle='tooltip' data-placement='top' title=''
                                             data-original-title='Delete' href='post-list.php?delete=$post_id'><i
                                                class='far fa-trash-alt' ></i></a>
                                       </div>
                                    </td>
                                 </tr>";
                                 }
                                   
                                 if(isset($_GET['delete'])){
                                    
                                    $post_delete_id=$_GET['delete'];
                                    $post_delete_query="DELETE FROM post WHERE post_id = $post_delete_id ;";
                                    mysqli_query($db_connect,$post_delete_query);
                                    // PHP program to delete a image
                                    $file_pointer = "../$post_image";
                                    if (!unlink($file_pointer)) {
                                       echo ("$file_pointer cannot be deleted due to an error");
                                    }
                                    else {
                                       echo ("$file_pointer has been deleted");
                                    }


                                    header('location: post-list.php');

                                 }
                                 
                                 ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Wrapper END -->
   <!-- Footer -->
   <?php include 'includes/footer.php'?>
   <!-- Footer END -->
   <!-- Optional JavaScript Start's -->
   <?php include 'includes/includes.php'?>
   <!-- Optional JavaScript END -->
</body>
</html>
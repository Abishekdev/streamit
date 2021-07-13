<!doctype html>
<html lang="en">
<head>
<?php 
ob_start();
include 'includes/db.php';
include 'includes/head.php';
// include '../includes/auth.php';
include '../includes/time.php' ?>
   </head>
   <body>
      <!-- loader Start -->
      <!-- <div id="loading">
         <div id="loading-center">
         </div>
      </div> -->
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
                              <h4 class="card-title">Comment Lists</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="data-tables table movie_table" style="width:100%">
                                 <thead>
                                    <tr>
                                       <th style="width: 10%;">Author</th>
                                       <th style="width: 25%;">Comment</th>
                                       <th style="width: 15%;">Created Time</th>
                                       <th style="width: 10%;">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                     
                     
                      $select_all_comments="SELECT * FROM comments";
                      $comment_result=mysqli_query($db_connect,$select_all_comments);
                      while($comment_row=mysqli_fetch_assoc($comment_result)){
                      $comment=$comment_row['comment'];
                      $comment_date=$comment_row['comment_time'];
                      $comment_id=$comment_row['comment_id'];
                      $commented_by=$comment_row['commented_by'];
                      $com_time=time_ago($comment_date);
                      
                      $select_user="SELECT * FROM users WHERE user_id = '".$commented_by."'";
                                     $user_result=mysqli_query($db_connect,$select_user);
                                     $user_row=mysqli_fetch_assoc($user_result);
                                     $username=$user_row['user_name'];
                                     $user_profile=$user_row['user_profile'];

                         echo "
                         <tr>
         <td>$username</td>
         <td>
            <p class='mb-0'>$comment</p>
         </td>
         <td>
         $com_time
         </td>                                       
         <td>
            <div class='flex align-items-center list-user-action'>
               <a class='iq-bg-success' data-toggle='tooltip' data-placement='top' title='' data-original-title='Edit' href='edit_comment.php?edit_com=$comment_id'>
                  <i class='far fa-edit'></i></a>
               <a class='iq-bg-primary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete' href='comment.php?delete=$comment_id'>
               <i class='far fa-trash-alt'></i></a>
           </div>
         </td>
      </tr>";
   }
      if(isset($_GET['delete'])){
         $cam_delete_id=$_GET['delete'];
         $cam_delete_query="DELETE FROM comments WHERE comment_id = $cam_delete_id ;";
         mysqli_query($db_connect,$cam_delete_query);
         header('location: comment.php');

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
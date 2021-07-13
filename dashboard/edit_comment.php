
<!doctype html>
<html lang="en">
<?php ob_start();
 include 'includes/db.php'?>
<head>
<?php include 'includes/head.php'?>
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
      <?php
      $com_id=$_GET['edit_com'];
    $select_all_com="SELECT * FROM comments WHERE comment_id =$com_id ";
    $com_result=mysqli_query($db_connect,$select_all_com);
   while($com_row=mysqli_fetch_assoc($com_result)){
      $commment_id=$com_row['comment_id'];
       $edit_com=$com_row['comment'];
      }
      
    ?>
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Add Comment</h4>
                        </div>
                     </div>
                     <!--Mark * -->
                     <div class="iq-card-body">
                        <div class="row">
                           <div class="col-lg-12">
                              <form action="edit_comment.php?edit_com=<?php echo $com_id ?>" method="POST">
                                 
                                 <div class="form-group">
                                    <textarea id="text" name="update_comment" rows="5" class="form-control"
                                    placeholder="comment"><?php echo $edit_com?></textarea>
                                 </div>
                                 <div class="form-group ">
                                 <button  name='submit' type="submit" class="btn btn-primary">Update</button>
                                  <a href="comment.php"><button type="cancel" class="btn btn-danger">cancel</button></a>
                                 </div>
                              </form>
                           </div>
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
<?php
      if(isset($_POST['submit'])){
         
         $update_com=$_POST['update_comment'];
         $edit_com_query="UPDATE `comments` SET `comment` = '$update_com' WHERE `comments`.`comment_id` =$com_id ;";
         $edit_com_result=mysqli_query($db_connect,$edit_com_query);
         header('location:comment.php');
         
      }
?>
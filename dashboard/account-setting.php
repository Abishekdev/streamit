<!doctype html>
<html lang="en">
<head>
   <?php
   include 'includes/db.php';
    include 'includes/head.php' ?>
</head>
<body class="sidebar-main-active right-column-fixed">
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
            <div class="col-lg-12">
               <div class="iq-card">
                  <div class="iq-card-header d-flex justify-content-between">
                     <div class="iq-header-title">
                        <h4 class="card-title">Social Media</h4>
                     </div>
                  </div>
                  <div class="iq-card-body">
                     <div class="acc-edit">
                     <?php
    $select_all_soc="SELECT * FROM social_media WHERE social_id =1 ";
    $soc_result=mysqli_query($db_connect,$select_all_soc);
   while($soc_row=mysqli_fetch_assoc($soc_result)){
       $instagram=$soc_row['instagram'];
       $facebook=$soc_row['facebook'];
       $twitter=$soc_row['twitter'];
       $youtube=$soc_row['youtube'];
      }
      
    ?>
                        <form  action="account-setting.php" method="POST">
                           <div class="form-group">
                              <label for="facebook">Facebook:</label>
                              <input type="text" class="form-control" name="facebook" id="facebook" value="<?php echo $facebook?>">
                           </div>
                           <div class="form-group">
                              <label for="twitter">Twitter:</label>
                              <input type="text" class="form-control" name="twitter" id="twitter" value="<?php echo $twitter?>">
                           </div>
                           <div class="form-group">
                              <label for="instagram">Instagram:</label>
                              <input type="text" class="form-control" name="instagram" id="instagram" value="<?php echo $instagram?>">
                           </div>
                           <div class="form-group">
                              <label for="youtube">YouTube:</label>
                              <input type="text" class="form-control" name="youtube" id="youtube" value="<?php echo $youtube?>">
                           </div>
                           <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                           <button type="reset" style="margin-left: 2%;" class="btn iq-bg-danger">Cancel</button>
                        </form>
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
         
         $edit_facebook=$_POST['facebook'];
         $edit_instagram=$_POST['instagram'];
         $edit_twitter=$_POST['twitter'];
         $edit_youtube=$_POST['youtube'];
         $edit_soc_query="UPDATE `social_media` SET `facebook` = '$edit_facebook', `instagram` = '$edit_instagram',`twitter` = '$edit_twitter' ,`youtube` = '$edit_youtube' WHERE `social_media`.`social_id` = 1";
         $edit_soc_result=mysqli_query($db_connect,$edit_soc_query);
         // header('location:category-list.php');
      }
?>
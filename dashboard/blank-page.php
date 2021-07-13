<!doctype html>
<html lang="en">
<head>
   <?php include 'includes/head.php' ?>
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
                        <div class="iq-card-body">
                           Here Add Your HTML Content.....
                           <!-- code -->
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Input</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <h5>383 Comments</h5>
                           <form>
                              <div class="form-group">
                                 <label for="exampleFormControlTextarea1">Leave Your Comments</label>
                                 <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                              </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <button type="submit" class="btn btn-danger">Cancel</button>
                           </form>
                        </div>
                     </div>
                           <!-- code -->
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
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
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Add Category</h4>
                        </div>
                     </div>
                     <div style="margin-left:2%;" class="form-group ">
                                 <a href="category-list.php">
                                 <button  class="btn btn-primary">View Category</button>
                                  </a>
                                 </div>
                     <!--Mark * -->
                     <div class="iq-card-body">
                        <div class="row">
                           <div class="col-lg-12">
                              <form action="add-category.php" method="POST">
                                 <div class="form-group">
                                    <input name="category_name" type="text" class="form-control" placeholder="Name">
                                 </div>
                                 <div class="form-group">
                                    <textarea id="text" name="category_description" rows="5" class="form-control"
                                    placeholder="Description"></textarea>
                                 </div>
                                 <div class="form-group ">
                                 <button  name='submit' type="submit" class="btn btn-primary">Submit</button>
                                  <a href="category-list.php"><button type="cancel" class="btn btn-danger">cancel</button></a>
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
   include 'includes/db.php';

      if(isset($_POST['submit'])){
         $category_name=$_POST['category_name'];
         $category_description=$_POST['category_description'];
         $create_cat_query="INSERT INTO `category` (`category_id`, `category_name`, `category_description`) VALUES (NULL, '$category_name', '$category_description');";
         $create_cat_result=mysqli_query($db_connect,$create_cat_query);

         if(empty($category_name)&&empty($category_movie)&&empty($category_description)){

            echo"<script>alert('Please Enter Valid Input');</script>"; 
         }
         if(!$create_cat_result){
            echo"<script>alert('Unable To Create New Category !! Please Contact Owner Abishek9442@gmail.com');</script>";
         }
      }
?>
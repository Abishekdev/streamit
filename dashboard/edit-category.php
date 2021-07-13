<?php ob_start(); include 'includes/db.php'?>
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
      <?php
      $cat_id=$_GET['edit_cat'];
    $select_all_category="SELECT * FROM category WHERE category_id =$cat_id ";
    $cat_result=mysqli_query($db_connect,$select_all_category);
   while($cat_row=mysqli_fetch_assoc($cat_result)){
      $category_id=$cat_row['category_id'];
       $category_name=$cat_row['category_name'];
       $category_description=$cat_row['category_description'];
      }
      
    ?>
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Edit Category</h4>
                        </div>
                     </div>
                     <!--Mark * -->
                     <div class="iq-card-body">
                        <div class="row">
                           <div class="col-lg-12">
                              <form action="edit-category.php?edit_cat=<?php echo $cat_id ?>" method="POST">
                                 <div class="form-group">
                                    <input name="category_name" value="<?php echo "$category_name"?>" type="text" class="form-control" placeholder="Name">
                                 </div>
                                 <div class="form-group">
                                    <textarea id="text" name="category_description" rows="5" class="form-control"
                                    placeholder="Description"><?php echo "$category_description"?></textarea>
                                 </div>
                                 
                                 <div class="form-group ">
                                 <button  name='submit' type="submit" class="btn btn-primary">Update</button>
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
      if(isset($_POST['submit'])){
         
         $edit_category_name=$_POST['category_name'];
         $edit_category_description=$_POST['category_description'];
         $edit_cat_query="UPDATE `category` SET `category_name` = '$edit_category_name', `category_description` = '$edit_category_description' WHERE `category`.`category_id` = $category_id";
         $edit_cat_result=mysqli_query($db_connect,$edit_cat_query);
         header('location:category-list.php');
      }
?>
<?php ob_start(); include 'includes/db.php' ?>
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
                           <h4 class="card-title">Category Lists</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                           <a href="add-category.php" class="btn btn-primary">Add Category</a>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-view">
                           <table class="data-tables table movie_table " style="width:100%">
                              <thead>
                                 <tr>
                                    <th style="width:30%;">Name</th>
                                    <th style="width:40%;">Description</th>
                                    <th style="width:30%;">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                              
                              <?php
                             
                                 
                                 $select_all_category="SELECT * FROM category";
                                 $category_result=mysqli_query($db_connect,$select_all_category);
                                 while($cat_row=mysqli_fetch_assoc($category_result)){
                                    $category_name=$cat_row['category_name'];
                                    $category_id=$cat_row['category_id'];
                                    $category_description=$cat_row['category_description'];
                                    
                                    
                                    
                                    echo "<tr>
                                    <td>$category_name</td>
                                    <td>
                                       <p>$category_description
                                       </p>
                                    </td>
                                    <td>
                                       <div class='flex align-items-center list-user-action'>
                                          <a class='iq-bg-warning' data-toggle='tooltip' data-placement='top' title=''
                                             data-original-title='View' href='../show-category.php?category=$category_name'><i class='far fa-eye'></i></a>
                                          <a class='iq-bg-success' data-toggle='tooltip' data-placement='top' title=''
                                             data-original-title='Edit' href='edit-category.php?edit_cat=$category_id'><i class='far fa-edit'></i></a>
                                          <a class='iq-bg-primary' data-toggle='tooltip' data-placement='top' title=''
                                             data-original-title='Delete' href='category-list.php?delete=$category_id'><i class='far fa-trash-alt'></i></a>
                                       </div>
                                    </td>
                                 </tr>";
                                 }
                                 if(isset($_GET['delete'])){
                                    $cat_delete_id=$_GET['delete'];
                                    $cat_delete_query="DELETE FROM category WHERE category_id = $cat_delete_id ;";
                                    mysqli_query($db_connect,$cat_delete_query);
                                    header('location: category-list.php');
}
                                 
                              

                                 ?>
                                 
                                 
                                 </tr>
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
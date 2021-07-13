<!doctype html>
<html lang="en">
<head>
<?php
ob_start();
include 'includes/db.php';
include 'includes/head.php' ?>
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
<div class="col-sm-14">
<div class="iq-card">
<div class="iq-card-header d-flex justify-content-between">
<div class="iq-header-title">
   <h4 class="card-title">User Lists</h4>
</div>
</div>
<div class="iq-card-body">
<div class="table-view">
   <table class="data-tables table movie_table" style="width:100%">
      <thead>
         <tr>
            <th style="width: 10%;">Profile</th>
            <th style="width: 10%;">Name</th>
            <th style="width: 10%;">bio</th>
            <th style="width: 10%;">Email</th>
            <th style="width: 10%;">Language</th>
            <th style="width: 5%;">Gender</th>
            <th style="width: 5%;">User Role</th>
            <th style="width: 10%;">Join Date</th>
            <th style="width: 10%;">Admin</th>
            <th style="width: 10%;">User</th>
            <th style="width: 10%;">Action</th>
         </tr>
      </thead>
      <tbody>
      <?php 
      $select_all_users="SELECT * FROM users";
      $user_result=mysqli_query($db_connect,$select_all_users);
      while($user_row=mysqli_fetch_assoc($user_result)){
         $user_name=$user_row['user_name'];
         $user_id=$user_row['user_id'];
         $user_bio=$user_row['user_bio'];
         $join_date=$user_row['join_date'];
         $user_email=$user_row['user_email'];
         $user_profile=$user_row['user_profile'];
          $user_language=$user_row['user_language'];
         $user_role=$user_row['user_role'];
         $user_gender=$user_row['user_gender'];
         
         echo "
         <tr>
         
            <td>
               <img src='../$user_profile' class='img-fluid avatar-50' alt='author-profile'>
            </td>
            <td>$user_name</td>
            <td>$user_bio</td>
            <td><a href='mailto:$user_email' class='__cf_email__'>$user_email</a></td>
            <td>$user_language</td>
            <td>$user_gender</td>
            <td><span class='badge iq-bg-success'>$user_role</span></td>
            <td>$join_date</td>
            <td><a href='user.php?admin=$user_id'>Admin</a></td>
            <td><a href='user.php?user=$user_id'>User</a></td>
            <td>
               <div class='flex align-items-center list-user-action'>
                  <a class='iq-bg-success' data-toggle='tooltip' data-placement='top' title='' data-original-title='Edit' href='#'><i
                     class='far fa-edit'></i></a>
                     <a class='iq-bg-primary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete' href='user.php?delete=$user_id'><i class='far fa-trash-alt'></i></a>
                     </div>
                  </td>
               </tr>
               ";
      }
      if(isset($_GET['delete'])){
         $user_delete_id=$_GET['delete'];
         $user_delete_query="DELETE FROM users WHERE user_id = $user_id ;";
         mysqli_query($db_connect,$user_delete_query);
         header('location: user.php');
      }
      if(isset($_GET['admin'])){
         $user_admin_id=$_GET['admin'];
         $user_admin_query="UPDATE users SET user_role = 'admin' WHERE `users`.`user_id` =  $user_admin_id";
         mysqli_query($db_connect,$user_admin_query);
         header('location: user.php');
      }
      if(isset($_GET['user'])){
         $user_user_id=$_GET['user'];
         $user_query="UPDATE users SET user_role = 'user' WHERE  `users`.`user_id` =  $user_user_id;";
         mysqli_query($db_connect,$user_query);
         header('location: user.php');
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
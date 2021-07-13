<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
<!-- Sidebar-->
<div class="iq-sidebar">
   <div class="iq-sidebar-logo d-flex justify-content-between">
      <a href="index.php" class="header-logo">
         <img src="assets/images/logo.png" class="img-fluid rounded-normal" alt="">
         <div class="logo-title">
            <span class="text-primary text-uppercase">Streamit</span>
         </div>
      </a>
      <div class="iq-menu-bt-sidebar">
         <div class="iq-menu-bt align-self-center">
            <div class="wrapper-menu">
               <div class="main-circle"><i class="fas fa-bars"></i></div>
            </div>
         </div>
      </div>
   </div>
   <div id="sidebar-scrollbar">
      <nav class="iq-sidebar-menu">
         <ul id="iq-sidebar-toggle" class="iq-menu">
            <li><a href="index.php" class="iq-waves-effect"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
            <!-- <li><a href="rating.php" class="iq-waves-effect"><i class="fas fa-star-half-alt"></i><span>Rating </span></a></li> -->
            <li><a href="comment.php" class="iq-waves-effect"><i class="fas fa-comments"></i><span>Comment</span></a></li>
            <li><a href="user.php" class="iq-waves-effect"><i class="fas fa-user-friends"></i><span>User</span></a></li>
            <li>
               <a href="#category" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="fas fa-list-ul"></i><span>Category</span></a>
               <ul id="category" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                  <li><a href="add-category.php"><i class="fas fa-user-plus"></i>Add Category</a></li>
                  <li><a href="category-list.php"><i class="fas fa-eye"></i>Category List</a></li>
               </ul>
            </li>
            <li>
               <a href="#movie" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="fas fa-film"></i><span>Post</span></a>
               <ul id="movie" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                  <li><a href="add-post.php"><i class="fas fa-user-plus"></i>Add Post</a></li>
                  <li><a href="post-list.php"><i class="fas fa-eye"></i>Post List</a></li>
               </ul>
            </li>
               </ul>
            </li>
         </ul>
      </nav>
   </div>
</div>
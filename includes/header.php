      <!-- Header -->
      <?php
ob_start();     
         include 'includes/db.php';
         include_once 'includes/auth.php';
         loggedin();
         $cookie_email=$_COOKIE['email']; 
         $select_user="SELECT * FROM users WHERE user_email = '".$cookie_email."'";
         $user_result=mysqli_query($db_connect,$select_user);
         $user_row=mysqli_fetch_assoc($user_result);
         $user_id=$user_row['user_id'];
         $user_name=$user_row['user_name'];
         $user_bio=$user_row['user_bio'];
         $user_language=$user_row['user_language'];
         $user_password=$user_row['user_password'];
         $user_email=$user_row['user_email'];
         $user_profile=$user_row['user_profile'];
         $user_gender=$user_row['user_gender'];
         $join_date=$user_row['join_date'];
         if($user_profile==''){
            $profile="images/user/user.jpg";
            
        }else{
            $profile=$user_profile;
         }
         
      ?>
      <header id="main-header">
         <div class="main-header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <a href="#" class="navbar-toggler c-toggler" data-toggle="collapse"
                           data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                           aria-expanded="false" aria-label="Toggle navigation">
                           <div class="navbar-toggler-icon" data-toggle="collapse">
                              <span class="navbar-menu-icon navbar-menu-icon--top"></span>
                              <span class="navbar-menu-icon navbar-menu-icon--middle"></span>
                              <span class="navbar-menu-icon navbar-menu-icon--bottom"></span>
                           </div>
                        </a>
                        <a class="navbar-brand" href="index.php"> <img class="img-fluid logo" src="images/logo.png"
                           alt="streamit" /> </a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                           <div class="menu-main-menu-container">
                              <ul id="top-menu" class="navbar-nav ml-auto">
                                 <li class="menu-item">
                                    <a href="index.php">Home</a>
                                 </li>
                                 <?php

                                 $select_all_category="SELECT * FROM category";
                                 $category_result=mysqli_query($db_connect,$select_all_category);
                                 while($cat_row=mysqli_fetch_assoc($category_result)){
                                    $category_name=$cat_row['category_name'];
                                    $category_id=$cat_row['category_id'];
                                    echo "<li class='menu-item'>
                                    <a href='show-category.php?category=$category_name'>$category_name</a>
                                 </li>";
                                 }
                                 ?>
                              </ul>
                           </div>
                        </div>
                        
                        <div class="mobile-more-menu">
                           <a href="javascript:void(0);" class="more-toggle" id="dropdownMenuButton"
                              data-toggle="more-toggle" aria-haspopup="true" aria-expanded="false">
                           <i class="ri-more-line"></i>
                           </a>
                           <div class="more-menu" aria-labelledby="dropdownMenuButton">
                              <div class="navbar-right position-relative">
                                 <ul class="d-flex align-items-center justify-content-end list-inline m-0">
                                    <!-- <li>
                                       <a href="#" class="search-toggle">
                                       <i class="ri-search-line"></i>
                                       </a>
                                       <div class="search-box iq-search-bar">
                                          <form action="#" class="searchbox">
                                             <div class="form-group position-relative">
                                                <input type="text" class="text search-input font-size-12"
                                                   placeholder="Type Here To Search...">
                                                <i class="search-link ri-search-line"></i>
                                             </div>
                                          </form>
                                       </div>
                                    </li> -->
                                    <li>
                                       <a href="#" class="iq-user-dropdown search-toggle d-flex align-items-center">
                                       <img src="<?php echo $profile;?>" class="img-fluid avatar-40 rounded-circle"
                                          alt="user">
                                       </a>
                                       <div class="iq-sub-dropdown iq-user-dropdown">
                                          <div class="iq-card shadow-none m-0">
                                             <div class="iq-card-body p-0 pl-3 pr-3">
                                                <a href="manage-profile.php" class="iq-sub-card setting-dropdown">
                                                   <div class="media align-items-center">
                                                      <div class="right-icon">
                                                         <i class="ri-file-user-line text-primary"></i>
                                                      </div>
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0 ">Manage Profile</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                                <a href="logout.php" class="iq-sub-card setting-dropdown">
                                                   <div class="media align-items-center">
                                                      <div class="right-icon">
                                                         <i class="ri-logout-circle-line text-primary"></i>
                                                      </div>
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0">Logout</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="navbar-right menu-right">
                           <ul class="d-flex align-items-center list-inline m-0">
                              <!-- <li class="nav-item nav-icon">
                                 <a href="#" class="search-toggle device-search">
                                 <i class="ri-search-line"></i>
                                 </a>
                                 <div class="search-box iq-search-bar d-search">
                                    <form action="#" class="searchbox">
                                       <div class="form-group position-relative">
                                          <input type="text" class="text search-input font-size-12"
                                             placeholder="Type Here To Search...">
                                          <i class="search-link ri-search-line"></i>
                                       </div>
                                    </form>
                                 </div>
                              </li> -->
                              <li class="nav-item nav-icon">
                                 <a href="#" class="iq-user-dropdown search-toggle p-0 d-flex align-items-center"
                                    data-toggle="search-toggle">
                                 <img src="<?php echo $profile;?>" class="img-fluid avatar-40 rounded-circle" alt="user">
                                 </a>
                                 <div class="iq-sub-dropdown iq-user-dropdown">
                                    <div class="iq-card shadow-none m-0">
                                       <div class="iq-card-body p-0 pl-3 pr-3">
                                          <a href="manage-profile.php" class="iq-sub-card setting-dropdown">
                                             <div class="media align-items-center">
                                                <div class="right-icon">
                                                   <i class="ri-file-user-line text-primary"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                   <h6 class="mb-0 ">Manage Profile</h6>
                                                </div>
                                             </div>
                                          </a>
                                          
                                          <a href="watch_later.php" class="iq-sub-card setting-dropdown">
                                             <div class="media align-items-center">
                                                <div class="right-icon">
                                                   <i class="fa fa-clock-o text-primary" aria-hidden="true"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                   <h6 class="mb-0 ">Watch Later</h6>
                                                </div>
                                             </div>
                                          </a>
                                          <a href="logout.php" class="iq-sub-card setting-dropdown">
                                             <div class="media align-items-center">
                                                <div class="right-icon">
                                                   <i class="ri-logout-circle-line text-primary"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                   <h6 class="mb-0 ">Logout</h6>
                                                </div>
                                             </div>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </nav>
                     <div class="nav-overlay"></div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- Header End -->
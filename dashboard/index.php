<!doctype html>
<html lang="en">
<head>
<?php
include 'includes/head.php';
?>

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
               
               <div class="col-lg-12">
                  <div class="iq-card iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-header">
                        <div class="iq-header-title">
                           <h4 class="card-title text-center">User's Of Product</h4>
                        </div>
                     </div>
                     <div class="iq-card-body pb-0">
                        <div id="view-chart-01">
                        </div>
                        <div class="row mt-1">
                           <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                              <div class="iq-card">
                                 <div class="iq-card-body">
                                    <div class="media align-items-center">
                                       <div class="iq-user-box bg-primary"></div>
                                       <div class="media-body text-white">
                                          <p class="mb-0 font-size-14 line-height">Users
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                              <div class="iq-card">
                                 <div class="iq-card-body">
                                    <div class="media align-items-center">
                                       <div class="iq-user-box bg-warning"></div>
                                       <div class="media-body text-white">
                                          <p class="mb-0 font-size-14 line-height">Posts
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                              <div class="iq-card">
                                 <div class="iq-card-body">
                                    <div class="media align-items-center">
                                       <div class="iq-user-box bg-info"></div>
                                       <div class="media-body text-white">
                                          <p class="mb-0 font-size-14 line-height">Category
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                              <div class="iq-card">
                                 <div class="iq-card-body">
                                    <div class="media align-items-center">
                                       <div class="iq-user-box bg-danger"></div>
                                       <div class="media-body text-white">
                                          <p class="mb-0 font-size-14 line-height">Comments
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
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
   <script>
   <?php 
   // Comment's
   $comment_count="SELECT COUNT(*) AS comment FROM comments";
   $comment_count_result=mysqli_query($db_connect,$comment_count);
   while($comment_count_row=mysqli_fetch_assoc($comment_count_result)){
   $comment_count=$comment_count_row['comment'];
   }
   // Post's
   $post_count="SELECT COUNT(*) AS posts FROM post";
   $post_count_result=mysqli_query($db_connect,$post_count);
   while($post_count_row=mysqli_fetch_assoc($post_count_result)){
   $post_count=$post_count_row['posts'];
}
   // Category's
   $category_count="SELECT COUNT(*) AS category FROM category";
   $category_count_result=mysqli_query($db_connect,$category_count);
   while($category_count_row=mysqli_fetch_assoc($category_count_result)){
   $category_count=$category_count_row['category'];
}
   // User's
   $user_count="SELECT COUNT(*) AS user FROM users";
   $user_count_result=mysqli_query($db_connect,$user_count);
   while($user_count_row=mysqli_fetch_assoc($user_count_result)){
   $user_count=$user_count_row['user'];
   }
   ?>
if(jQuery('#view-chart-01').length){
       var options = {
          series:<?php echo "[$user_count, $post_count, $category_count, $comment_count]";?>,
          chart: {
        width: 250,
          type: 'donut',
        },
        colors:['#e20e02', '#f68a04', '#007aff','#545e75'],
        labels: ["Users", "Posts", "Category", "Comments"],
        dataLabels: {
          enabled: false
        },
        stroke: {
            show: false,
            width: 0
        },
        legend: {
            show: false,
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#view-chart-01"), options);
        chart.render();
      
      }
</script>
</body>
</html>
<footer class="mb-0">
         <div class="container-fluid">
            <div class="block-space">
               <div class="row">
                  <div class="col-lg-3 col-md-4">
                     <ul class="f-link list-unstyled mb-0">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Coporate Information</a></li>
                     </ul>
                  </div>
                  <div class="col-lg-3 col-md-4">
                     <ul class="f-link list-unstyled mb-0">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Help</a></li>
                     </ul>
                  </div>
                  <div class="col-lg-3 col-md-4">
                     <ul class="f-link list-unstyled mb-0">
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Cotact Us</a></li>
                        <li><a href="#">Legal Notice</a></li>
                     </ul>
                  </div>
                  <?php
                  include 'includes/db.php';
    $select_all_soc="SELECT * FROM social_media WHERE social_id =1 ";
    $soc_result=mysqli_query($db_connect,$select_all_soc);
   while($soc_row=mysqli_fetch_assoc($soc_result)){
       $instagram=$soc_row['instagram'];
       $facebook=$soc_row['facebook'];
       $twitter=$soc_row['twitter'];
       $youtube=$soc_row['youtube'];
      }
      
    ?>
                  <div class="col-lg-3 col-md-12 r-mt-15">
                     <div class="d-flex">
                        <a target="_blank" href="<?php echo$facebook?>" class="s-icon">
                        <i class="ri-facebook-fill"></i>
                        </a>
                        <a target="_blank" href="<?php echo$instagram?>" class="s-icon">
                        <i class="ri-instagram-fill"></i>
                        </a>
                        <a target="_blank" href="<?php echo$twitter?>" class="s-icon">
                        <i class="ri-twitter-fill"></i>
                        </a>
                        <a target="_blank" href="<?php echo$youtube?>" class="s-icon">
                        <i class="ri-youtube-fill"></i>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="copyright py-2">
            <div class="container-fluid">
               <p class="mb-0 text-center font-size-14 text-body">STREAMIT &copy - <?php echo date("Y");?> All Rights Reserved</p>
            </div>
         </div>
      </footer>
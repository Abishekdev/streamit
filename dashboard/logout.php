<?php 
setcookie('admin_email', '', time()-1000);
setcookie('admin_token', '', time()-1000);
header("location:login.php");


?>
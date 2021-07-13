<?php 
setcookie('email', '', time()-1000);
setcookie('token', '', time()-1000);
header("location:login.php");


?>
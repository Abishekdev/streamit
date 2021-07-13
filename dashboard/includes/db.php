<?php

$db_connect = mysqli_connect("localhost","root","","streamit");

if(!$db_connect){
    echo"<script>alert('Database Connection Error !! Please Contact Admin Abishek9442@gmail.com');</script>";
    die();
    }
    
?>
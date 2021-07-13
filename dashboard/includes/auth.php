<?php
function login($email,$user_email,$password,$user_password,$remember,$token){ 
    include 'includes/db.php';            
             if(isset($_POST['submit'])){
                $email=$_POST['user_email'];
             $password=$_POST['user_password'];
             
 
             $select_all_users="SELECT * FROM users WHERE user_email='$email'";
             $select_user_result=mysqli_query($db_connect,$select_all_users);
             while($user_row=mysqli_fetch_assoc($select_user_result)){
                $user_email=$user_row['user_email'];
                $user_password=$user_row['user_password'];
                $user_role=$user_row['user_role'];
                
                
             }
             
            if($email===$user_email && $password===$user_password&& $user_role=='admin'){
               
                header('location:index.php');
             }elseif($email!==$user_email && $password!==$user_password){
               header("location:login.php?error=3");
            }elseif($email!==$user_email){
               header('location:login.php?error=1');
            }elseif($password!==$user_password){
               header("location:login.php?error=2");
            }if($user_role=='user'){
               header('location:../login.php');
            }

 $token = $password;
    if($remember!==''){
             
          setcookie('admin_email', $user_email, "/dashboard"); 
             setcookie('admin_token', $token, "/dashboard");
         } else{
             setcookie('admin_email', $user_email, time()+(28*24*60*60), "/dashboard");
             setcookie('admin_token', $token, time()+(28*24*60*60), "/dashboard");
         }
     
             }
 
             
    
    }
    function loggedin(){

      $cok_email=$_COOKIE['admin_email'];
      $cok_password=$_COOKIE['admin_token'];
      //without email check
      if(!isset($cok_email) or !isset($cok_password))
             {
               setcookie('email', '', time()-1000);
               setcookie('token', '', time()-1000);
            header("location:login.php");
            }
     if(isset($_COOKIE['admin_email']))
     {
         include 'includes/db.php';
      $select_all_users="SELECT * FROM users WHERE user_email ='".$cok_email."'";
      $select_user_result=mysqli_query($db_connect,$select_all_users);
      $user_row=mysqli_fetch_assoc($select_user_result);{
         $user_email=$user_row['user_email'];
         $user_password=$user_row['user_password'];
         $user_role=$user_row['user_role'];
      
      }
      //not a user check and email and token match check 

      if($user_role=='user' or $user_email!=$cok_email or $user_password!=$cok_password or $cok_email=='' or $cok_password=='')
       {
         setcookie('admin_email', '', time()-1000);
         setcookie('admin_token', '', time()-1000);
      header("location:login.php");
      }
   }
}
 ?>
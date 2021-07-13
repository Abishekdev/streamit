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
            }
            if($email===$user_email&&$password===$user_password){
               
               header('location:index.php');
            }else{
              header("location:login.php?error=3");
           }
           if($password!==$user_password){
              header("location:login.php?error=2");
           }
           if($email!==$user_email){
              header('location:login.php?error=1');
           }
           
            
$token = $password;
   if($remember!==''){
			
         setcookie('email', $user_email); 
			setcookie('token', $token);
		} else{
			setcookie('email', $user_email, time()+(28*24*60*60));
			setcookie('token', $token, time()+(28*24*60*60));
		}
	
            }

            
   
   }
         function signup($user_name,$user_bio,$user_email,$user_password,$user_gender,$user_language){
           include 'includes/db.php';
            if(isset($_POST['submit'])){
            
               // file
               $filename = $_FILES['user_profile']['name'];
                     $filetmpname = $_FILES['user_profile']['tmp_name'];
                     $folder = 'uploads/profile/';
                     move_uploaded_file($filetmpname, $folder.$filename);
                     $img="$folder$filename";
            
                     $user_name=$_POST['user_name'];
                     $user_bio=$_POST['user_bio'];
                     $user_email=$_POST['user_email'];
                     $user_password=$_POST['user_password'];
                     $user_gender=$_POST['user_gender'];
                     $user_language=$_POST['user_language'];
                     $create_user_query="INSERT INTO `users` (`user_name`, `user_bio`, `user_email`, `user_password`,`user_gender`,`user_language`,`user_profile`,`user_role`) VALUES ('$user_name', '$user_bio', '$user_email', '$user_password', '$user_gender', '$user_language', '$img','user');";
                     $create_user_result=mysqli_query($db_connect,$create_user_query);
                     header('location:login.php');
            
                  }
         }
         
         function loggedin(){

            $cok_email=$_COOKIE['email'];
            $cok_password=$_COOKIE['token'];
            if(!isset($cok_email) or !isset($cok_password))
             {
               setcookie('email', '', time()-1000);
               setcookie('token', '', time()-1000);
            header("location:login.php");
            }
           if(isset($_COOKIE['email'])){ 
              include 'includes/db.php';
            $select_all_users="SELECT * FROM users WHERE user_email ='".$cok_email."'";
            $select_user_result=mysqli_query($db_connect,$select_all_users);
            $user_row=mysqli_fetch_assoc($select_user_result);{
               $user_email=$user_row['user_email'];
               $user_password=$user_row['user_password'];
            
            }
            if($user_email!=$cok_email or $user_password!=$cok_password or !isset($cok_email) or !isset($cok_password))
             {
               setcookie('email', '', time()-1000);
               setcookie('token', '', time()-1000);
            header("location:login.php");
            }
         }
      }
?>        

<?php
	session_start(); 
   include "../dbh.php";
   
   // user inputs
   $uid = $_POST['uid'];
   $pwd = $_POST['pwd'];


   //dehashing password
   $sql = "SELECT * FROM user WHERE uid='$uid'";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);
   $hash_pwd = $row['pwd'];
   $hash = password_verify($pwd, $hash_pwd);


   //if has returns false send back to index page

   if($hash == 0) {

      header("Location: ../index.php?error=password");

   } else {

       // else query database ps $hash_pwd instead of $pwd

      $sql = "SELECT * FROM user WHERE uid = '$uid' AND pwd = '$hash_pwd' ";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

      if(!$row) {

         header("Location: ../index.php?error=password");

      } else {

         $_SESSION['id'] = $row['id'];
         header("Location: ../welcome.php");
      }
    
 
   }




 ?>
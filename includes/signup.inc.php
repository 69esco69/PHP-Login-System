<?php
 session_start(); 

  include "../dbh.php";

  //user inputs
  $first = $_POST['first'];
  $last = $_POST['last'];
  $uid = $_POST['uid'];
  $pwd = $_POST['pwd'];


  // checking if there are empty fields
  if(empty($first)) {
  	header("Location: ../signup.php?error=empty");
  	exit();
  }
  if(empty($last)) {
  	header("Location: ../signup.php?error=empty");
  	exit();
  }

  if(empty($uid)) {
  	header("Location: ../signup.php?error=empty");
  	exit();
  }

  if(empty($pwd)) {

  	header("Location: ../signup.php?error=empty");

  	exit();
  }

  else {
   // checking if there is an existing username
   $sql = "SELECT uid FROM user WHERE uid ='$uid'";
   $result = mysqli_query($conn, $sql);
   $uidcheck = mysqli_num_rows($result);
   
   //if uidcheck returns true(1) or > 0 then indicate error=username


  	if($uidcheck > 0) {

               header("Location: ../signup.php?error=username");
               exit();

  	} else {
  		
		  //query database
  		  $encryted_password = password_hash($pwd, PASSWORD_DEFAULT);

		  $sql = "INSERT INTO user (first, last, uid, pwd) VALUES ('$first', '$last', '$uid', '$encryted_password')";

		  $result = mysqli_query($conn, $sql);

		 header("Location: ../index.php");
		  	}

  

  }

 

 ?>
<?php 
    session_start();
    include_once "../dbh.php";


	if(isset($_POST['userSubmit'])) {

		$uid = $_POST['uid'];
		$pwd = $_POST['pwd'];

		//query database

		$sql = "SELECT * FROM user  WHERE uid='$uid' AND pwd ='$pwd'";

		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		
		if($resultCheck > 0 ) {

			$row = mysqli_fetch_assoc($result);
			$_SESSION['id'] = $row['id'];
			$_SESSION['first'] = $row['first'];

			//fetch datafrom profile image

			$sql = "SELECT * FROM profileImg WHERE userid= '".$_SESSION['id']."' ";

			$result = mysqli_query($conn, $sql);

			$row = mysqli_fetch_assoc($result);

			$_SESSION['status'] = $row['status'];

			header("Location: ../index.php");
		} else {
			header("Location: ../index.php?errordetails");
		}

	}
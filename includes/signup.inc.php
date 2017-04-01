<?php
	session_start();
	include_once "../dbh.php";

	if(isset($_POST['submit'])) {

		$first = $_POST['first'];
		$last = $_POST['last'];
		$uid = $_POST['uid'];
		$pwd = $_POST['pwd'];

		//query database

		$sql = "INSERT INTO user (first, last, uid, pwd) VALUES('$first', '$last', '$uid', '$pwd')";
        mysqli_query($conn, $sql);

        //set status to zero

        $sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$pwd'";

        $result = mysqli_query($conn, $sql);

        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0) {
        	$row = mysqli_fetch_assoc($result);

        	$id = $row['id'];
        	$status = 0;
        	
        	$sqlPf = "INSERT INTO profileImg(userid, status) VALUE('$id', '$status')";
        	$reslutPf = mysqli_query($conn, $sqlPf);


        }

		header("Location: ../index.php?usersignedup");

	}
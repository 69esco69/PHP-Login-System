<?php 
   session_start();
   include_once "../dbh.php";
   $id = $_SESSION['id'];
	if(isset($_POST['uploadSubmit'])) {
		$file = $_FILES['file'];

		//extract file information
		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileError = $_FILES['file']['error'];
		$fileSize = $_FILES['file']['size'];
		$fileType = $_FILES['file']['type'];

		//get file extention

		$fileExt = explode('.', $fileName);
		$fileExtAct = strtolower(end($fileExt));

		$allowed = array('pdf', 'jpg', 'jpeg', 'png');

		if(in_array($fileExtAct, $allowed)) {
			
			if($fileError == 0) {
					$fileNameNew = $id.".".$fileExtAct;
					$fileDestination = "../profiles/".$fileNameNew;
					echo $fileDestination;
					move_uploaded_file($fileTmpName, $fileDestination);

					//update status

					$sql = "UPDATE profileimg set status = 1 WHERE userid='$id' ";

					$result = mysqli_query($conn, $sql);


					header("Location: ../index.php?uploadsuccess");
			} else {
				echo "There was a problem uploading file";

			}


		} else {

			echo "file type not allowed";
			header("Location: ../index.php?errorfiletype");
		}

       
	} 
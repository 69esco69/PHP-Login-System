<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Escoville</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<header>
		<nav>
			<a href="index.php">Home</a>
			<?php
                if(isset($_SESSION['id'])){
                	echo "<form action='includes/logout.inc.php' method='post' class='logout'>
       <div class='button-wrap'>
         
         <button type='submit'>Logout</button>
       </div>

    </form>";
                } else {
                	echo "<a href='signup.php'>signup</a>";
                }
			 ?>
			
		</nav> 	

	</header>

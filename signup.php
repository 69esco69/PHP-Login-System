<?php 
 include "header.php";

 ?>


 <form action='includes/signup.inc.php' method='POST'>
 		
 		<input type='text' name='first' placeholder='First Name'>
 		<input type='text' name='last' placeholder='Last Name'>
 		<input type='text' name='uid' placeholder='Username'>
 		<input type='password' name='pwd' placeholder='password'>
 		<button type='submit' name='submit'>Signup</button>
 </form>
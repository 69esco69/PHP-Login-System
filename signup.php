<?php 

 include "header.php";


 ?>
     <?php 

       $url = $_SERVER['REQUEST_URI'];
    

       if(strpos($url, 'error=empty') !== false){
       	echo "<p class='pCenter'>Please Fill out all Fields</p>";
       } elseif(strpos($url, 'error=username') !== false) {
       		echo "<p class='pCenter'>Usrname already Exist</p>";
       }

      ?>
  <!--====  signup form =======-->
    <form action='includes/signup.inc.php' method='post'>
       <input type='text' name='first' placeholder='First Name'>
       <input type='text' name='last' placeholder='Last Name'>
       <input type='text' name='uid' placeholder='Username'>
       <input type='password' name='pwd' placeholder='Password'>
       <div class='button-wrap'>
         
         <button type='submit'>Sign Up</button>
       </div>

    </form>  

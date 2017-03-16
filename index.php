<?php 

   include "header.php";

 ?>
  
  <?php 

       
        //show login form in user is not logged in and show Welcome message if usere logged in well
        if(isset($_SESSION['id'])) {
          //user already logged in
          echo "<p class='pCenter'>Welcome Home Section</p>";

        } else {
          //title 
          echo "<p class='pCenter'>Please Sign In</p>";

          //error handling 
          $url = $_SERVER['REQUEST_URI'];
       if(strpos($url, 'error=password') !== false) {
          echo "<p class='pMini'>Plase Check details and try Again</p>";
       } 

          // show the loginform 
          echo "<form action='includes/login.inc.php' method='post'>
       <input type='text' name='uid' placeholder='Username'>
       <input type='password' name='pwd' placeholder='Password'>
       <div class='button-wrap'>
         
         <button type='submit'>Login</button> 
       </div>";
        }
     ?>



    </form>  

    <!--====  end signup form=======-->


  


</body>
</html>
  <?php 
    include "header.php";

   ?>

   <!--==== check errors  =======-->

  <?php 



   ?>


  <!--==== login check=======-->

  <?php 

    if(isset($_SESSION['id'])) {

        echo "<p>Welcome ".$_SESSION['first']."</p>";

        $id = $_SESSION['id'];

        //query database

        $sql = "SELECT * FROM user WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {

           while($row = mysqli_fetch_assoc($result)) {

            $sql = "SELECT * FROM profileimg WHERE userid='$id'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                  $status = $row['status'];
                  echo "<div class='profile'>";
               if($_SESSION['status'] == 0) {
                      echo "<img src='profiles/defaultProfile.jpg'>";              
               } else {

                      echo "<img src='profiles/".$_SESSION['id'].".jpg'>";  
               }
              
            echo "</div>"; // end of profile
            }
            
            

            
            

           }
           

        }

    
    //check for file type error    
    $url = $_SERVER['REQUEST_URI'];
    
    if(strpos($url, 'errorfiletype') !== false) {
      echo 'Please Check file type and try again';
    } 
        echo "<form action='includes/upload.inc.php' method='POST' enctype='multipart/form-data'>
         <input type='file' name='file' >
         <button type='submit' name='uploadSubmit'>Upload</button>
       </form>";

          echo "<form action='includes/logout.inc.php' method='POST'>
          
          <button type='submit' name='loginSubmit'>Logout</button>
        </form>
        ";


    } else {
      
      echo "Login";
      echo "<form method='POST' action='includes/login.inc.php'>
          
          <input type='text' name='uid' placeholder='Username'>
          <input type='password' name='pwd' placeholder='Password'>
          <button type='submit' name='userSubmit'>login</button>
      </form>";



   echo "<a href='signup.php'>Signup</a>";
    }
   ?>

  


     

  <!--====  end error checks=======-->
 


 

</body>
</html>
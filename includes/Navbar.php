<?php
require_once('config.php');
require_once('core/controller.Class.php');
?>


 <!-- header design -->
  <header id="header">
  
    <nav class="navbar navbar-expand-lg navigation-wrap">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="image/logo.png" width="120" height="110"></a>
          
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
          aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-stream navbar-toggler-icon"></i>
        </button>
       <div>
        <div> <?php
               //From Signup page
               if (isset($_SESSION['userId'])) 
                 {
             echo "<p id='welcome'>Welcome:&nbsp;" .ucfirst($_SESSION['userUid']) ."&nbsp;<span>&#128591;&#127995;</span></p>";
                 }
               // From google
                   else if(isset($_COOKIE['idUsers']) && isset($_COOKIE['sess'])){
            $Controller = new Controller;
            if($Controller -> checkUserStatus($_COOKIE['idUsers'], $_COOKIE['sess']))
                  {
                  
                   $db = new Connect;
              $user = $db -> prepare('SELECT uidUsers FROM users where idUsers='.$_COOKIE['idUsers']);
              $user -> execute();
                while($userInfo = $user -> fetch(PDO::FETCH_ASSOC)){

                echo "<p id='welcome'>Welcome:&nbsp;" .ucfirst($userInfo["uidUsers"]) ."&nbsp;<span>&#128591;&#127995;</span></p>";
                }
              
            
              }
            }
           ?>
           </div>
        <div class="collapse navbar-collapse" id="navbarText">
         
        
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

            <li class="nav-item">
              <a class="nav-link"  href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="recipes.php" >Recipes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#testimonial">Reviews</a>
            </li>
            <?php
  
            if (isset($_SESSION['userId']))
              {
               echo '<li class="nav-item">
              <a class="nav-link" href="includes/logout.inc.php"><i class="fas fa-user"></i> Logout</a>
            </li>';}
            
            else if(isset($_COOKIE['idUsers']) && isset($_COOKIE['sess'])){
            $Controller = new Controller;
            if($Controller -> checkUserStatus($_COOKIE['idUsers'], $_COOKIE['sess']))
                  {
                
                
                //echo $Controller -> printData(intval($_COOKIE['idUsers']));
                echo '<li class="nav-item">
              <a class="nav-link" href="logoutGoogle.php"><i class="fas fa-user"></i> Logout</a>
            </li>';
                }
            
            }

            else{
            echo '<li class="nav-item">
              <a class="nav-link" href="login.php"><i class="fas fa-user"></i> Login/Sign up</a>
            </li>';
            }?>
          </ul>
        </div>
      </div>
      </div>
    </nav>

    <span class="nav-indicator"></span>
  </header>
  

 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

<script src="js/main.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 -->


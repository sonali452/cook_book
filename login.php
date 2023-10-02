
<?php
session_start();
?>

<?php
include 'links/links.php';
?>


<?php
require_once('config.php');
require_once('core/controller.Class.php');
?>


<?php
  include 'includes/Navbar.php';
?>


<div class="bg-img">
<div class="header-login">
<div class="signup-login">

       
   	
      <h1 id="head-login">Login</h1>
      <form action="includes/login.inc.php" method="post">
	<input type="text" name="mailuid" placeholder="Username/Email..."><br>
	<input type="password" name="pwd" placeholder="Password..."><br>
	<button type="submit" name="login-submit">Login</button><br>	
	</form>

    <?php
      
      if (isset($_GET['error'])) 
         {
            if($_GET['error']=="emptyfields")
            {
               echo '<p class="signuperror">Fill in all fields!</p>';
            }
            else if ($_GET['error']=="sqlerror") 
            {
               echo '<p class="signuperror">Invalid username and e-mail!</p>';
            }
   
            else if ($_GET['error']=="nouser") 
            {
               echo '<p class="signuperror">No User Found!</p>';
            }
            else if ($_GET['error']=="wrongpwd") 
            {
               echo '<p class="signuperror">The Password is incorrect</p>';
            }
         }
         ?>  
    
     

</div>
</div>

   <p class="or">OR</p>
   <form action="" method="POST">
   <button onclick="window.location = '<?php echo $signup_url; ?>'" type="button" name="signup-google" class="google"><i class="fa fa-google" aria-hidden="true"></i> &nbsp;&nbsp;Login with Google</button>
   </form>
   <p align='center' class='signuplink'>Don't Have an account?<a href='signup.php'> Sign up here</a></p>
  
 
<br>
<br>



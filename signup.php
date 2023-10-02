<?php

session_start();
?>


<?php
include 'links/links.php';
?>

<?php
require_once('config.php');
?>


<?php
  include 'includes/Navbar.php';
?>


<div class="bg-img">
<div class="signup">
	<div class="signup-login">
			<h1 id="head-signup">Create Account</h1> 
			<?php
			if (isset($_GET['error'])) 
			{
				if($_GET['error']=="emptyfields")
				{
					echo '<p class="signuperror">Fill in all fields!</p>';
				}
				else if ($_GET['error']=="invaliduidmail") 
				{
					echo '<p class="signuperror">Invalid username and e-mail!</p>';
				}
				else if ($_GET['error']=="invaliduid") 
				{
					echo '<p class="signuperror">Invalid username!</p>';
				}
				else if ($_GET['error']=="invalidmail") 
				{
					echo '<p class="signuperror">Invalid  e-mail!</p>';
				}
                
				else if($_GET['error']=="emailexist")
				{
					echo '<p class="signuperror">Email already exists!</p>';
				}

				else if ($_GET['error']=="passwordcheck") 
				{
					echo '<p class="signuperror">Your passwords do not match!</p>';
				}
				else if ($_GET['error']=="usertaken") 
				{
					echo '<p class="signuperror">Username is already taken!</p>';
				}
			}
				else if (isset($_GET['signup'])=="success")
				{
				  
			      header ("Location: login.php");
                 
				}
                
               
				
		   ?>
<div class="signup-form">
			<form action="includes/signup.inc.php" method="post">
				<input type="text" name="uid" placeholder="Username" required><br>
				<input type="text" name="mail" placeholder="Email" required><br>
				<input type="password" name="pwd" placeholder="Password"><br>
				<input type="password" name="pwd-repeat" placeholder="Repeat Password"><br>
				<button type="submit" name="signup-submit">Sign up</button>
			</form>
</div>
</div>
</div>


<p class="or">OR</p>

<!-- <form action="" method="POST">
<button onclick="window.location = ''" type="button" name="signup-google" class="google"><i class="fa fa-google" aria-hidden="true"></i> &nbsp;&nbsp;Sign up with Google</button>
</form> -->
<!-- include ('signupGoogle.php');  -->

<p align="center" class="login">Have an account?<a href="login.php"> Login</a></p>



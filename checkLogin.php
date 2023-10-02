<?php
require "login.php";
?>

<div>
	<?php
	
	if (isset($_SESSION['userId'])) 
	{
		//header('Location: index.php');
		//echo '<p class="login-status">You are logged in !</p>';
	}
	else
	{
		
       if(!isset($_GET['error']))
       {
          //header('Location: index.php');
       }

		//header('Location: index.php');
		//echo '<p class="login-status">You are logged out!</p>';
	    
	}

	?>
</div>

<?php
if (isset($_POST['signup-submit'])) 
{
	require 'dbh.inc.php';

	$username=$_POST['uid'];
	$email=$_POST['mail'];
	$password=$_POST['pwd'];
	$passwordRepeat=$_POST['pwd-repeat'];

	//$token=bin2hex(random_bytes(15));

	if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat))
	{
		header("Location: ../signup.php?error=emptyfields&uid=".$username. "&mail=".$email);
	exit();
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username))
	{
      	header("Location: ../signup.php?error=invalidmailuid");
		exit();
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		header("Location: ../signup.php?error=invalidmail&uid=".$username);
		exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9]*$/", $username))
	{
		header("Location: ../signup.php?error=invaliduid&mail=".$email);
		exit();
	}
	
	else if ($password!==$passwordRepeat) 
	{
		header("Location: ../signup.php?error=passwordcheck&uid=".$username. "&mail=".$email);
		exit();
	}
	else
	{
	   $sql="SELECT uidUsers FROM users WHERE uidUsers=?";
	   $stmt=mysqli_stmt_init($conn);
	   if (!mysqli_stmt_prepare($stmt, $sql)) 
	   {
	   	 header("Location: ../signup.php?error=sqlerror");
	   	 exit();
	   }
	   else
	   {
	   	mysqli_stmt_bind_param($stmt, "s", $username);
	   	mysqli_stmt_execute($stmt);
	   	mysqli_stmt_store_result($stmt);
	   	$resultCheck=mysqli_stmt_num_rows($stmt);
	   	$emailquery = "SELECT * from users where emailUsers='$email'";
                   $query = mysqli_query($conn,$emailquery);
                 $emailcount = mysqli_num_rows($query);


	   	if ($resultCheck>0) 
	   	{
	   		header("Location: ../signup.php?error=usertaken&mail=".$email);
	   	    exit();
	   	}
	   	 
	   	 else if($emailcount>0)
    {
    	header("Location: ../signup.php?error=emailexist&uidUsers=".$username);
    	exit();
    }

	   	
	   	else
	   	{
	   		$sql="INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
	   		$stmt=mysqli_stmt_init($conn);
	   		if (!mysqli_stmt_prepare($stmt, $sql)) 
	   {
	   	 header("Location: ../signup.php?error=sqlerror");
	   	 exit();
	   }
	   else
	   {
  		$hashedPwd=password_hash($password, PASSWORD_DEFAULT);

	   	mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
	   	mysqli_stmt_execute($stmt);
	   	
	   	 

         $subject="Account Created";
         $body= "Hi, $username. Your account has been created in DIY Kitchen Diaries. Please Login into your account.";
         $sender="From: diarieskitchen21@gmail.com";

         
        if(mail($email, $subject, $body, $sender));
          {
           header("Location: ../signup.php?signup=success");
           exit();
          }

        
	   }
	   	}
	   }
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else
{
	 header("Location: ../signup.php");
	   	 exit();
}
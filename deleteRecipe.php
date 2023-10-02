<?php
session_start();
?>

<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<?php
require_once('config.php');
require_once('core/controller.Class.php');
?>

<?php
include 'links/links.php';
?>

<?php
include 'includes/Navbar.php';
?>


<?php
include 'includes/dbh.inc.php';
?>



<?php

   
            if(isset($_POST['delete']))
    {
       $dishid=$_POST['del'];

    }
         
    $query1="SELECT * FROM usersrecipe WHERE dish_id=$dishid";
    $queryfire1=mysqli_query($conn, $query1);
    $num1=mysqli_num_rows($queryfire1);
    if ($num1>0)
       {
      $product2=mysqli_fetch_array($queryfire1);
       $query2= "DELETE FROM usersrecipe WHERE dish_id=$dishid ";
        
          $queryfire2=mysqli_query($conn, $query2); 
   
    }

    header('Location: myRecipes.php?delete=success');
  ?>


    
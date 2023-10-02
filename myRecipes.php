<?php
session_start();
?>


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

if (isset($_GET['delete'])=="success")
 {
  echo '<script>alert("Your recipe is successfully deleted!");</script>';
 }
?>



 
<!-- <p><button onclick="goBack()" class="main-btn mt-4" style="margin-left: 2%;">Back</button> -->

 
<h1 style=" text-align: center; color: #f7931e; margin-top: -4.5%; margin-bottom: -2%;">My Recipes</h1></p>


 <section id="recipes">
       <div class="recipes-section wrapper">
       <div class="container">
<div class="row row-cols-1 row-cols-md-3 g-4">


<?php
if (isset($_SESSION['userId']))
{

    $sql="SELECT * FROM usersrecipe where userid=".$_SESSION['userId'];
    $queryfire=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($queryfire);
    if ($num>0){
    	while ($row=mysqli_fetch_array($queryfire)){
    ?>

   
  <div class="col">
    <div class="card h-100">
      <img src="<?php echo 'picUpload/'.$row['photo'];?>" class="card-img-top" alt="..." style="width: 100%; height: 300px;">
      <div class="card-body">
        <h3 class="card-title"><?php echo $row['dish']; ?></h3>
        <ul class="fdul">
          <li class="fd">
            <form action="fullRecipe.php" method="POST" enctype="multipart/form-data">
        <a href="fullRecipe.php?myrecipe=<?php echo $row['dish_id'] ?>"><button class="main-btn mt-4" name="myrecipe" type="button">Full Recipe</button></a>
      </form>
    </li>
          <li class="fd">
        <form action="deleteRecipe.php" method="POST" enctype="multipart/form-data" >
         <button class="main-btn mt-4"  type="submit"  name="delete" onclick="return confirm('Are you sure you want to delete this?');">Delete Recipe</button>
          <input type="hidden" name="del" value="<?php echo $row['dish_id']; ?>">
      </form>
    </li>
      </div>
     
    </div>
  </div>

    <?php
    }

}

  }

?>

 <?php
  if(isset($_COOKIE['idUsers']) && isset($_COOKIE['sess'])){
            $Controller = new Controller;
            if($Controller -> checkUserStatus($_COOKIE['idUsers'], $_COOKIE['sess']))
                  {
                      $sql="SELECT * FROM usersrecipe where userid=".$_COOKIE['idUsers'];
    $queryfire=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($queryfire);
    if ($num>0){
    	while ($row=mysqli_fetch_array($queryfire)){
    ?>

   
  <div class="col">
    <div class="card h-100">
      <img src="<?php echo 'picUpload/'.$row['photo'];?>" class="card-img-top" alt="..." style="width: 100%; height: 300px;">
      <div class="card-body">
        <h3 class="card-title"><?php echo $row['dish']; ?></h3>
        <ul class="fdul">
          <li class="fd">
        <form action="fullRecipe.php" method="POST" enctype="multipart/form-data">
        <a href="fullRecipe.php?myrecipe=<?php echo $row['dish_id'] ?>"><button class="main-btn mt-4" name="myrecipe" type="button">Full Recipe</button></a>
      </form>
    </li>
          <li class="fd">
        <form action="deleteRecipe.php" method="POST" enctype="multipart/form-data" >
         <button class="main-btn mt-4"  type="submit"  name="delete" onclick="return confirm('Are you sure you want to delete this?');">Delete Recipe</button>
          <input type="hidden" name="del" value="<?php echo $row['dish_id']; ?>">
      </form>
    </li>
      </div>
     
    </div>
  </div>

    <?php
    }

   }
  }
}
?>

 </div>
</div>
</div>
</section>
</form>
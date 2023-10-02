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



<div class="uploadRecipes">
  <ul>

   <li style="float: left;">
    <div class="search-container">
    <form action="search.php" method="post">
    <input type="search" placeholder="Find recipes..." name="search">
    <button type="submit" name="submit-search"><i class="fa fa-search" style="margin-left: 3px;"></i></button>
  </form>
</div>
   </li>
  
<li>
 <?php
  if (isset($_SESSION['userId']))
{
   echo '<form action="myRecipes.php" method="POST">';
   echo '<a href="myRecipes.php"><button type="button" name="uploadRecipes"> My Recipes </button></a>';
   echo '</form>';

 }


else if(isset($_COOKIE['idUsers']) && isset($_COOKIE['sess'])){
$Controller = new Controller;
if($Controller -> checkUserStatus($_COOKIE['idUsers'], $_COOKIE['sess']))
{
                
                
//echo $Controller -> printData(intval($_COOKIE['idUsers']));
 echo '<form action="myRecipes.php" method="POST">';
   echo '<a href="myRecipes.php"><button type="button" name="uploadRecipes"> My Recipes </button></a>';
   echo '</form>';
                }
            
            }

?>
</li>

<li>
 <?php
  if (isset($_SESSION['userId']))
{
   echo '<form action="uploadRecipes.php" method="POST">';
   echo '<a href="uploadRecipes.php"><button type="button" name="uploadRecipes"> Upload Recipes </button></a>';
   echo '</form>';

 }


 else if(isset($_COOKIE['idUsers']) && isset($_COOKIE['sess'])){
$Controller = new Controller;
if($Controller -> checkUserStatus($_COOKIE['idUsers'], $_COOKIE['sess']))
{
                
                
//echo $Controller -> printData(intval($_COOKIE['idUsers']));
 echo '<form action="uploadRecipes.php" method="POST">';
   echo '<a href="uploadRecipes.php"><button type="button" name="uploadRecipes"> Upload Recipes </button></a>';
   echo '</form>';
                }
            
            }

?>
</li>

  <li>
    <form action="findRecipe.php" method="post">
  <a href="findRecipe.php"><button type="button" name="FindRecipes"> Find Recipes with your ingredients </button></a> 
</form>
 </li>


</ul>
</div>




<br>
<br>
<br>


<!-- section-3 recipes-->
<section id="recipes">
      
       <div class="recipes-section wrapper">
       <div class="container">
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="image/img/momo.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h3 class="card-title">MOMO</h3>
        <p class="card-text">Make some delicious momos seeing recipes.</p>
        <button class="main-btn mt-4">Full Recipe</button>
      </div>
     
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="image/img/momo.jpg" class="card-img-top" alt="...">
     <div class="card-body">
        <h3 class="card-title">MOMO</h3>
        <p class="card-text">Make some delicious momos seeing recipes.</p>
        <button class="main-btn mt-4">Full Recipe</button>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="image/img/momo.jpg" class="card-img-top" alt="...">
     <div class="card-body">
        <h3 class="card-title">MOMO</h3>
        <p class="card-text">Make some delicious momos seeing recipes.</p>
        <button class="main-btn mt-4">Full Recipe</button>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="image/img/momo.jpg" class="card-img-top" alt="...">
     <div class="card-body">
        <h3 class="card-title">MOMO</h3>
        <p class="card-text">Make some delicious momos seeing recipes.</p>
        <button class="main-btn mt-4">Learn More</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</section>

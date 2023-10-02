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

<section id="recipes">
       <div class="recipes-section wrapper">
       <div class="container">
<div class="row row-cols-1 row-cols-md-3 g-4">

<?php
   if(isset($_POST['submit-search'])){
      $search=mysqli_real_escape_string($conn, $_POST['search']);
      $sql="SELECT * FROM usersrecipe LEFT OUTER JOIN ingredients ON usersrecipe.dish_id=ingredients.dish_id LEFT OUTER JOIN  videos ON usersrecipe.dish_id=videos.dish_id WHERE dish LIKE '%$search%' OR ing1 LIKE '%$search%' OR ing2 LIKE '%$search%' OR ing3 LIKE '%$search%' OR ing4 LIKE '%$search%' OR ing5 LIKE '%$search%' OR ing6 LIKE '%$search%' OR ing7 LIKE '%$search%' OR ing8 LIKE '%$search%' OR ing9 LIKE '%$search%' OR ing10 LIKE '%$search%' OR ing11 LIKE '%$search%' OR ing12 LIKE '%$search%' OR ing13 LIKE '%$search%' OR ing14 LIKE '%$search%' OR ing15 LIKE '%$search%' OR ing16 LIKE '%$search%' ";
      $result=mysqli_query($conn, $sql);
      $queryResult=mysqli_num_rows($result);
     
      
      // echo  '<div style="font-size: 20px; color: #f7931e;"';
      // echo  '<p>';
      echo "".$queryResult." results!";
      // echo  '</p>';
      // echo  '</div>';
      // echo '<br>';
      // echo '<br>';
      // echo '<br>';
      // echo '<br>';
      // echo '<br>';
      

      if($queryResult>0){
         while($row=mysqli_fetch_assoc($result)){
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
     </div>
     
    </div>
  </div>
     <?php
         }
      }else{
      	   echo  '<p style="font-size: 20px; color: #f7931e; text-align: center; margin-left: 360px;">';
        echo "Sorry!!No results found!!";
        echo  '</p>';
      }
   }



?>

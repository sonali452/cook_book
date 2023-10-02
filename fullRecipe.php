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


<!-- <button onclick="goBack()" class="main-btn mt-4" style="margin-left: 2%;">Back</button> -->


<?php
$conn=mysqli_connect('localhost','root');
mysqli_select_db($conn, 'cookbook_db');

    if(isset($_GET['myrecipe']))
    {
       $dishid=$_GET['myrecipe'];
        $sql=$conn->prepare("select 
         usersrecipe.dish,usersrecipe.dish_id,usersrecipe.directions,usersrecipe.photo,ingredients.ing1,ingredients.ing2,ingredients.ing3,ingredients.ing4,ingredients.ing5,ingredients.ing6,ingredients.ing7,ingredients.ing8,ingredients.ing9,ingredients.ing10,ingredients.ing11,ingredients.ing12,ingredients.ing13,ingredients.ing14,ingredients.ing15,ingredients.ing16,videos.name,videos.location,users.idUsers,users.uidUsers
         FROM 
         usersrecipe LEFT OUTER JOIN users ON usersrecipe.userid=users.idUsers LEFT OUTER JOIN  videos ON usersrecipe.dish_id=videos.dish_id LEFT OUTER JOIN ingredients ON usersrecipe.dish_id=ingredients.dish_id where usersrecipe.dish_id=?");
        $sql->bind_param('s',$dishid);
         $sql->execute();
          $result = $sql->get_result();
        $row = $result->fetch_assoc();
        $dish=$row['dish'];
        $photo=$row['photo'];
        $directions=$row['directions'];
        $ing1=$row['ing1'];
        $ing2=$row['ing2'];
        $ing3=$row['ing3'];
        $ing4=$row['ing4'];
        $ing5=$row['ing5'];
        $ing6=$row['ing6'];
        $ing7=$row['ing7'];
        $ing8=$row['ing8'];
        $ing9=$row['ing9'];
        $ing10=$row['ing10'];
        $ing11=$row['ing11'];
        $ing12=$row['ing12'];
        $ing13=$row['ing13'];
        $ing14=$row['ing14'];
        $ing15=$row['ing15'];
        $video=$row['name'];
        
       
     }

    else{
         echo ("error:" .mysqli_error($conn));

        }

    ?>

    <div class="displayContainer">
     <div class="display">
    
    <ul>
     <li>
    <h1><?php echo $dish; ?></h1>
     </li>
     <li>
   <img src="<?php echo 'picUpload/'.$photo;?>" class="displayImage"><br>
</li>
   <li>
  <span class="title">Ingredients:</span><br>
   <?php 
   echo $ing1."<br>";
   echo $ing2."<br>";
   echo $ing3."<br>";
   echo $ing4."<br>";
   echo $ing5."<br>";
   echo $ing6."<br>";
   echo $ing7."<br>";
   echo $ing8."<br>";
   echo $ing9."<br>";
   echo $ing10."<br>";
   echo $ing11."<br>";
   echo $ing12."<br>";
   echo $ing13."<br>";
   echo $ing14."<br>";
   echo $ing15."<br>";
   echo $ing16;
   ?>
</li>

<li>
   <?php
   if(!$video==NULL){
    $location=$row['location'];
     echo "<div style='margin-bottom: auto;'>
          <video src='".$location."' controls width='80%' height='60%' ></video></div>";
     }
     ?>
</li>

<li>
  <span class="title">Directions:</span><br>
   <?php
   echo $directions."<br>";
   ?>
</li>
</ul>
</div>
</div>


<script src="js/main.js"></script>
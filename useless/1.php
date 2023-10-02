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


<h1 style="text-align: center; color: #f7931e; margin-top: 1.5%;margin-bottom: -2%; font-size: 34px">Find Recipes with your available ingredients</h1><br><br>

 <div class="recipes" style="width: 50%;">
 	<form action="" method="post">
 <div class="field_wrapper">
            <div>
        <input type="text" name="ing[]" placeholder="Ingredient" value=""/>
        <span class="add_button"><a href="javascript:void(0);"  title="Add field">&nbsp;<button type="button" class="add" id="add" style="font-size: 15px;"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp; Add</button></a></span>
           </div>
           </div>

           <script type="text/javascript">
$(document).ready(function(){
    var x = 2; //Initial field counter is 2
    var maxField = 500; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
     //New input field html 
    
    
    //Once add button is clicked
    $(addButton).click(function(){
      var fieldHTML = '<div class="field_wrapper"><div><input type="text" name="ing[]" placeholder="Ingredient" value=""/><span class="remove_button"><a href="javascript:void(0);" >&nbsp;&nbsp;<button type="button" class="remove" style="font-size: 15px;"><i class="fa fa-minus-square" aria-hidden="true"></i>&nbsp; Remove</button></a></span></div></div>';
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>

	<button type="submit" name="find" style="width: 45%; margin-top: 12px;">Find Recipes</button>
</form>
</div>

 
<!-- ================================================================== -->

 <section id="recipes">
       <div class="recipes-section wrapper">
       <div class="container">
<div class="row row-cols-1 row-cols-md-3 g-4">
<?php
if(isset($_POST['find']))
{
  $count=count($_POST['ing']);
  $ingredient = $_POST['ing'];
  // for($i=0;$i<$count;$i++)
  // {
   // echo $ingredient[0]."<br>";
  // }
  $in1=$ingredient[0];
  $query="SELECT usersrecipe.dish,usersrecipe.dish_id,usersrecipe.directions,usersrecipe.photo,ingredients.ing1,ingredients.ing2,ingredients.ing3,ingredients.ing4,ingredients.ing5,ingredients.ing6,ingredients.ing7,ingredients.ing8,ingredients.ing9,ingredients.ing10,ingredients.ing11,ingredients.ing12,ingredients.ing13,ingredients.ing14,ingredients.ing15,ingredients.ing16,videos.name,videos.location FROM 
         usersrecipe LEFT OUTER JOIN ingredients ON usersrecipe.dish_id=ingredients.dish_id LEFT OUTER JOIN  videos ON usersrecipe.dish_id=videos.dish_id WHERE ingredients.ing1 LIKE '%{$in1}%'";
  $find=mysqli_query($conn,$query);
 //$find->execute();
$storeArray = Array();
  //$storeDish = Array();
  //$storeId = Array();
 while($row=mysqli_fetch_array($find, MYSQLI_ASSOC)){
  $storeDish=$row['dish'];
  $dishId=$row['dish_id'];
    $storeArray[$storeDish]=$row['ing1'];
    ?>
       <div class="col">
    <div class="card h-100">
      <img src="<?php echo 'picUpload/'.$row['photo'];?>" class="card-img-top" alt="..." style="width: 100%; height: 300px;">
      <div class="card-body">
        <h3 class="card-title"><?php echo $storeDish; ?></h3>
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
      // $c= count($dishId);
      //  for($j=0;$j<$c;$j++){
      //       echo $dishId[$j] ;}
        
      

      // foreach($storeId as $val){
      //   echo "$val <br>";
      // }

        //$match1=[];
    //echo $storeId;
       //echo  $storeArray[$storeDish];
      $match1=null;
  //     // for($j=0;$j<1;$j++)
  //     // {
  //     //    echo $storeArray[$storeDish];
  //     // }
    
       foreach($storeArray as $dish=>$value)
      
  {
    // $match=null;
       //echo $dish['dish_id']."<br>";
        foreach($ingredient as $i)
   {
     
    if(stripos($value, $i)!==FALSE){
       $match1=$value;
       echo $match1.' '.$dish."<br>";
        
        
    break;
    }
   
   }
   
      
  }
       
    if($match1==NULL){
       echo "Sorry,No records found :(";
     }
   

}
?>
 </div>
</div>
</div>
</section>
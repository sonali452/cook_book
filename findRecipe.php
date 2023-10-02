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
<center>
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
</center>
 
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
  if(isset($ingredient[0]))
       {
        $query="SELECT usersrecipe.dish,usersrecipe.dish_id,usersrecipe.directions,usersrecipe.photo,ingredients.ing1,ingredients.ing2,ingredients.ing3,ingredients.ing4,ingredients.ing5,ingredients.ing6,ingredients.ing7,ingredients.ing8,ingredients.ing9,ingredients.ing10,ingredients.ing11,ingredients.ing12,ingredients.ing13,ingredients.ing14,ingredients.ing15,ingredients.ing16,videos.name,videos.location FROM 
         usersrecipe LEFT OUTER JOIN ingredients ON usersrecipe.dish_id=ingredients.dish_id LEFT OUTER JOIN  videos ON usersrecipe.dish_id=videos.dish_id WHERE (ingredients.ing1 LIKE '%{$ingredient[0]}%')OR (ingredients.ing2 LIKE '%{$ingredient[0]}%')OR(ingredients.ing3 LIKE '%{$ingredient[0]}%')OR(ingredients.ing4 LIKE '%{$ingredient[0]}%')OR(ingredients.ing5 LIKE '%{$ingredient[0]}%')OR(ingredients.ing6 LIKE '%{$ingredient[0]}%')OR(ingredients.ing7 LIKE '%{$ingredient[0]}%')OR(ingredients.ing8 LIKE '%{$ingredient[0]}%')OR(ingredients.ing9 LIKE '%{$ingredient[0]}%')";
       }
           if(isset($ingredient[1]))
       {
        $query="SELECT usersrecipe.dish,usersrecipe.dish_id,usersrecipe.directions,usersrecipe.photo,ingredients.ing1,ingredients.ing2,ingredients.ing3,ingredients.ing4,ingredients.ing5,ingredients.ing6,ingredients.ing7,ingredients.ing8,ingredients.ing9,ingredients.ing10,ingredients.ing11,ingredients.ing12,ingredients.ing13,ingredients.ing14,ingredients.ing15,ingredients.ing16,videos.name,videos.location FROM 
         usersrecipe LEFT OUTER JOIN ingredients ON usersrecipe.dish_id=ingredients.dish_id LEFT OUTER JOIN  videos ON usersrecipe.dish_id=videos.dish_id WHERE ((
         (ingredients.ing1 LIKE '%{$ingredient[0]}%')
         OR (ingredients.ing2 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing3 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing4 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing5 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing6 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing7 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing8 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing9 LIKE '%{$ingredient[0]}%')) 
         AND 
         ((ingredients.ing1 LIKE '%{$ingredient[1]}%')
         OR (ingredients.ing2 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing3 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing4 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing5 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing6 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing7 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing8 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing9 LIKE '%{$ingredient[1]}%'))) ";
       }
       if(isset($ingredient[2]))
       {
        $query="SELECT usersrecipe.dish,usersrecipe.dish_id,usersrecipe.directions,usersrecipe.photo,ingredients.ing1,ingredients.ing2,ingredients.ing3,ingredients.ing4,ingredients.ing5,ingredients.ing6,ingredients.ing7,ingredients.ing8,ingredients.ing9,ingredients.ing10,ingredients.ing11,ingredients.ing12,ingredients.ing13,ingredients.ing14,ingredients.ing15,ingredients.ing16,videos.name,videos.location FROM 
         usersrecipe LEFT OUTER JOIN ingredients ON usersrecipe.dish_id=ingredients.dish_id LEFT OUTER JOIN  videos ON usersrecipe.dish_id=videos.dish_id WHERE ((
         (ingredients.ing1 LIKE '%{$ingredient[0]}%')
         OR (ingredients.ing2 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing3 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing4 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing5 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing6 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing7 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing8 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing9 LIKE '%{$ingredient[0]}%')) 
         AND 
         ((ingredients.ing1 LIKE '%{$ingredient[1]}%')
         OR (ingredients.ing2 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing3 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing4 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing5 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing6 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing7 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing8 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing9 LIKE '%{$ingredient[1]}%'))
         AND 
         ((ingredients.ing1 LIKE '%{$ingredient[2]}%')
         OR (ingredients.ing2 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing3 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing4 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing5 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing6 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing7 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing8 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing9 LIKE '%{$ingredient[2]}%')))";
       }
          if(isset($ingredient[3]))
       {
        $query="SELECT usersrecipe.dish,usersrecipe.dish_id,usersrecipe.directions,usersrecipe.photo,ingredients.ing1,ingredients.ing2,ingredients.ing3,ingredients.ing4,ingredients.ing5,ingredients.ing6,ingredients.ing7,ingredients.ing8,ingredients.ing9,ingredients.ing10,ingredients.ing11,ingredients.ing12,ingredients.ing13,ingredients.ing14,ingredients.ing15,ingredients.ing16,videos.name,videos.location FROM 
         usersrecipe LEFT OUTER JOIN ingredients ON usersrecipe.dish_id=ingredients.dish_id LEFT OUTER JOIN  videos ON usersrecipe.dish_id=videos.dish_id WHERE ((
         (ingredients.ing1 LIKE '%{$ingredient[0]}%')
         OR (ingredients.ing2 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing3 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing4 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing5 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing6 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing7 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing8 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing9 LIKE '%{$ingredient[0]}%')) 
         AND 
         ((ingredients.ing1 LIKE '%{$ingredient[1]}%')
         OR (ingredients.ing2 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing3 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing4 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing5 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing6 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing7 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing8 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing9 LIKE '%{$ingredient[1]}%'))
         AND 
         ((ingredients.ing1 LIKE '%{$ingredient[2]}%')
         OR (ingredients.ing2 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing3 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing4 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing5 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing6 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing7 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing8 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing9 LIKE '%{$ingredient[2]}%'))
        AND 
         ((ingredients.ing1 LIKE '%{$ingredient[3]}%')
         OR (ingredients.ing2 LIKE '%{$ingredient[3]}%')
         OR(ingredients.ing3 LIKE '%{$ingredient[3]}%')
         OR(ingredients.ing4 LIKE '%{$ingredient[3]}%')
         OR(ingredients.ing5 LIKE '%{$ingredient[3]}%')
         OR(ingredients.ing6 LIKE '%{$ingredient[3]}%')
         OR(ingredients.ing7 LIKE '%{$ingredient[3]}%')
         OR(ingredients.ing8 LIKE '%{$ingredient[3]}%')
         OR(ingredients.ing9 LIKE '%{$ingredient[3]}%')))";
       }
  if(isset($ingredient[4])){
  $query="SELECT usersrecipe.dish,usersrecipe.dish_id,usersrecipe.directions,usersrecipe.photo,ingredients.ing1,ingredients.ing2,ingredients.ing3,ingredients.ing4,ingredients.ing5,ingredients.ing6,ingredients.ing7,ingredients.ing8,ingredients.ing9,ingredients.ing10,ingredients.ing11,ingredients.ing12,ingredients.ing13,ingredients.ing14,ingredients.ing15,ingredients.ing16,videos.name,videos.location FROM 
         usersrecipe LEFT OUTER JOIN ingredients ON usersrecipe.dish_id=ingredients.dish_id LEFT OUTER JOIN  videos ON usersrecipe.dish_id=videos.dish_id WHERE ((
         (ingredients.ing1 LIKE '%{$ingredient[0]}%')
         OR (ingredients.ing2 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing3 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing4 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing5 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing6 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing7 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing8 LIKE '%{$ingredient[0]}%')
         OR(ingredients.ing9 LIKE '%{$ingredient[0]}%')) 
         AND 
         ((ingredients.ing1 LIKE '%{$ingredient[1]}%')
         OR (ingredients.ing2 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing3 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing4 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing5 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing6 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing7 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing8 LIKE '%{$ingredient[1]}%')
         OR(ingredients.ing9 LIKE '%{$ingredient[1]}%'))
         AND 
         ((ingredients.ing1 LIKE '%{$ingredient[2]}%')
         OR (ingredients.ing2 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing3 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing4 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing5 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing6 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing7 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing8 LIKE '%{$ingredient[2]}%')
         OR(ingredients.ing9 LIKE '%{$ingredient[2]}%'))
        AND 
         ((ingredients.ing1 LIKE '%{$ingredient[3]}%')
         OR (ingredients.ing2 LIKE '%{$ingredient[3]}%')
         OR(ingredients.ing3 LIKE '%{$ingredient[3]}%')
         OR(ingredients.ing4 LIKE '%{$ingredient[3]}%')
         OR(ingredients.ing5 LIKE '%{$ingredient[3]}%')
         OR(ingredients.ing6 LIKE '%{$ingredient[3]}%')
         OR(ingredients.ing7 LIKE '%{$ingredient[3]}%')
         OR(ingredients.ing8 LIKE '%{$ingredient[3]}%')
         OR(ingredients.ing9 LIKE '%{$ingredient[3]}%'))
        AND 
         ((ingredients.ing1 LIKE '%{$ingredient[4]}%')
         OR (ingredients.ing2 LIKE '%{$ingredient[4]}%')
         OR(ingredients.ing3 LIKE '%{$ingredient[4]}%')
         OR(ingredients.ing4 LIKE '%{$ingredient[4]}%')
         OR(ingredients.ing5 LIKE '%{$ingredient[4]}%')
         OR(ingredients.ing6 LIKE '%{$ingredient[4]}%')
         OR(ingredients.ing7 LIKE '%{$ingredient[4]}%')
         OR(ingredients.ing8 LIKE '%{$ingredient[4]}%')
         OR(ingredients.ing9 LIKE '%{$ingredient[4]}%')))";
       }
     
        
    
        
  $find=mysqli_query($conn,$query);
  $queryResult=mysqli_num_rows($find);
  echo "".$queryResult." results!";
 //$find->execute();
  if($queryResult>0){
 while($row=mysqli_fetch_array($find, MYSQLI_ASSOC)){
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

}
    else{
        
        echo  '<p style="font-size: 20px; color: #f7931e; text-align: center; margin-left: 360px;">';
        echo "Sorry!!No results found!!";
        echo  '</p>';
        
      }  

   
}

?>
 </div>
</div>
</div>
</section>
<?php
session_start();
?>


<?php
include 'includes/Navbar.php';
include 'includes/dbh.inc.php';
?>

<?php
include 'links/links.php';
?>




 <?php
 if (isset($_GET['upload'])=="success")
 {
  echo '<script>alert("Your recipe is successfully uploaded!");</script>';
 }
?>



<div class="background">

<!-- my recipe button in uploading recipe -->
<!-- ========================================== -->
<div class="uploadRecipes">
<?php
  if (isset($_SESSION['userId']))
{
   echo '<form action="myRecipes.php" method="POST">';
   echo '<a href="myRecipes.php"><button type="button" name="uploadRecipes" style="width: 14%; margin-left: 91%; margin-top: 2%;"> My Recipes </button></a>';
   echo '</form>';

 }


else if(isset($_COOKIE['idUsers']) && isset($_COOKIE['sess'])){
$Controller = new Controller;
if($Controller -> checkUserStatus($_COOKIE['idUsers'], $_COOKIE['sess']))
{
                
                
//echo $Controller -> printData(intval($_COOKIE['idUsers']));
 echo '<form action="myRecipes.php" method="POST">';
   echo '<a href="myRecipes.php"><button type="button" name="uploadRecipes" style="width: 14%; margin-left: 91%; margin-top: 2%;"> My Recipes </button></a>';
   echo '</form>';
                }
            
            }

?>
</div>
<!-- ============================================================= -->


<center>
	<div class="recipes" style="margin-top: -2%;">
<form action="upload.inc.php" method="POST" enctype="multipart/form-data">
	<ul>
        <li>
	<span class="topics">Dish Name:</span><br>  
		<input type="text" name="dish" id="dish" placeholder="Dish Name" required>
		
        </li>

        <li>
                <span class="topics"> Ingredients:</span><br> 

                  <div class="field_wrapper">
            <div>
        Ingredient 1: <input type="text" name="field_name[]" placeholder="Ingredient" value=""/>
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
      var fieldHTML = '<div class="field_wrapper" style="margin-left:27px;"><div>Ingredient '+x+': <input type="text" name="field_name[]" placeholder="Ingredient" value=""/><span class="remove_button"><a href="javascript:void(0);" >&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="remove" style="font-size: 15px;"><i class="fa fa-minus-square" aria-hidden="true"></i>&nbsp; Remove</button></a></span></div></div>';
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

        
        </li>


       <li>
        <span class="topics">Directions:</span> <br>
        <textarea name="directions" id="directions" cols="24px" rows="15px" placeholder="Directions to follow the recipe"></textarea>
         </li>


        <li>
        <span class="topics">Upload a photo of your delicious food</span><br>
        <input type="file" name="file" class="fileupload" required>
        </li> 

          <li>
        <span class="topics">Upload a video for your recipe</span><br>
        <input type="file" name="video" class="fileupload">
        </li> 

        <li>
        <button type="submit" name="upload">Upload</button>
        </li>
      
       </ul>
        
          
</form>
</div>
</center>
</div>

<script src="js/main.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
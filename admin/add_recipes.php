<?php 
    session_start();
    include('includes/header.php');
    include('includes/navbar.php');
?>



<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Recipe 
            </h6>
        </div>
        <div class="card-body">
             <center>
    <div class="recipes">
<form action="upload.inc.php" method="POST" enctype="multipart/form-data">
    <ul type="none">
        <li><p class="text-left"  style="font-size:20px;"><b>Dish Name:</b> <input type="text" name="dish" id="dish" placeholder="Dish Name" required></p>
        
        </li>

        <li>
            <p class="text-left" style="font-size:20px;"><b>Ingredients:</b>
             <div class="field_wrapper text-left">
           
        Ingredient 1: <input type="text" name="field_name[]" placeholder="Ingredient" value=""/>
        <span class="add_button"><a href="javascript:void(0);"  title="Add field">&nbsp;<button type="button" class="add" id="add" style="font-size: 15px;"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp; Add</button></a></span>
          
           </div></p>
     
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
           <p class="text-left"  style="font-size:20px;"><b>Directons:</b>
            <br><textarea name="directions" id="directions" cols="70px" rows="12px" placeholder="Directions to follow the recipe"></textarea></p>
        </li>


        <li>
            <p class="text-left"  style="font-size:15px;">Upload a photo of your dish
                <br>
        <input type="file" name="file" class="fileupload" required>
        </li> 

        <li>
            <p class="text-left"  style="font-size:15px;">Upload a video of your recipe
                <br>
             <input type="file" name="video" class="fileupload">
         </p>
        </li> 

        <li>
        <button type="submit" name="upload">add</button>
        </li>
      
       </ul>
        
          
</form>
</div>
</center> 
            
        </div>
    </div>

</div>
<script src="js/main.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->


<?php 
    include('includes/scripts.php');
?>
foreach($storeArray as $dish=>$value)
      
  {
    // $match=null;
       //echo $dish['dish_id']."<br>";
        foreach($ingredient as $i)
   {
     
    if(stripos($value, $i)!==FALSE){
       $match1=$value;
       echo $match1.' '.$dish."<br>";
        
         ?>
         <div class="col">
    <div class="card h-100">
      <img src="<?php echo 'picUpload/'.$row['photo'];?>" class="card-img-top" alt="..." style="width: 100%; height: 300px;">
      <div class="card-body">
        <h3 class="card-title"><?php echo $dish; ?></h3>
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
    break;
    }
   
   }
   
      
  }
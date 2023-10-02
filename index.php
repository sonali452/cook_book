<?php
session_start();
?>


<?php
require_once('config.php');
require_once('core/controller.Class.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>DIY Kitchen Diaries</title>
     <?php
  include 'links/links.php';
    ?>
    
</head>    

<body>
  <?php
  include 'includes/Navbar.php';
  ?>
  <!-- section-1 top-banner -->
  <section id="home">
    <div class="container-fluid px-0 top-banner">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <h1>Good food choices are good investments.</h1>
            
            <div class="mt-4">
              <button class="main-btn ms-lg-4 mt-lg-0 mt-4">See Recipes <i class="fas fa-angle-right ps-3"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  

    <!-- section-2 about-->
   <section id="about">
     <div class="about-section wrapper">
       <div class="container">
         <div class="row align-items-center">
           <div class="col-lg-7 col-md-12 mb-lg-0 mb-5">
             <div class="card border-0">
               <img src="image/img/img-1.jpg" class="img-fluid">
             </div>
           </div>
           <div class="col-lg-5 col-md-12 text-sec">
            <h2>Find your favourite recipes</h2>
            <p>DIY Kitchen Diaries is a sleek multiplatform recipe manager, accessible online.</p>
              <button class="main-btn mt-4">Learn More</button>
           </div>
         </div>
       </div>
       
     </div>
   </section>

   <!-- section-3 recipes-->
<section id="recipes">
      <h3 style="text-align: center;"><u>Some best recipes</u></h3>
       <div class="recipes-section wrapper">
       <div class="container">
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="image/img/momo.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h3 class="card-title">MOMO</h3>
        <p class="card-text">Make some delicious momos seeing recipes.</p>
        <a class="main-btn mt-4" href="items.php">Full Recipe</a>
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


  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

<script src="js/main.js"></script>
</body>
</html>


<?php 
    include('includes/footer.php');
?>

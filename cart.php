<?php

 


include 'includes/db.php';

if(isset($_GET['add_cart'])){
session_start();
  

  $id = $_GET['add_cart'];
  $name = $_GET['name'];
  $price= $_GET['price'];
  $license= $_GET['license'];
  
  foreach($_SESSION['shopping_cart'] as $item){
    if($item['id'] === $id ) {
      echo 'no';
      return;
    }
  }
  $_SESSION['shopping_cart'][] = [
    "id" => $id,
    "name" => $name,
    "price" => $price,
    "license" => $license
    
  ];
  return;
}

else {
  
include 'header.php';}
  ?>
<div class="wrap">
        

        
         <section id="contact">
             <div class="container">
               <h2>S<span class="red_underline">hopping Car</span>t</h2>
                 <div class="row">
                     <div class="col-md-8 col-md-offset-2">
                     <?php 
                       foreach($_SESSION['shopping_cart'] as $item){
                         
                       }
                       
                       
                     ?> 
                   </div>
                 </div>
             </div>
         </section>
         
         

</div>
         
         
        
       
  <?php  include 'footer.php';?>
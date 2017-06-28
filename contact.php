<?php

include 'includes/db.php';
include 'header.php';

if (isset($_POST['name'])){
  $name = $_POST['name'];
  $from = $_POST['email'];
  $message = $_POST['message'];
  
  
  $message = mysqli_real_escape_string($connection, $message);
  $name = mysqli_real_escape_string($connection, $name);
  $from = mysqli_real_escape_string($connection, $from);
  
  sendMail($from, $name, $message);
}


?>
 
<div class="wrap">
         <section id="contact">
             <div class="container">
               <h2>G<span class="red_underline">ET IN TOUC</span>H</h2>
                 <div class="row">
                     <div class="col-md-8 col-md-offset-2">
                         <form action="" class="clearfix">
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="name">NAME:</label>
                                         <input type="text" id="name" class="form-control input-lg">
                                     </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                         <label for="email">EMAIL:</label>
                                         <input type="email" id="email" class="form-control input-lg">
                                     </div>
                                </div>
                            </div>
                             <div class="form-group">
                                 <label for="message">MESSAGE:</label>
                                 <textarea  rows= 7 id="message" class="form-control"></textarea>
                             </div>
                           <button type="submit" class="btn pull-right btn-danger" >SEND</button>
                         </form>
                     </div>
                 </div>
             </div>
         </section>
        </div>
        
       
  <?php  include 'footer.php';?>
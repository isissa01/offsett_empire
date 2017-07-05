<?php

include 'includes/db.php';
include 'header.php';

if(!isset($_SESSION['logged_in'])){
  header("Location: login.php");
}

?>

         
         <?php 
  if (isset($_POST['current_password'])){
  $current_password = $_POST['current_password'];
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];
  
  $current_password= mysqli_real_escape_string($connection, $current_password);
  $new_password= mysqli_real_escape_string($connection, $new_password);
  $confirm_password= mysqli_real_escape_string($connection, $confirm_password);

  
//  $salt = 'ilovemywifeaminabutsheplaywaytoomuch1770420';
//  $hash = '$2a$10$';
//  $password = crypt($password, $hash . $salt);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT , ['cost' => 15]);
      if(!$password){
    $errors[] = "Password Cannot Not Be Empty!";
  } else {
        
        $errors = signup($username, $hashed_password, $email);
      }
    }

  
  ?>
 
<div class="wrap">
         <section id="contact">
             <div class="container">
               <h2>C<span class="red_underline">hange Passwor</span>d</h2>
                 <div class="row">
                     <div class="col-md-8 col-md-offset-2">
<?php if(isset($errors)){
  

                       foreach($errors as $key => $error){
                       ?>
                       <p class ='alert alert-danger'><?php echo $error;?><span class='close'>X</span></p>
                       <?php  
                       }}
                       ?>
          <form action="" method='post' class="clearfix">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <div class="form-group">
              <label class="label" for="#current_password">Current Password:</label>
              <input type="password" id="current_password" placeholder="Current Password" class="form-control input-lg" name="current_password">
            </div>
            </div>
          </div>
          
           <div class="row">
             <div class="col-md-6">
               <div class="form-group">
              <label class="label" for="#new_password">New Password:</label>
              <input type="password" id="new_password" placeholder="New Password" class="form-control input-lg" name="new_password">
            </div>
             </div>
             <div class="col-md-6">
               <div class="form-group">
              <label class="label" for="#confirm_password">Confirm Password:</label>
              <input type="password" id="confirm_password" placeholder="Confirm Password" class="form-control input-lg" name="confirm_password">
            </div>
             </div>

           </div>
            
            <input type="submit" value="Change" class="btn btn-danger btn-lg pull-right">
            
          </form>
          </div>
                 </div>
             </div>
         </section>
         

</div>
         
         
        
       
  <?php  include 'footer.php';?>
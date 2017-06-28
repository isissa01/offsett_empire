<?php

include 'includes/db.php';
include 'header.php';

if(isset($_SESSION['logged_in'])){
  header("Location: index.php");
}

?>

         
         <?php 
  if (isset($_POST['username'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email    = $_POST['email'];
  
  
  $username = mysqli_real_escape_string($connection, $username);
  $password= mysqli_real_escape_string($connection, $password);
  $email= mysqli_real_escape_string($connection, $email);
  
//  $salt = 'ilovemywifeaminabutsheplaywaytoomuch1770420';
//  $hash = '$2a$10$';
//  $password = crypt($password, $hash . $salt);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT , ['cost' => 15]);
      if(!$password){
    $errors[] = "Password Cannot Not Be Empty!";
  } else {
        
        $errors = signup($username, $hashed_password, $email);
      }
    
    if($errors === 'done'){
      login($username,$password );
    }
    }

  
  ?>
 
<div class="wrap">
         <section id="contact">
             <div class="container">
               <h2>S<span class="red_underline">ign Up For An Accoun</span>t</h2>
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
             <div class="col-md-6">
               <div class="form-group">
              <label class="label" for="#username">Username:</label>
              <input type="text" id="username" placeholder="Username" class="form-control input-lg" name="username">
            </div>
               
             </div>
             <div class="col-md-6">
               <div class="form-group">
              <label class="label" for="#password">Password:</label>
              <input type="password" id="password" name="password" placeholder="Password" class="form-control input-lg" name="username">
            </div>
               
             </div>
           </div>
            
            
            <div class="form-group">
              <label class="label" for="#email">Email:</label>
              <input type="email" id="email" placeholder="Email" class="form-control input-lg" name="email">
            </div>
            <div class="input-group remember">
              
              <input type="checkbox" id="remember"   value= '1' name="remember-me">
              <label  for="#remember">Remember Me</label>
            </div>
            
            <input type="submit" value="Login" class="btn btn-danger btn-lg pull-right">
            
          </form>
          <p id='forgot-password'><a  href="forgot.php">Forgot your username or password?</a></p>
          
          <p><span class="signup">Not a memember </span><a href="signup.php" class="red">Sign Up Now</a></p>
          </div>
                 </div>
             </div>
         </section>
         

</div>
         
         
        
       
  <?php  include 'footer.php';?>
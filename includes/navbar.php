
         
      
                
       <nav class="navbar navbar-inverse" id="navbar-scroll">
          <div class="container">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <a href="index.html" class="navbar-brand" >OFFSETT <span class="red">EMPIRE</span></a>
               </div>
               <div class="collapse navbar-collapse" id="navbar-collapse">
                   <ul class="nav navbar-nav navbar-right">                      
                       <?php 
                     foreach(getNavbar() as $key => $value){
                     
                     ?>
                     <li <?php if($link == $value['link']){
                      echo 'class = active'; 
                     }?>
                     
                     ><a href="<?php echo $value['link'];?>"><?php echo $value['page'];?></a></li>
                     <?php } 
                     if(isset($_SESSION['logged_in'])){
                       ?>
                       <li class="dropdown">
                        <a class="toggle" id="userMenu" data-toggle="dropdown" aria-expanded="true">
    User Menu
                          <span class="caret"></span></a>
                         <ul class="dropdown-menu">
                           <li><a href="acount.php">Account</a></li>
                           <li><a href="change_password.php">Change Password</a></li>
                           <?php 
                           if($_SESSION['isAdmin'] == 1){
                          echo "<li><a href='cms.php'>Admin</a></li>";
                        }
                           ?>
                            <li role="separator" class="divider"></li>
                           <li><a href="logout.php">Logout</a></li>
                         </ul>
                         
                       </li>
                       <?php
                     }else {
                           echo "<li><a href='login.php'>Login</a></li>";                      
                     }
                     ?> 
                     
                     
                     <li>
                <a href="cart.php"><span class=" fa fa-shopping-cart"></span> Cart (<span class='cart_count'><?php echo count($_SESSION['shopping_cart']);?></span>)</a>
              </li>
                     
                    
                   </ul>
               </div>
           </div>
       </nav>
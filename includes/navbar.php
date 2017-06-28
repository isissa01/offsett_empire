
         
      
                
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
                       echo "<li><a href='logout.php'>Logout</a></li>";
                       if($_SESSION['isAdmin'] == 1){
                          echo "<li><a href='cms.php'>Admin</a></li>";
                        }
                     }else {
                           echo "<li><a href='login.php'>Login</a></li>";                      
                     }
                     ?> 
                     
                     
                     <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class=" fa fa-shopping-cart"></span> Cart (<span class='cart_count'><?php echo count($_SESSION['shopping_cart']);?></span>)</a>
                <ul class="dropdown-menu">
                
                <li><p>You have <span class='cart_count'><?php echo count($_SESSION['shopping_cart']);?></span> items in your shopping cart</p></li>
                <li class='row cart-item'>
                 <div class="col-xs-8">
                   <p class='beat-name'>Title</p>
                  <p class='license'>license type</p>
                 </div>
                  <div class="col-xs-4">
                    <p class='item-price'>24.99</p>
                  </div>
                </li>                
                <li class='row cart-item'>
                 <div class="col-xs-8">
                   <p class='beat-name'>Title</p>
                  <p class='license'>license type</p>
                 </div>
                  <div class="col-xs-4">
                    <p class='item-price'>24.99</p>
                  </div>
                </li>
                
                <li class="row">
                  <div class="col-xs-6">
                    <a class="btn btn-primary" href="cart.php">Checkout</a>
                  </div>
                  <div class="col-xs-6">
                    <span class='total-price pull-right'>54.32</span>
                  </div>
                </li>
                  
                
                
                
                
                </ul>
              </li>
                     
                    
                   </ul>
               </div>
           </div>
       </nav>
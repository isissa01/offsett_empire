<!--This is the footer section it is on another php page so the it can be included dynamically into any page without having to hard code it to each individual page-->
      

        
<footer>
         <div class="container">
              <div class="row">
                <div class="col-sm-7">
                  <ul class="nav navbar-nav">
                  
<!--                  This Pulls the links for the navbar from the database dynamically-->
                   <?php 
                     foreach(getNavbar() as $key => $value){
                     
                     ?>
                     <li <?php if($link == $value['link']){
                      echo 'class = active'; 
                     }?>
                     
                     ><a href="<?php echo $value['link'];?>"><?php echo $value['page'];?></a></li>
                     <?php } ?>
               </ul>
                </div>
                <div class="col-sm-5 clearfix">
                 
                  <div class="social-media social-footer">
                       <div class="social"><a class="fa fa-facebook" href=""></a></div>
                       <div class="social"><a class="fa fa-youtube-play" href=""></a></div>
                       <div class="social"><a class="fa fa-twitter" href=""></a></div>
                       <div class="social"><a class="fa fa-google-plus" href=""></a></div>
                       <div class="social"><a class="fa fa-instagram" href=""></a></div>

                   </div>
                   
                </div>
                
                
              </div>
               
               
               
               
         </div>
         <div class="copyright">
           <p>© 2016 FOREIGNDEVELOPERS ALL RIGHTS RESERVED</p>
         </div><div class="back-to-top pull-right"><a id="back_to_top" class="fa fa-arrow-left" href=""></a></div>
       </footer>
        

       <!-- In production use:
  <script src="//ajax.googleapis.com/ajax/libs/angularjs/x.x.x/angular.min.js"></script>
  -->
  <script src="js/jquery.js"></script>
  <script src = "bootstrap/js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>
  <script src="js/contact.js"></script>

</body>
</html>

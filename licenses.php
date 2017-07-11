<?php include 'header.php';?>
<div class="wrap">
 <section id="licenses">
     <div class="container">
       <h2>Licenses</h2>
        <div class="row">
          <div class="col-sm-3">
           <h3>MP3 License</h3>
            <p><button data-id="1" data-target="#licenseModal" data-toggle="modal"  class="btn btn-danger btn-lg">open</button></p>

          </div>
          <div class="col-sm-3">
            <h3>WAV License</h3>
            <p><button data-id="2" data-target="#licenseModal" data-toggle="modal"  class="btn btn-danger btn-lg">open</button></p>
          </div>
          <div class="col-sm-3">
            <h3>Premium License</h3>
            <p><button data-id="3" data-target="#licenseModal" data-toggle="modal"  class="btn btn-danger btn-lg">open</button></p>
          </div>
          <div class="col-sm-3">
            <h3>Unlimited License</h3>
            <p><button data-id="4" data-target="#licenseModal" data-toggle="modal"  class="btn btn-danger btn-lg">open</button></p>
          </div>
        </div>

     </div>
 </section>
 
</div>
      <!--  Modal -->
    <div class="modal fade" id="licenseModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal"><span>&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div> 
 <?php include 'footer.php';?>

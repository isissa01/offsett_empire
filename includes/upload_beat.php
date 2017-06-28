
 

 <form class="form" action="" enctype="multipart/form-data" method="post">
  <div class="form-group files beat">
   <label for="beat">*Select Beat To Upload:</label>
    <input type="file" name="beat" id='beat' accept="audio/*"  class="form-control input">
    <div class='dragover'>
      <div class="drag">Upload Beat</div>
      </div>
  </div>
  
  <div class="form-group files cover">
   <label for="cover">Select Cover Image To Upload:</label>
    <input type="file" class="form-control input" id="cover" accept="image/*"  name="cover">
    <div class='dragover'>
      <div class="drag">Upload Cover</div>
      </div>
   </div>
  <div class="form-group">
   <label for="tags">*Beat Name:</label>
    <input type="text" class="form-control" name="name" placeholder="Name of Beat">
    
  </div>
    
  <div class="form-group">
   <label for="bpm">BPM:</label>
    <input type="text" class="form-control" name="bpm" placeholder="BPM of Beat">
    
  </div>

  <div class="form-group">
   <label for="tags">TAGS:</label>
    <input type="text" class="form-control" name="tags" placeholder="TAGS">
    
  </div>
  
  
  <input type="submit" name="submit" value="UPLOAD" class="btn btn-primary btn-md pull-right">
  
</form>




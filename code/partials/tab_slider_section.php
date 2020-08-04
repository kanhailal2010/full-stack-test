<div id="tab_slide"></div>
<h3 class="section_title">Tab Slider Section</h3>
<form id="tabSliderForm" action="http://test.local/api.php" enctype="multipart/form-data" method="POST">
  <input type="hidden" name="slide_id" value="<?php echo $slide_id;?>" />
  <input type="hidden" name="slide_image" value="<?php echo $slide_image;?>" />
  <div class="form-group">
    <label for="sliderTab" class="sr-only">Slider Tab</label>
    <select id="sliderTab" name="slide_tab_id" class="form-control form-control-lg">
      <option value="0">Refresh Page</option>
    </select>
  </div>
  <div class="form-group">
    <label for="sliderTitle" class="sr-only">Slider Title</label>
    <input type="text" name="slide_title" class="form-control" id="sliderTitle" placeholder="Slider Title" value="<?php echo $slide_title;?>">
  </div>
  <div class="form-group">
    <label for="sliderDescription" class="sr-only">Slider Description</label>
    <input type="text" name="slide_description" class="form-control" id="sliderDescription" placeholder="Slider Description" value="<?php echo $slide_description;?>" maxlength="225">
  </div>
  <div class="form-group">
    <label for="inputTab" class="sr-only">Image</label>
    <?php if(!empty($slide_image)) { ?>
      <img class="w-100" src="<?php echo IMAGE_URL.$slide_image?>">
      <div class="alert alert-danger">Upload New to change Image </div>
    <?php } // end if?>
    <div class="input-images"></div>
  </div>
  <div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
  </div>
  <div class="progress_msg alert"></div>

  <button type="submit" class="btn btn-primary mb-2">Save Slides</button>
</form>

<div class="row">
  <div class="col tab_slide_row">
    <div class='row'>
      <div class='col-md-1'>S No.</div>
      <div class='col-md-1'>Tab ID</div>
      <div class='col-md-1'>Image</div>
      <div class='col-md-2'>Title</div>
      <div class='col-md-5'>Description</div>
      <div class='col-md-2'>Action</div>
    </div>
    <?php echo $slide_html; ?>
  </div>
</div>
<div id="tabs"></div>
<h3 class="section_title">Tab Section</h3>

<form id="tabForm" action="http://test.local/api.php" enctype="multipart/form-data" method="POST">
  <input type="hidden" name="tab_id" id="tab_id" value="<?php echo $tab_id;?>" />
  <input type="hidden" name="tab_icon" id="tab_icon" value="<?php echo $tab_icon;?>" />
  <div class="form-group">
    <label for="inputTabTitle" class="sr-only">Tab Title</label>
    <input type="text" name="tab_title" class="form-control" id="inputTabTitle" placeholder="Tab Title" value="<?php echo $tab_title;?>">
  </div>
  <div class="form-group">
    <label for="inputicon" class="sr-only">Icon</label>
    <div class="input-icons">
      <?php if(!empty($tab_icon)) { ?>
        <img src="<?php echo ICON_URL.$tab_icon?>">
        <span class="alert alert-danger">Upload New to change Icon </span>
      <?php } // end if?>
    </div>
  </div>
  <div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
  </div>
  <div class="progress_msg alert"></div>

  <button type="submit" class="btn btn-primary mb-2">Save Tab</button>

</form>

<div class="row">
  <div class="col tab_row">
    <div class='row'>
      <div class='col-md-1'>S No.</div>
      <div class='col-md-1'>Tab ID</div>
      <div class='col-md-2'>Icon</div>
      <div class='col-md-5'>Title</div>
      <div class='col-md-3'>Action</div>
    </div>
    <?php echo $tabs_html; ?>
  </div>
</div>
<h3 class="section_title"> Page Title Section </h3>
<form id="pageForm" method="POST" action="/api.php">
  <input type="hidden" name="page_form">
  <div class="form-group">
    <label for="inputTitle">Enter Title</label>
    <input type="text" name="page_title" class="form-control" id="inputTitle" aria-describedby="titleHelp" placeholder="Enter title" value="<?php echo $page_title;?>">
    <small id="titleHelp" class="form-text text-muted">Enter the title of the Page</small>
  </div>
  <div class="form-group">
    <label for="inputDescription">Description</label>
    <input type="text" name="page_description" class="form-control" id="inputDescription" placeholder="Description" value="<?php echo $page_description;?>">
  </div>
  <input type="submit" value="Submit" class="btn btn-primary" />
</form>
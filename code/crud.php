<?php
include_once "partials/header.php";
include_once "prefilled.php";
?>
<link rel="stylesheet" type="text/css" href="/assets/css/image-uploader.css">
<script type="text/javascript" src="/assets/js/jquery-3.5.1.min.js"></script>

<script type="text/javascript" src="/assets/js/image-uploader.js"></script>

<script type="text/javascript" src="/assets/js/crud.js"></script>

  <div class="container">
    <div class="row">
      <div class="col-11 mx-auto">
        <div class="">
          <h3 class="display-4">CRUD Operations</h3>

          <?php include("partials/page_section.php");?>
          <?php include("partials/tab_section.php");?>
          <?php include("partials/tab_slider_section.php");?>

        </div>
      </div> <!-- col-11 -->
    </div> <!-- row -->
  </div> <!-- container -->

<?php
include "partials/footer.php";
?>
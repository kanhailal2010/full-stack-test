<?php
include("partials/header.php");
include("connection.php");
?>
<script type="text/javascript">

  let view = (window.innerWidth < 700) ? "/view_mobile.php" : "/view.php";
  if(localStorage.getItem('view') != view) {
    localStorage.setItem("view", view);
    window.location.href = view;
  }
  window.addEventListener("resize", () => { location.reload(true); });
</script>

<?php
$sql = "SELECT * FROM ".PAGE_TABLE;
$stmt = $conn->prepare($sql);
$stmt->execute();
$page = get_result($stmt)[0];

$sql = "SELECT * FROM ".TABS_TABLE." ORDER BY tab_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$tabs = get_result($stmt);

// Tab Slider Section
$sql = "SELECT * FROM ".TABS_SLIDE_TABLE." ORDER BY tab_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$slides = get_result($stmt);

$sections = [];
foreach($slides as $i=>$slide) {
  $sections[$slide['tab_id']][] = $slide;
}
$arrow = '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.793 8 8.146 5.354a.5.5 0 0 1 0-.708z"/>
  <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5H11a.5.5 0 0 1 0 1H4.5A.5.5 0 0 1 4 8z"/>
</svg>';
// echo '<pre> sections'; print_r($sections); echo '</pre>';
?>
<div class="wpoets-web-view">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h3 class="page_title"><?php echo $page['page_title']; ?></h3>
        <p class="page_description"><?php echo $page['page_description']; ?></p>
      </div>
    </div>

    <div class="row custom-section no-gutters">
      <div class="col-3 custom-tabs-container h-100">
        <div class="nav flex-column nav-pills h-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <?php
          foreach($tabs as $i=>$tab) {
            echo '<a class="'.($i==0?'active':'').'" id="v-pills-'.$tab['tab_id'].'-tab" data-toggle="pill" href="#v-pills-'.$tab['tab_id'].'" role="tab" aria-controls="v-pills-'.$tab['tab_id'].'" aria-selected="'.($i==0?'true':'false').'">';
            echo '<img src ="'.ICON_URL.$tab['tab_icon'].'" class="tab_icon" >';
            echo $tab['tab_title'];
            echo '<img src ="'.ICON_DIR_URL.'tab-h-pointer.png" class="pointer_icon" >';

            echo '</a>';
          }
          ?>
        </div>
      </div>
      <div class="col-9 custom-slider-container h-100">
        <div class="tab-content" ida="v-pills-tabContent">
          <?php
            $d = 0;
            foreach($sections as $i=>$slides) {
              echo '<div class="tab-pane fade show '.($d==0?'active':'').'" id="v-pills-'.$i.'" role="tabpanel" aria-labelledby="v-pills-'.$i.'"> ';

              $sliderId = 'tab'.$i;

              // carousel
              echo '<div id="'.$sliderId.'" class="carousel slide"  data-ride="carousel">';
                // indicators
                echo '<ol class="carousel-indicators">';
                for($k=0;$k<count($slides);$k++){
                  echo '<li data-target="#'.$sliderId.'" data-slide-to="'.$k.'" class="'.($k==0?'active':'').'"></li>';
                }
                echo  '</ol>';
                // indicator end

                // carousel-inner
                echo '<div class="carousel-inner">';

                foreach($slides as $j => $slide)  {
                  // // carousel-item
                  echo '<div class="carousel-item '.($j==0?'active':'').'">';
                  echo '<img src="'.IMAGE_URL.$slide['slide_image'].'">';
                  echo '<div class="carousel-caption d-none d-md-block">';
                  echo '<h5>'.$slide['slide_title'].'</h5>';
                  echo '<p>'.$slide['slide_description'].'</p>';
                  echo '<div class="more">Learn More '.$arrow.' </div>';
                  echo '</div> <!-- carousel-caption -->';
                  echo '</div> <!-- carousel-item -->';
                } // end foreach

                // end slider container
                echo '</div> <!-- carousel-inner -->';

              // carousel
              echo '</div> <!-- carousel -->';

              // end tab-pane
              echo '</div> <!-- tab-pane -->';

              $d++;
            } //end foreach
          ?>
        </div> <!-- tab-content -->
      </div> <!-- col-9 -->
    </div> <!-- row -->
  </div> <!-- container -->
</div> <!-- wpoets -->

<script type="text/javascript" src="/assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.bundle.min.js"></script>
<?php
include_once("partials/footer.php");
<?php
include_once "connection.php";

// Page Title form section
$sql = "SELECT * FROM ".PAGE_TABLE;
$stmt = $conn->prepare($sql);
$stmt->execute();
$page = get_result($stmt)[0];

$page_title = $page['page_title'];
$page_description = $page['page_description'];


// Tabs Form Section
$sql = "SELECT * FROM ".TABS_TABLE;
$stmt = $conn->prepare($sql);
$stmt->execute();
$tabs = get_result($stmt);

// echo '<pre> tabs'; print_r($tabs); echo '</pre>';

$tabJsonData = [];
$tabs_html = "";

foreach($tabs as $i=>$tab) {
  $tabJsonData[$i]['tab_id'] = $tab['tab_id'];
  $tabJsonData[$i]['tab_icon'] = $tab['tab_icon'];
  $tabJsonData[$i]['tab_title'] = $tab['tab_title'];
  $tabs_html .= "<div class='row' id='tab_row-".$tab['tab_id']."'>";
  $tabs_html .= "  <div class='col-md-1'>".($i+1)."</div>";
  $tabs_html .= "  <div class='col-md-1'>".$tab['tab_id']."</div>";
  $tabs_html .= "  <div class='col-md-2'> <img src='".ICON_URL.$tab['tab_icon']."'> </div>";
  $tabs_html .= "  <div class='col-md-5'>".$tab['tab_title']."</div>";
  $tabs_html .= "  <div class='col-md-3'><a href='/crud.php?edit=tab&tab_id=".$tab['tab_id']."#tabs' class='btn btn-primary' >Edit</a> / <a href='/edit_delete.php?delete=tab&tab_id=".$tab['tab_id']."' class='btn btn-primary' onclick='return confirm(\"Confirm Delete\");'>Delete</a></div>";
  $tabs_html .= "</div>";
}

$tabs_html .= "<script type='text/javascript'>
let tabJsonData=JSON.parse('".json_encode($tabJsonData)."');
let icon_dir_url = '".ICON_URL."';
let image_dir_url = '".IMAGE_URL."';
</script>";

// when editing the Tabs Section
$tab_title = "";
$tab_icon = "";
$tab_id = 0;

if(isset($_GET['edit']) && $_GET['edit'] == 'tab') {
  $tab_id = filter_var($_GET['tab_id'], FILTER_SANITIZE_STRING);

  $sql = "SELECT * FROM ".TABS_TABLE." WHERE tab_id = ? ";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $tab_id);
  $stmt->execute();
  $edit_tabs = get_result($stmt)[0];

  $tab_title = $edit_tabs['tab_title'];
  $tab_icon = $edit_tabs['tab_icon'];
}


// Tab Slider Section
$sql = "SELECT * FROM ".TABS_SLIDE_TABLE;
$stmt = $conn->prepare($sql);
$stmt->execute();
$slides = get_result($stmt);

$tabSlideJsonData = [];
$slide_html = "";

foreach($slides as $i=>$slide) {
  $tabSlideJsonData[$i]['slide_id'] = $slide['slide_id'];
  $slide_html .= "<div class='row' id='tab_slide_row-".$slide['slide_id']."'>";
  $slide_html .= "  <div class='col-md-1'>".($i+1)."</div>";
  $slide_html .= "  <div class='col-md-1'>".$slide['tab_id']."</div>";
  $slide_html .= "  <div class='col-md-1'> <img src='".IMAGE_URL.$slide['slide_image']."'> </div>";
  $slide_html .= "  <div class='col-md-2'>".$slide['slide_title']."</div>";
  $slide_html .= "  <div class='col-md-5'>".$slide['slide_description']."</div>";
  $slide_html .= "  <div class='col-md-2'><a href='/crud.php?edit=slide&slide_id=".$slide['slide_id']."#tab_slide' class='btn btn-primary' >Edit</a> / <a href='/edit_delete.php?delete=slide&slide_id=".$slide['slide_id']."' class='btn btn-primary' onclick='return confirm(\"Confirm Delete\");'>Delete</a></div>";
  $slide_html .= "</div>";
}

// when editing the Tabs Section
$slide_title = "";
$slide_description = "";
$slide_id = 0;
$slide_image = "";
$slide_tab_id = "";

if(isset($_GET['edit']) && $_GET['edit'] == 'slide') {
  $slide_id = filter_var($_GET['slide_id'], FILTER_SANITIZE_STRING);

  $sql = "SELECT * FROM ".TABS_SLIDE_TABLE." WHERE slide_id = ? ";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $slide_id);
  $stmt->execute();
  $slider = get_result($stmt)[0];

  $slide_title = $slider['slide_title'];
  $slide_description = $slider['slide_description'];
  $slide_image = $slider['slide_image'];
  $slide_id = $slider['slide_id'];
  $slide_tab_id = $slider['tab_id'];
}

$slide_html .= "<script type='text/javascript'>
let tabSlideJsonData=JSON.parse('".json_encode($tabSlideJsonData)."');
let selectedSlideTabOption = '".$slide_tab_id."';
</script>";
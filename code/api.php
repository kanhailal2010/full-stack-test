<?php
// This file will process all backend features.

include('connection.php');

// page section
if(isset($_POST['page_form'])) {
  $title = filter_var($_POST['page_title'], FILTER_SANITIZE_STRING);
  $description = filter_var($_POST['page_description'], FILTER_SANITIZE_STRING);

  $sql = "UPDATE ".PAGE_TABLE." SET page_title=?, page_description=? ";
  // $sql .= "VALUES (?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('ss', $title, $description);

  $return = [];
  $return['msg'] = 'Failed';
  if($stmt->execute()) {
    $return['msg'] = "Success";
  }

  echo json_encode($return);
}

// Tab Section
if(isset($_POST['tab_id'])) {
  $title = filter_var($_POST['tab_title'], FILTER_SANITIZE_STRING);
  $id = filter_var($_POST['tab_id'], FILTER_SANITIZE_STRING);
  $icon = [filter_var($_POST['tab_icon'], FILTER_SANITIZE_STRING)];

  $return = [];
  $return['msg'] = 'Failed';

  // handle icon image file upload
  $output_dir = UPLOAD_ICON_DIR;
  $return['dir'] = $output_dir;
  $fieldname = "icons";
  include_once('imageHandler.php');
  if(isset($_FILES[$fieldname]) && !empty($_FILES[$fieldname]['size'][0])) {
    $icon = handleImageUpload($fieldname, $output_dir);
  }

  // update
  if(!empty($_POST['tab_id'])) {
    $return['type'] = 'updated';
    $sql = "UPDATE ".TABS_TABLE." SET tab_title=?, tab_icon=? ";
    $sql .= " WHERE tab_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $title, $icon[0], $id);
  }
  // create
  else {
    $return['type'] = 'created';
    $sql = "INSERT INTO ".TABS_TABLE." (tab_title, tab_icon)";
    $sql .= " VALUES (?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $title, $icon[0]);
    $id = $conn->insert_id;
  }


  if($stmt->execute()) {
    $return['msg'] = "Success";
    $return['data'] = ['tab_id' => $id, 'tab_icon' => $icon[0], 'tab_title' => $title ];
  }

  echo json_encode($return);

}

// Tab Slider Section
if(isset($_POST['slide_id'])) {
  $title = filter_var($_POST['slide_title'], FILTER_SANITIZE_STRING);
  $description = filter_var($_POST['slide_description'], FILTER_SANITIZE_STRING);
  $id = filter_var($_POST['slide_id'], FILTER_SANITIZE_STRING);
  $tab_id = filter_var($_POST['slide_tab_id'], FILTER_SANITIZE_STRING);
  $image = [filter_var($_POST['slide_image'], FILTER_SANITIZE_STRING)];

  $return = [];
  $return['msg'] = 'Failed';

  // handle image file upload
  $output_dir = UPLOAD_IMAGE_DIR;
  $fieldname = "images";
  include_once('imageHandler.php');
  if(isset($_FILES[$fieldname]) && !empty($_FILES[$fieldname]['size'][0])) {
    $image = handleImageUpload($fieldname, $output_dir);
  }

  // update
  if(!empty($_POST['slide_id'])) {
    $return['type'] = 'updated';
    $sql = "UPDATE ".TABS_SLIDE_TABLE." SET slide_title=?, slide_description=?, slide_image=? ";
    $sql .= " WHERE slide_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssi', $title, $description, $image[0], $id);
  }
  // create
  else {
    $return['type'] = 'created';
    $sql = "INSERT INTO ".TABS_SLIDE_TABLE." (tab_id, slide_title, slide_description, slide_image)";
    $sql .= " VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isss', $tab_id, $title, $description, $image[0]);
    $id = $conn->insert_id;
  }

  if($stmt->execute()) {
    $return['msg'] = "Success";
    $return['data'] = ['slide_id' => $id, 'tab_id' => $tab_id, 'slide_image' => $image[0], 'slide_title' => $title, 'slide_description' => $description ];
  }
  else {
    $return['error'] = $conn->error;
  }

  echo json_encode($return);
}
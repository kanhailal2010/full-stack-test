<?php
include "connection.php";

// delete tabs section
if(isset($_GET['delete']) && $_GET['delete'] == 'tab') {
  $tab_id = filter_var($_GET['tab_id'], FILTER_SANITIZE_STRING);

  $sql = "DELETE FROM ".TABS_TABLE." WHERE tab_id = ? ";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $tab_id);
  $stmt->execute();
  $edit_tabs = get_result($stmt)[0];

  Redirect('crud.php#tabs');
}

// delete tab slider section
if(isset($_GET['delete']) && $_GET['delete'] == 'slide') {
  $slide_id = filter_var($_GET['slide_id'], FILTER_SANITIZE_STRING);

  $sql = "DELETE FROM ".TABS_TABLE." WHERE slide_id = ? ";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $slide_id);
  $stmt->execute();
  $edit_tabs = get_result($stmt)[0];

  Redirect('crud.php#tabs');
}
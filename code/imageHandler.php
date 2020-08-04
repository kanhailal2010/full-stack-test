<?php
// image file uploader
function generateFilename($fileName) {
  $e = explode(".", $fileName);
  return round(microtime(true) * 1000).'.'.$e[count($e) - 1];
}

function handleImageUpload($fieldname, $output_dir) {
  $ret = [];

  $error =$_FILES[$fieldname]["error"];
  //If Any browser does not support serializing of multiple files using FormData()
  if(!is_array($_FILES[$fieldname]["name"])) //single file
  {
    $fileName = generateFilename($_FILES[$fieldname]["name"]);
    move_uploaded_file($_FILES[$fieldname]["tmp_name"],$output_dir.$fileName);
      $ret[]= $fileName;
  }
  else  //Multiple files, file[]
  {
    $fileCount = count($_FILES[$fieldname]["name"]);
    for($i=0; $i < $fileCount; $i++)
    {
      $fileName = generateFilename($_FILES[$fieldname]["name"][$i]);
    move_uploaded_file($_FILES[$fieldname]["tmp_name"][$i],$output_dir.$fileName);
      $ret[]= $fileName;
    }
  }
  return $ret;
    // echo json_encode($ret);
 }
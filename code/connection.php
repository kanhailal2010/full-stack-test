<?php
include_once("config.php");

// DB Connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
// $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

function get_result($Statement) {
  $RESULT = array();
  $Statement->store_result();
  for ($i = 0; $i < $Statement->num_rows; $i++) {
    $Metadata = $Statement->result_metadata();
    $PARAMS   = array();
    while ($Field = $Metadata->fetch_field()) {
      $PARAMS[] =& $RESULT[$i][$Field->name];
    }
    call_user_func_array(array(
      $Statement,
      'bind_result'
    ), $PARAMS);
    $Statement->fetch();
  }
  return $RESULT;
}

function Redirect($url = '', $permanent = false) {
  header('Location: ' . SITE_URL . $url, true, $permanent ? 301 : 302);
  exit();
}
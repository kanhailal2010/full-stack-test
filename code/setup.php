<?php
echo json_encode([
  'name' => "Kanhai Lal Murmu",
  'experience' => "7 Years",
  'pros' => ["Quick Learner", "Self Motivated", "Capable of working independently", "Team Managing skills"],
  "Technical Skills" => ["Knowledge of Docker", "Amazon AWS, Google Cloud(Create and manage instances)", "Knowledge of LINUX", "GIT for versioning", "Agile Methodology"],
  "PHP frameworks" => ["Wordpress", "CodeIgniter", "Laravel", "Phalcon"],
  "JS Frameworks" => ["React JS", "Node JS"],
  "Mobile" => "Flutter",
  "hobbies" => ["Bike Riding", "Guitar Playing", "Table Tennis"]
]); exit();
// This will create database and tables for this app

include_once("config.php");

// DB Connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD);

// create database
$sql = "CREATE DATABASE IF NOT EXISTS ".DB_NAME;
$stmt = $conn->prepare($sql);
$stmt->execute();

// use the created database
$conn->select_db(DB_NAME);

// create page_details table
$sql = "CREATE TABLE IF NOT EXISTS `".PAGE_TABLE."` (";
$sql .= "`page_id` int(10) NOT NULL AUTO_INCREMENT,";
$sql .= "`page_title` varchar(100) NOT NULL DEFAULT 'Page Title',";
$sql .= "`page_description` varchar(255) NOT NULL DEFAULT 'Page Description',";
$sql .= "PRIMARY KEY (`page_id`)";
$sql .= ")";

$stmt = $conn->prepare($sql);
$stmt->execute();

// create Tabs table
$sql = "CREATE TABLE IF NOT EXISTS `".TABS_TABLE."` (";
$sql .= "`tab_id` int(10) NOT NULL AUTO_INCREMENT,";
$sql .= "`tab_title` varchar(100) NOT NULL DEFAULT 'TAB Title',";
$sql .= "`tab_icon` varchar(100) NOT NULL DEFAULT 'default_icon.jpg',";
$sql .= "PRIMARY KEY (`tab_id`)";
$sql .= ")";
$stmt = $conn->prepare($sql);
$stmt->execute();

// create tab slides table
$sql = "CREATE TABLE IF NOT EXISTS `".TABS_SLIDE_TABLE."` (";
$sql .= "`slide_id` int(10) NOT NULL AUTO_INCREMENT,";
$sql .= "`tab_id` int(10) NOT NULL,";
$sql .= "`slide_title` varchar(100) NOT NULL DEFAULT 'Slide Title',";
$sql .= "`slide_description` varchar(255) NOT NULL DEFAULT 'Slide Description',";
$sql .= "`slide_image` varchar(100) NOT NULL DEFAULT 'default_img.jpg',";
$sql .= "PRIMARY KEY (`slide_id`)";
$sql .= ")";
$stmt = $conn->prepare($sql);
$stmt->execute();


include "partials/header.php";
?>
<div class="container index-container">
  <div class="row align-items-center h-100">
    <div class="col-sm-11 col-md-9 mx-auto">
      <div class="card text-white bg-warning">
        <div class="card-body">
          <h3 class="card-title text-center">Database and Tables created Successfullly.</h3>

          <p> You can insert dummy data using the provided sql file <code>wpoets.sql</code></p>

          <p>
            Use the app to create, read, update and delete contents.
            </br>
            <a href="/crud.php" target="_blank" class="btn text-white border-light" >CRUD App</a>
            <a href="/view.php" target="_blank" class="btn text-white border-light float-right" > View Result Page </a>
          </p>
        </div>
      </div> <!-- card -->
    </div> <!-- col-11 -->
  </div> <!-- row -->
</div> <!-- container -->


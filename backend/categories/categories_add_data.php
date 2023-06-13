<?php
require_once("../db_connect.php");
// print_r($_POST);
// die();
session_start();
$category_name = htmlspecialchars(trim($_POST["category_name"]));

$flag = false;

if ($category_name) { 
  $_SESSION["old_category_name"] = $category_name; 
}else{
  $flag = true;
  $_SESSION["category_name_error"] = "Category Name is required";  
}

if ($flag) {
  header("location:./categories_add.php");
}else{
  $insert_categories_query = " INSERT INTO `categories`( `category_name`) VALUES ('$category_name')";
  $insert_categories_query_to_db = mysqli_query($db_connect, $insert_categories_query);

  $_SESSION["success"] = "<h4>Category Added Successfully</h4>";
  header("location:./categories.php");
}
?>


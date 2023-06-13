<?php
require_once('../db_connect.php');
session_start();


$category_name = htmlspecialchars(trim($_POST['category_name']));


$id =$_POST['id'];

// print_r($_POST);
// die();
// print_r($_GET['id']);
if (isset($_POST['category_name'])) {
if ($category_name) {
  $category_update_data_query =" UPDATE categories SET
  category_name = '$category_name'
  WHERE id = $id ";
  $category_update_data_query_to_db = mysqli_query($db_connect, $category_update_data_query);
  $_SESSION["success"] = "<h4>Category Edited successfully</h4>";
  header("location:./categories.php");


}else{
  $_SESSION['edit_error'] = "All field are required";
  header("location:./categories_edit.php?id={$id}");
}


}

?>
<?php
require_once("../db_connect.php");
// print_r($_POST);
// die();
session_start();
$question_id = htmlspecialchars(trim($_POST["question_id"]));
$category_name = htmlspecialchars(trim($_POST["category_name"]));
$question_text = htmlspecialchars(trim($_POST["question_text"]));
$points = htmlspecialchars(trim($_POST["points"]));

$flag = false;

if ($question_id) { 
  $_SESSION["old_question_id"] = $question_id; 
}else{
  $flag = true;
  $_SESSION["question_id_error"] = "Question Id is required";  
}
if ($category_name) { 
  $_SESSION["old_category_name"] = $category_name; 
}else{
  $flag = true;
  $_SESSION["category_name_error"] = "Category Name is required";  
}
if ($question_text) { 
  $_SESSION["old_question_text"] = $question_text; 
}else{
  $flag = true;
  $_SESSION["question_text_error"] = "Question Text is required";  
}
if ($points) { 
  $_SESSION["old_points"] = $points; 
}else{
  $flag = true;
  $_SESSION["points_error"] = "Point is required";  
}

if ($flag) {
  header("location:./questions_add.php");
}else{
  $insert_questions_query = " INSERT INTO `questions`( `question_id`,`category_name`,`question_text`, `points`) VALUES ('$question_id','$category_name','$question_text','$points')";
  $insert_questions_query_to_db = mysqli_query($db_connect, $insert_questions_query);

  $_SESSION["success"] = "<h4>Question Added Successfully</h4>";
  header("location:./questions.php");
}
?>


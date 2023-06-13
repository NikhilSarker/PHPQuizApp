<?php
require_once("../db_connect.php");
// print_r($_POST);
// die();
session_start();
$question_id = htmlspecialchars(trim($_POST["question_id"]));
$option_text = htmlspecialchars(trim($_POST["option_text"]));
$is_correct = htmlspecialchars(trim($_POST["is_correct"]));

$flag = false;

if ($question_id) { 
  $_SESSION["old_question_id"] = $question_id; 
}else{
  $flag = true;
  $_SESSION["question_id_error"] = "Question Id is required";  
}
if ($option_text) { 
  $_SESSION["old_option_text"] = $option_text; 
}else{
  $flag = true;
  $_SESSION["option_text_error"] = "Option Text is required";  
}
if ($is_correct == null) { 
  $flag = true;
  $_SESSION["is_correct_error"] = "Is Correct is required";  
}else{
  $_SESSION["old_is_correct"] = $is_correct; 
}


if ($flag) {
  header("location:./options_add.php");
}else{
  $insert_options_query = " INSERT INTO `options`( `question_id`,`option_text`,`is_correct`) VALUES ('$question_id','$option_text','$is_correct')";
  $insert_options_query_to_db = mysqli_query($db_connect, $insert_options_query);

  $_SESSION["success"] = "<h4>Option Added Successfully</h4>";
  header("location:./options.php");
}
?>


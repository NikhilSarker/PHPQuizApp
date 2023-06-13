<?php
require_once('../db_connect.php');
session_start();


$question_id = htmlspecialchars(trim($_POST['question_id']));
$category_name = htmlspecialchars(trim($_POST['category_name']));
$question_text = htmlspecialchars(trim($_POST['question_text']));
$points = htmlspecialchars(trim($_POST['points']));


$id =$_POST['id'];

// print_r($_POST);
// die();
// print_r($_GET['id']);

if (isset($_POST['question_id'])) {
  if ($question_id && $category_name && $question_text && $points ) {
    $question_update_data_query =" UPDATE questions  SET
    question_id = '$question_id',
    category_name = '$category_name',
    question_text = '$question_text',
    points = '$points'
    WHERE id = $id ";
    $question_update_data_query_to_db = mysqli_query($db_connect, $question_update_data_query);
    $_SESSION["success"] = "<h4>Question Edited successfully</h4>";
    header("location:./questions.php");

  }else{
    $_SESSION['edit_error'] = "All field are required";
    header("location:./questions_edit.php?id={$id}");
  }

}





?>
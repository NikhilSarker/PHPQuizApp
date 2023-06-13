<?php
require_once('../db_connect.php');
session_start();


$question_id = htmlspecialchars(trim($_POST['question_id']));
$option_text = htmlspecialchars(trim($_POST['option_text']));
$is_correct = htmlspecialchars(trim($_POST['is_correct']));


$id =$_POST['id'];

// print_r($_POST);
// die();
// print_r($_GET['id']);
if (isset($_POST['question_id'])) {
  if ($question_id != null && $option_text != null && $is_correct != null) {  
      $option_update_data_query =" UPDATE options SET
      question_id = '$question_id',
      option_text = '$option_text',
      is_correct = '$is_correct'
      WHERE id = $id ";
      $option_update_data_query_to_db = mysqli_query($db_connect, $option_update_data_query);
      $_SESSION["success"] = "<h4>Option Edited successfully</h4>";
      header("location:./options.php");  
        
  }else{
    $_SESSION['edit_error'] = "All field are required";
    header("location:./options_edit.php?id={$id}");
  }
}



?>
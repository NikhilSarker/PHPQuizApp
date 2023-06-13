<?php
require_once("./backend/db_connect.php");
session_start();

//CHECK TO SEE IS SET

if (!isset($_SESSION['score'])) {
  $_SESSION['score'] = 0;
}

$_SESSION['user_answer'] = $selected_option;



if ($_POST) {
  $question_id= $_POST['question_id'];
  $selected_option = $_POST['option_text'];

  //$_SESSION["select_option"] = $selected_option;
  // $question_id = $question_id++;
  if ($selected_option) {
    $next =  $question_id + 1;
  }
  else{
    $next =  $question_id ;
    $_SESSION["error"] = "*You have not selected any answer!";

  }
  
  // print_r(count($question_id));
  // die();
  // $next =  $question_id + 1;
 
 
//GET TOTAL QUESTIONS

$question_query = "SELECT * FROM questions";

//GET RESULT
$results =  mysqli_query( $db_connect, $question_query );
$total = $results->num_rows;
$result_to_array_question = mysqli_fetch_assoc($results);
$points = $result_to_array_question['points'];




// print_r($points);
// die();


//GET CORRECT OPTION
  $query = "SELECT * FROM `options` WHERE question_id = $question_id AND is_correct = 1";
  $result = mysqli_query( $db_connect, $query );
  $result_to_array = mysqli_fetch_assoc($result);
  $correct_option = $result_to_array['option_text'];
  $_SESSION['correct_answer'] = $correct_option;

// print_r("c".$correct_option);
// print_r("s".$selected_option);
// die();

//$_SESSION['total_score']= $total*$points;


  if ($correct_option == $selected_option) {

// $points =$points++;
// print_r($points);
// die();
$_SESSION['score']+=$points;
//$_SESSION['bg_color']= "red";

// $_SESSION["color"] = "<li style='background-color:red'>";
// print_r($correct_option);
// die();



   
  }

  if ($question_id == $total && $selected_option != null ){
    header("location: ./final.php");

    
  }else{
    header("location: ./question.php?id=".$next);
  }

}

?>




<?php
require_once("./backend/db_connect.php");
session_start();


//GET RESULT
$question_query = "SELECT * FROM `questions`";
$results =  mysqli_query($db_connect, $question_query);
$result_to_array = mysqli_fetch_assoc($results);
$total = $results->num_rows;
$points = $result_to_array['points'];

$total_score = $total * $points;
//OPTION
// $number = (int)$_GET['id'];
// $option_query = "SELECT * FROM `options` WHERE question_id= $number";
// $option = mysqli_query($connect, $option_query);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Code Quiz</title>

	<link href="./style.css" type="text/css" rel="stylesheet">

</head>

<body>
<header>

<div class="navbar">
	<div class="logo"><a href="./index.php"><img src="./images/logo.png" alt="logo" width="100px" height="65px"></a></div>
	<div class="nav_items">
		<ul>
			<li><a href="./index.php">HOME</a></li>
			<li><a href="./main.php">HTML</a></li>
			<li><a href="#">Log in</a></li>
			<li><a href="#">Register</a></li>
		</ul>
	</div>
</div>



</header>
	<main class="main">
		<div class="final">
      <h2>You are done!</h2>
			<?php
        if (isset($_SESSION["score"]) && $_SESSION["score"] > ($total*6) ) {
					echo "<p>Congrats! You have completed the test successfully.</p>";
				}else{
					echo "<p>You need more practice. you can follow these websites!</p>";
					echo '<a  href="https://www.w3schools.com/html/" target="_blank">w3school</a>&nbsp;&nbsp;&nbsp;';
					echo '<a  href="https://developer.mozilla.org/en-US/docs/Learn/HTML" target="_blank">Mozilla</a>&nbsp;&nbsp;&nbsp;';
					echo '<a  href="https://www.freecodecamp.org/news/learn-html-beginners-course/" target="_blank">FreeCodeCamp</a>&nbsp;&nbsp;&nbsp;';
					echo '<a  href="https://www.codecademy.com/learn/learn-html" target="_blank">Codecademy</a><br>';
					
				}

      ?>
	

		
      <p>You got: 	
			<?php if (isset($_SESSION["score"])) {
                       print_r(($_SESSION["score"]/ $total)*10);
                    }?>%
				
			</p>

      <p>Your Final Score: 
			<?php if (isset($_SESSION["score"])) {
                        print_r($_SESSION["score"]);
                      }?>
											
											<br>
     Total Score: <?= $total_score  ?>
		 </p>
      <!-- <a href="question.php?id=1" class="start " >Take Again</a> -->
      <a href="./main.php" class="start " >Take Again</a>

		</div>

	</main>
	<footer class="footer">
		<div class="container">
			<p>copyright&copy;2023 | Code Quiz</p>
		</div>
	</footer>

</body>

</html>
<?php session_unset(); ?>
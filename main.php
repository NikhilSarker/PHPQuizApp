<?php
require_once("./backend/db_connect.php");
session_start();
if (isset($_SESSION['score'])) {
	$_SESSION['score']= 0;
}


$question_query = "SELECT * FROM questions";

$result = mysqli_query($db_connect, $question_query);

$total = $result->num_rows;

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Code Quiz</title>

	<link href="./style.css" type="text/css" rel="stylesheet">

</head>

<body>

	<!-- <div class="container">
		<h1>HTML QUIZ</h1>
	</div> -->
	<header>

		<div class="navbar">
			<div class="logo"><a href="./index.php"><img src="./images/logo.png" alt="logo" width="100px" height="65px"></a></div>
			<div class="nav_items">
				<ul>
					<li><a href="./index.php">HOME</a></li>
					<li><a href="main.php">HTML</a></li>
				</ul>
			</div>
		</div>



	</header>


	<main class="main">
	
		<section >
		
		
				<div class="main_page">
					<h2>Test Your HTML Knowledge</h2>
					<p>This is a multiple choice quiz to test your knowledge of HTML.</p>
					<ul>
						<li><strong>Number of Question: </strong><?= $total ?></li>
						<li><strong>Type: </strong>Multiple Choice</li>
						<li><strong>Estimated Time: </strong><?= $total * 0.5 ?> Minutes</li>
					</ul>
					<a href="question.php?id=1" class="start">Start Quiz</a>
				

				</div>
				

		</section>



	</main>
	<footer>
		<div class="footer">
			<p>copyright&copy;2023 | Code Quiz</p>
		</div>
	</footer>







</body>

</html>
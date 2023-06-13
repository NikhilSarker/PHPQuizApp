<?php
require_once("./backend/db_connect.php");

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
			<div class="logo"><a href="./index.php"><img src="./images/logo.png" alt="logo" width="150px" height="150px"></a></div>
			<div class="nav_items">
				<ul>
					<li><a href="./index.php">HOME</a></li>
					<li><a href="main.php">HTML</a></li>
					<li><a href="#">Log in</a></li>
					<li><a href="#">Register</a></li>
				</ul>
			</div>
		</div>



	</header>


	<main>
		<section class="banner">
			<div class="banner_part_left">
				<h2>Get hired first time...</h2>
				<p>We Are Happily Providing High-Quality <br>
					Practice Tests Since Year <span>2023</span>
				</p>
			</div>
			<div class="banner_part_right">
				<img src="./images/bannerimage.png" alt="logo" width="400px" height="400px">
			</div>
		</section>
		<section class="html_part">
			<div class="html_part_left">
				<img src="./images/html.png" alt="logo" width="400px" height="400px">
			</div>
			<div class="html_part_right">
				<div>
					<h2>HTML Test - HTML Practice Test</h2>
				<p>This is a free practice HTML quiz that will help you get knowledge for the job interview. We provide new developers with a free, simple-to-understand HTML quiz online, so they may become familiar with the format of questions and the kinds of questions they will encounter in order to pass the job interview and learn more quickly. For a successful conclusion, the interview pass requires extensive preparation, and our useful quiz helps you prepare as much as you can.</p>
					<a href="main.php" class="start">Start Quiz</a>

				</div>
				
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
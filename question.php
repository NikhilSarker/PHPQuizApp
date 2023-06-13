<?php
require_once("./backend/db_connect.php");
session_start();
//Set Question Number
$number = (int)$_GET['id'];

//Get Question
$query = "SELECT * FROM `questions` WHERE question_id= $number";
$result = mysqli_query($db_connect, $query);
$result_to_array = mysqli_fetch_assoc($result);

$points = $result_to_array['points'];

//GET RESULT
$question_query = "SELECT * FROM `questions`";
$results =  mysqli_query($db_connect, $question_query);
$total = $results->num_rows;

$total_score = $total * $points;


//OPTION
$option_query = "SELECT * FROM `options` WHERE question_id= $number";
$option = mysqli_query($db_connect, $option_query);
//GET CORRECT OPTION
$query = "SELECT * FROM `options` WHERE question_id = $number AND is_correct = 1";
$result = mysqli_query( $db_connect, $query );
$option_to_array = mysqli_fetch_assoc($result);
//$correct_option = $result_to_array['option_text'];
// print_r($option_to_array['option_text']);



?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Code Quiz</title>

  <link href="./style.css" type="text/css" rel="stylesheet">

</head>

<body>
  <div class="container">
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
      <h3>Your Current Score: <?php if (isset($_SESSION["score"])) {
                                print_r($_SESSION["score"]);
                              } else {
                                echo 0;
                              } ?> <br>
        Total Score: <?= $total_score  ?>
      </h3>

      <!-- <h3>Out of: 40</h3> -->
      <h3 id="first_error" style= "color:red"> </h3>
      <h3 style= "color:red"> <?php
          if (isset($_SESSION["error"])) : ?>
      <div class="error-display bg-danger text-danger text-center">
        <strong></strong><?= $_SESSION["error"] ?></strong>
      </div>
      <?php
          endif;
          unset($_SESSION["error"]);
      ?></h3>

      


      <div>
        <div class="current_question">Question <?= $result_to_array['question_id']; ?> of <?= $total; ?></div>
        <p class="question">
          <?= $result_to_array['question_text']; ?>
        </p>
        <form action="process.php" method="post">
          <ul id="option">
            <?php while ($record = mysqli_fetch_assoc($option)) : ?>
              <li id="option_text"><input type="radio" onclick="checkRadioButton()" class="option" id="option" name="option_text" value="<?= htmlspecialchars($record['option_text']) ?>"> <?= $record['option_text']; ?></li>

            <?php endwhile; ?>
          </ul>
          <h3 id="disp" style= "color:green"> </h3>
         <h3 id="error1" style= "color:red"> </h3>
         

          <input class="continue_btn" type="submit" value="Continue &gt;&gt;">
          <input type="hidden" name="question_id" value="<?= $result_to_array['question_id']; ?>">
        </form>
        
      </div>
    </main>
    <footer>
      <div class="footer">
        <p>copyright&copy;2023 | Code Quiz</p>
      </div>
    </footer>





  </div>
  <!-- <script src="./main.js"></script> -->
  <script>
    // const optionInput = document.getElementById("option");
   const correct_ans = "<?=$option_to_array['option_text'];?>";
  //  const optionItem = document.querySelectorAll(".option");
    function checkRadioButton() {  
            var getSelectedValue = document.querySelector( 
                'input[name="option_text"]:checked'); 
              
            if(getSelectedValue != null) { 
           
                 //optionItem  = getSelectedValue.value ; 
                

                    if (getSelectedValue.value == correct_ans) {  
                                 
                      document.getElementById("disp").innerHTML 
                    =  getSelectedValue.value + " is correct answer. Congrats!"; 
                   
                    
                      
                    }else{
                      document.getElementById("error1").innerHTML 
                    = getSelectedValue.value + " is wrong answer! Try again."; 
                      // alert("no");
                 
                      
                    }
      
            } 

        }  


// GET VALUE FUNCTION DONE

            
        //       function checkSubmit() {  
        //     var getSelectedValue = document.querySelector( 
        //         'input[name="option_text"]:checked'); 
              
        //     if(getSelectedValue == null) { 
        //       document.getElementById("first_error").innerHTML 
        //             = "*You have not selected any answer!"; 
        //             return false;
        //     } 
           
  
        // }  
            



  </script>
</body>

</html>



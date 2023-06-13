<?php
require_once('../layouts/header.php');

?>
<link href="./style.css" type="text/css" rel="stylesheet">
<div id="add_main">
<div id="container">
  <div class="form-wrap">
    <h2>Add Question</h2>

    <form action="questions_add_data.php" method="post" >
      <div class="form-group"> 
      <label for="question_id">Question ID:</label>      
        <input type="number" name="question_id" id="question_id" value="             
        <?= isset($_SESSION['old_question_id']) ? $_SESSION['old_question_id'] : '' ?>   
        <?php        
        unset($_SESSION['old_question_id']);
        ?>">

        <!-- ERROR DISPLAY -->
        
        <?php if (isset($_SESSION["question_id_error"])): ?>
        <strong class="text-danger"><?=$_SESSION["question_id_error"];?></strong>
          
        <?php
        endif;
        unset($_SESSION["question_id_error"]);
        ?>
      </div>

      <div class="form-group"> 
      <label for="category_name">Category Name:</label>            
        <input type="text" name="category_name" id="category_name" value="             
        <?= isset($_SESSION['old_category_name']) ? $_SESSION['old_category_name'] : '' ?>   
        <?php        
        unset($_SESSION['old_category_name']);
        ?>">


        <!-- ERROR DISPLAY -->
        
        <?php if (isset($_SESSION["category_name_error"])): ?>
        <strong class="text-danger"><?=$_SESSION["category_name_error"];?></strong>
          
        <?php
        endif;
        unset($_SESSION["category_name_error"]);
        ?>

      </div>
      <div class="form-group"> 
      <label for="question_text">Question Text:</label>         
        <input type="text" name="question_text" id="question_text" value="             
        <?= isset($_SESSION['old_question_text']) ? $_SESSION['old_question_text'] : '' ?>   
        <?php        
        unset($_SESSION['old_question_text']);
        ?>">


        <!-- ERROR DISPLAY -->
        
        <?php if (isset($_SESSION["question_text_error"])): ?>
        <strong class="text-danger"><?=$_SESSION["question_text_error"];?></strong>
          
        <?php
        endif;
        unset($_SESSION["question_text_error"]);
        ?>

      </div>
      <div class="form-group"> 
      <label for="points">Points:</label>        
        <input type="number" name="points" id="points" value="             
        <?= isset($_SESSION['old_points']) ? $_SESSION['old_points'] : '' ?>   
        <?php        
        unset($_SESSION['old_points']);
        ?>">


        <!-- ERROR DISPLAY -->
        
        <?php if (isset($_SESSION["points_error"])): ?>
        <strong class="text-danger"><?=$_SESSION["points_error"];?></strong>
          
        <?php
        endif;
        unset($_SESSION["points_error"]);
        ?>

      </div>


      <button type="submit" class="btn">Add Question</button>

    </form>

    <p class="list"><a href="questions.php"><i class="fa fa-arrow-circle-left"></i> Return to Questions List</a></p>
  </div>
</div>
</div>
<?php
require_once('../layouts/footer.php');

?>
    






















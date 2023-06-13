<?php
require_once('../layouts/header.php');

?>
<link href="./style.css" type="text/css" rel="stylesheet">
<div id="add_main">
<div id="container">
  <div class="form-wrap">
    <h2>Add Option</h2>

    <form action="options_add_data.php" method="post" >
      <div class="form-group"> 
      <label for="question_id">Question ID:</label>      
        <input type="number" name="question_id" id="question_id">

        <!-- ERROR DISPLAY -->
        
        <?php if (isset($_SESSION["question_id_error"])): ?>
        <strong class="text-danger"><?=$_SESSION["question_id_error"];?></strong>
          
        <?php
        endif;
        unset($_SESSION["question_id_error"]);
        ?>
      </div>

      <div class="form-group"> 
      <label for="option_text">Option Text:</label>            
        <input type="text" name="option_text" id="option_text" >


        <!-- ERROR DISPLAY -->
        
        <?php if (isset($_SESSION["option_text_error"])): ?>
        <strong class="text-danger"><?=$_SESSION["option_text_error"];?></strong>
          
        <?php
        endif;
        unset($_SESSION["option_text_error"]);
        ?>

      </div>
      <div class="form-group"> 
      <label for="is_correct">Is Correct:</label>         
        <input type="number" name="is_correct" id="is_correct" >


        <!-- ERROR DISPLAY -->
        
        <?php if (isset($_SESSION["is_correct_error"])): ?>
        <strong class="text-danger"><?=$_SESSION["is_correct_error"];?></strong>
          
        <?php
        endif;
        unset($_SESSION["is_correct_error"]);
        ?>

      </div>
      <button type="submit" class="btn">Add Option</button>

    </form>

    <p class="list"><a href="options.php"><i class="fa fa-arrow-circle-left"></i> Return to Options List</a></p>
  </div>
</div>
</div>
<?php
require_once('../layouts/footer.php');

?>

<?php
require_once('../layouts/header.php');
require_once('../db_connect.php');
//session_start();

//print_r($_GET['id']);
$id = $_GET['id'];

if( isset( $_GET['id'] ) )
{
 
  $option_data_query = 'SELECT *
    FROM options
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $db_connect, $option_data_query );
  //print_r(mysqli_num_rows( $result ));
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: options.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
  
}
?>

<link href="./style.css" type="text/css" rel="stylesheet">
<div id="add_main">
<div id="container">
  <div class="form-wrap">
    <h2>Edit Option</h2>
    <p> <?php
          if (isset($_SESSION["edit_error"])) : ?>
      <div class="error-display bg-danger text-danger text-center">
        <strong></strong><?= $_SESSION["edit_error"] ?></strong>
      </div>
      <?php
          endif;
          unset($_SESSION["edit_error"]);
      ?></p>
    
    <form action="options_edit_data.php" method="post" >
      <div class="form-group">
      <label for="question_id">Question ID:</label>
      <input type="number" name="question_id" id="question_id" value="<?=$record['question_id'] ; ?>">

     <input type="hidden" name="id" value="<?=$id?>">

      </div>
      <div class="form-group">
      <label for="option_text">Option Text:</label>
      <input type="text" name="option_text" id="option_text" value="<?=$record['option_text'] ; ?>">


      </div>
      <div class="form-group">
      <label for="is_correct">Is Correct:</label>
      <input type="number" name="is_correct" id="is_correct" value="<?=$record['is_correct'] ; ?>">


      </div>
      
      <button type="submit" name="all_info_edit" class="btn">Edit Option</button>

    </form>

    <p class="list"><a href="options.php"><i class="fa fa-arrow-circle-left"></i> Return to Options List</a></p>
  </div>
</div>
</div>
<?php
require_once('../layouts/footer.php');





























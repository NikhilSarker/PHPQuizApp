<?php
require_once('../layouts/header.php');
require_once('../db_connect.php');
//session_start();

//print_r($_GET['id']);
$id = $_GET['id'];

if( isset( $_GET['id'] ) )
{
 
  $user_data_query = 'SELECT *
    FROM categories
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $db_connect, $user_data_query );
  //print_r(mysqli_num_rows( $result ));
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: categories.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
  
}
?>

<link href="./style.css" type="text/css" rel="stylesheet">
<div id="add_main">
<div id="container">
  <div class="form-wrap">
    <h2>Edit Category</h2>
    <p> <?php
          if (isset($_SESSION["edit_error"])) : ?>
      <div class="error-display bg-danger text-danger text-center">
        <strong></strong><?= $_SESSION["edit_error"] ?></strong>
      </div>
      <?php
          endif;
          unset($_SESSION["edit_error"]);
      ?></p>
    
    <form action="categories_edit_data.php" method="post" >
      <div class="form-group">
      <label for="category_name">Category Name:</label>
      <input type="text" name="category_name" id="category_name" value="<?=$record['category_name'] ; ?>">

     <input type="hidden" name="id" value="<?=$id?>">

      </div>
      
      <button type="submit" name="all_info_edit" class="btn">Edit User</button>

    </form>

    <p class="list"><a href="categories.php"><i class="fa fa-arrow-circle-left"></i> Return to Categories List</a></p>
  </div>
</div>
</div>
<?php
require_once('../layouts/footer.php');















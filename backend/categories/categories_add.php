<?php
require_once('../layouts/header.php');

?>
<link href="./style.css" type="text/css" rel="stylesheet">
<div id="add_main">
<div id="container">
  <div class="form-wrap">
    <h2>Add Category</h2>

    <form action="categories_add_data.php" method="post" >
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
      <button type="submit" class="btn">Add Category</button>

    </form>

    <p class="list"><a href="categories.php"><i class="fa fa-arrow-circle-left"></i> Return to Categories List</a></p>
  </div>
</div>
</div>
<?php
require_once('../layouts/footer.php');

?>
    

















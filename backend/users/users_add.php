<?php
require_once('../layouts/header.php');

?>
<link href="../styles.css" type="text/css" rel="stylesheet">
<div id="add_main">
<div id="container">
  <div class="form-wrap">
    <h2>Add User</h2>

    <form action="users_add_data.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
     
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" value="             
        <?= isset($_SESSION['old_first_name']) ? $_SESSION['old_first_name'] : '' ?>   
        <?php        
        unset($_SESSION['old_first_name']);
        ?>">
        <!-- ERROR DISPLAY -->
        <?php if (isset($_SESSION["first_name_error"])): ?>
        <strong class="text-danger"><?=$_SESSION["first_name_error"];?></strong>
          
        <?php
        endif;
        unset($_SESSION["first_name_error"]);
        ?>

      </div>
      <div class="form-group">
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" value="             
        <?= isset($_SESSION['old_last_name']) ? $_SESSION['old_last_name'] : '' ?>   
        <?php        
        unset($_SESSION['old_last_name']);
        ?>">
        <?php
        if (isset($_SESSION["last_name_error"])): ?>
        <strong class="text-danger "><?=$_SESSION["last_name_error"];?></strong>
          
        <?php
        endif;
        unset($_SESSION["last_name_error"]);
        ?>

      </div>
      <div class="form-group">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="             
        <?= isset($_SESSION['old_email']) ? $_SESSION['old_email'] : '' ?>   
        <?php        
        unset($_SESSION['old_email']);
        ?>">
        <?php
        if (isset($_SESSION["email_error"])): ?>
        <strong class="text-danger "><?=$_SESSION["email_error"];?></strong>
          
        <?php
        endif;
        unset($_SESSION["email_error"]);
        ?>

      </div>
      <div class="form-group">

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" >
        <?php
        if (isset($_SESSION["password_error"])): ?>
        <strong class="text-danger "><?=$_SESSION["password_error"];?></strong>
          
        <?php
        endif;
        unset($_SESSION["password_error"]);
        ?>
      </div>
      <div class="form-group">
        <label for="profile_pic">Profile Picture:</label>
        <input type="file" name="profile_pic" id="profile_pic" value="             
        <?= isset($_SESSION['old_profile_pic']) ? $_SESSION['old_profile_pic'] : '' ?>   
        <?php        
        unset($_SESSION['old_profile_pic']);
        ?>">
      </div>
      <div class="form-group">
        <label for="bio">Bio:</label>
        <input type="text" name="bio" id="bio" value="             
        <?= isset($_SESSION['old_bio']) ? $_SESSION['old_bio'] : '' ?>   
        <?php        
        unset($_SESSION['old_bio']);
        ?>">
      </div>
      <div class="form-group">
        <label for="phone_number">Phone number:</label>
        <input type="text" name="phone_number" id="phone_number" value="             
        <?= isset($_SESSION['old_phone_number']) ? $_SESSION['old_phone_number'] : '' ?>   
        <?php        
        unset($_SESSION['old_phone_number']);
        ?>">
      </div>
      <div class="form-group">
        <label for="role">Role:</label>
        <select name="role" id="role">
          <option value="admin">Admin</option>
          <option value="user">User</option>
        </select>
        <?php
        if (isset($_SESSION["role_error"])): ?>
        <strong class="text-danger "><?=$_SESSION["role_error"];?></strong>
          
        <?php
        endif;
        unset($_SESSION["role_error"]);
        ?>
      </div>
      <div class="form-group">

        <label for="description">Description:</label> <br>
        <textarea name="description" id="description" cols="40" rows="7">             
        <?= isset($_SESSION['old_description']) ? $_SESSION['old_description'] : '' ?>   
        <?php        
        unset($_SESSION['old_description']);
        ?></textarea>

      </div>


      <button type="submit" class="btn">Add User</button>

    </form>

    <p class="list"><a href="users.php"><i class="fa fa-arrow-circle-left"></i> Return to User List</a></p>
  </div>
</div>
</div>
<?php
require_once('../layouts/footer.php');

?>
    
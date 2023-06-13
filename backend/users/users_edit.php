<?php
require_once('../layouts/header.php');
require_once('../db_connect.php');
//session_start();

//print_r($_GET['id']);
$id = $_GET['id'];

if( isset( $_GET['id'] ) )
{
 
  $user_data_query = 'SELECT *
    FROM users
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $db_connect, $user_data_query );
  //print_r(mysqli_num_rows( $result ));
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: users.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
  
}
?>

<link href="../styles.css" type="text/css" rel="stylesheet">
<div id="add_main">
<div id="container">
  <div class="form-wrap">
    <h2>Edit User</h2>
    <p> <?php
          if (isset($_SESSION["edit_error"])) : ?>
      <div class="error-display bg-danger text-danger text-center">
        <strong></strong><?= $_SESSION["edit_error"] ?></strong>
      </div>
      <?php
          endif;
          unset($_SESSION["edit_error"]);
      ?></p>
    
    <form action="users_edit_data.php" method="post" enctype="multipart/form-data">
      <div class="form-group">

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" value="<?=$record['first_name']?>">
        <input type="hidden" name="id" value="<?=$id?>">

      </div>
      <div class="form-group">


        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" value="<?=$record['last_name']?>">

      </div>
      <div class="form-group">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?=$record['email']?>">

      </div>
      <div class="form-group">

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="<?=$record['password']?>">
      </div>
      <div class="form-group">
        <label for="profile_pic">Profile Picture:</label>
        <input type="file" name="profile_pic" id="profile_pic" value="<?=$record['profile_pic']?>">
      </div>
      <div class="form-group">
        <label for="bio">Bio:</label>
        <input type="text" name="bio" id="bio" value="<?=$record['bio'] ?? ''?>">
      </div>
      <div class="form-group">
        <label for="phone_number">Phone number:</label>
        <input type="number" name="phone_number" id="phone_number" value="<?=$record['phone_number'] ?? ''?>">
      </div>
      <div class="form-group">
        <label for="role">Role:</label>
        <select name="role" id="role">
          <option value="admin" <?=$record['role'] === 'admin' ? 'Selected': ''  ?>>Admin</option>
          <option value="user" <?=$record['role'] === 'user' ? 'Selected': ''  ?>>User</option>
        </select>
      </div>
      <div class="form-group">

        <label for="description">Description:</label> <br>
        <textarea name="description" id="description" cols="40" rows="7"><?=$record['description'] ?? ''?></textarea>

      </div>


      <button type="submit" name="all_info_edit" class="btn">Edit User</button>

    </form>

    <p class="list"><a href="users.php"><i class="fa fa-arrow-circle-left"></i> Return to User List</a></p>
  </div>
</div>
</div>
<?php
require_once('../layouts/footer.php');


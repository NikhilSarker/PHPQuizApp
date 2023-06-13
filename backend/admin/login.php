<?php

require_once('./seeder.php');
session_start();
if (isset($_SESSION["user_id"])) {
  header("location:../dashboard/dashboard.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- FONTAWESOME LINK -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- BOOTSTRAP CDN LINK -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./style.css" type="text/css">
  <title>PHP Portfolio</title>

</head>

<body>
  <div id="container">
    <div class="form-wrap">
      <h1>PHP Portfolio</h1>
      <p>Login to access your dashboard.</p>
      <p> <?php
          if (isset($_SESSION["error"])) : ?>
      <div class="error-display bg-danger text-danger text-center">
        <strong><?= $_SESSION["error"] ?></strong>
      </div>
      <?php
          endif;
          unset($_SESSION["error"]);
      ?></p>

      <form action="login_data.php" method="post">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" placeholder="Enter your email" value="             
        <?= isset($_SESSION['old_email']) ? $_SESSION['old_email'] : '' ?>   
        <?php        
        unset($_SESSION['old_email']);
        ?>"/>
          <i class="fa-regular fa-envelope" aria-hidden="true"></i>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" placeholder="Enter your password" />
          <i class="fa-solid fa-key"></i>

        </div>
        <button type="submit" class="submit-btn">Log in</button>
      </form>
      </div>
    </div>
    <?php
    unset($_SESSION['error']);
    ?>
</body>

</html>
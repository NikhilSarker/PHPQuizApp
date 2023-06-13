<?php
require_once('../layouts/header.php');

?>
<link rel="stylesheet" href="./style.css">

<div id="main">
<ul id="dashboard">
  <li>
    <a href="../options/options.php">
      Manage Options
    </a>
  </li>
  <li>
    <a href="../questions/questions.php">
      Manage Questions
    </a>
  </li>
  <li>
    <a href="../categories/categories.php">
      Manage Categories
    </a>
  </li>
  <li>
    <a href="../users/users.php">
      Manage Users
    </a>
  </li>
  <li>
    <a href="../admin/logout.php">
      Logout
    </a>
  </li>
</ul>
</div>
<?php
require_once('../layouts/footer.php');

?>
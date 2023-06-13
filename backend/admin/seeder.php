<?php
require_once('../db_connect.php');
function adminSeeding($db_connect){
  $insert_admin_query = " INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `profile_pic`, `bio`, `phone_number`, `role`, `description`) 
  VALUES ('Nikhil','Sarker','nikhil@gmail.com', 'password', null, null, null,'admin', null)";
  mysqli_query($db_connect, $insert_admin_query);
}

$checking_query = " SELECT COUNT(*) AS result FROM `users` WHERE email ='nikhil@gmail.com' ";
$checking_query_to_db = mysqli_query($db_connect, $checking_query);
$result_to_array = mysqli_fetch_assoc($checking_query_to_db)['result'];

if (!$result_to_array) {
  adminSeeding($db_connect);
}
?>
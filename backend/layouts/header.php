<?php
require_once('../db_connect.php');
session_start();

if (!isset($_SESSION['user_id'])) {
  header('location:../admin/login.php');
}



$checking_query = " SELECT first_name, last_name FROM `users` ";
$checking_query_to_db = mysqli_query($db_connect, $checking_query);
$result_to_array = mysqli_fetch_assoc($checking_query_to_db);
//print_r($result_to_array);
?>

<!doctype html>
<html>
<head>  
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">  
    <!-- FONTAWESOME LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- BOOTSTRAP CDN LINK -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <!-- CDN LINK SWEAT ALERT -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Website Admin</title>
</head>
<body>  
  <h1>Welcome back <?=$result_to_array['first_name'] .' '. $result_to_array['last_name']?> !</h1>  

    <p style="  text-align: center;">
      <a style="margin:0px 10px; font-size:16px;" href="../dashboard/dashboard.php" class=" btn btn-info">Dashboard</a> 
      <a style="margin:0px 10px; font-size:16px;" href="../../index.php" target="_blank" class=" btn btn-info">Visit Site</a> 
      <a style="margin:0px 10px; font-size:16px;" href="../admin/logout.php" class=" btn btn-danger">Logout</a>
    </p>
    
  <hr>
  
  
  

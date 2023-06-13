<?php
require_once('../db_connect.php');
session_start();

$email = htmlspecialchars(trim($_POST['email']));
$password = htmlspecialchars(trim($_POST['password']));
$flag = false;





if ($email && $password) {
  $checking_query = " SELECT id, first_name, last_name, email, password, role, COUNT(*) AS result FROM `users` WHERE email = '$email' AND password= '$password' ";
  $checking_query_to_db = mysqli_query($db_connect, $checking_query);
  $result_to_array = mysqli_fetch_assoc($checking_query_to_db);
  
  if ( $result_to_array['result']) {
    $_SESSION['user_id'] = $result_to_array['id'];
    $_SESSION['first_name'] = $result_to_array['first_name'];
    $_SESSION['last_name'] = $result_to_array['last_name'];
    $_SESSION['email'] = $result_to_array['email'];
    $_SESSION['password'] = $result_to_array['password'];
    $_SESSION['role'] = $result_to_array['role'];

    header('location:../dashboard/dashboard.php');
    
  }else{
    $flag = true;
    $_SESSION['error']= 'Email or Password incorrect!';

  }
}else{
  $flag = true;
  $_SESSION['error']= 'All field are required!';
}


if ($email) { 
  $_SESSION["old_email"] = $email; 
}
// else{
//   $flag = true;
//   $_SESSION["email_error"] = "Email is required";  
// }
if ($password) { 
  $_SESSION["old_password"] = $password; 
}
// else{
//   $flag = true;
//   $_SESSION["password_error"] = "Password is required";  
// }


if ($flag) {
  header('location:./login.php');
}
?>
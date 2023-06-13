<?php
require_once("../db_connect.php");
// print_r($_POST);
// print_r($_FILES);
// die();
session_start();
$first_name = htmlspecialchars(trim($_POST["first_name"]));
$last_name = htmlspecialchars(trim($_POST["last_name"]));
$email = htmlspecialchars(trim($_POST["email"]));
$password = htmlspecialchars(trim($_POST["password"]));
// $profile_pic = htmlspecialchars(trim($_POST["profile_pic"]));
$bio = htmlspecialchars(trim($_POST["bio"]));
$phone_number = htmlspecialchars(trim($_POST["phone_number"]));
$role = htmlspecialchars(trim($_POST["role"]));
$description = htmlspecialchars(trim($_POST["description"]));

// FOR IMAGES 
$profile_pic = $_FILES["profile_pic"]["name"];
$tmp_name = $_FILES["profile_pic"]["tmp_name"];
// print_r($portfolio_image["name"]);
$profile_pic_arr = explode(".", $profile_pic);
// print_r(end($profile_pic_arr));
$file_extension = end($profile_pic_arr);

$new_name =date("Y_m_d")."_".time().".".$file_extension;

$file_path = "../../upload/usersphoto/".$new_name;
// print_r($new_name);
move_uploaded_file($tmp_name, $file_path);

$flag = false;
// if ($first_name && $last_name && $email && $password && $role) {
  
// }
if ($first_name) { 
  $_SESSION["old_first_name"] = $first_name; 
}else{
  $flag = true;
  $_SESSION["first_name_error"] = "First Name is required";  
}
if ($last_name) {
  $_SESSION["old_last_name"] = $last_name; 
}else{
  $flag = true;
  $_SESSION["last_name_error"] = "Last Name is required";
  
}
if ($email) {
  $_SESSION["old_email"] = $email;  
}else{
  $flag = true;
  $_SESSION["email_error"] = "Email is required"; 
}
if ($password) {
  $_SESSION["old_password"] = $password;
}else{
  $flag = true;
  $_SESSION["password_error"] = "Password is required";
 
}
if ($phone_number) {
  $_SESSION["old_phone_number"] = $phone_number;
}
if ($bio) {
  $_SESSION["old_bio"] = $bio;
}
if ($profile_pic) {
  $_SESSION["old_profile_pic"] = $profile_pic;
}
// else{
//   $flag = true;
//   $_SESSION["phone_number_error"] = "Phone Number is required";

// }
if ($role) {
  $_SESSION["old_role"] = $role;
}else{
  $flag = true;
  $_SESSION["role_error"] = "Role is required";

}
if ($description) {
  $_SESSION["old_description"] = $description;
}
// else{
//   $flag = true;
//   $_SESSION["description_error"] = "Description is required";

// }



if ($flag) {
  header("location:./users_add.php");
}else{
  $insert_users_query = " INSERT INTO `users`( `first_name`, `last_name`, `email`, `password`, `profile_pic`, `bio`, `phone_number`, `role`, `description`) VALUES ('$first_name','$last_name','$email','$password','$new_name','$bio','$phone_number','$role','$description')";
  $insert_users_query_to_db = mysqli_query($db_connect, $insert_users_query);

  $_SESSION["success"] = "<h4>Users Added Successfully</h4>";
  header("location:./users.php");
}
?>


<!-- $profile_pic = $_FILES["profile_pic"]["name"];
$tmp_name = $_FILES["profile_pic"]["tmp_name"];
// print_r($portfolio_image["name"]);
$profile_pic_arr = explode(".", $profile_pic);
// print_r(end($profile_pic_arr));
$file_extension = end($profile_pic_arr);

$new_name =date("Y_m_d")."_".time().".".$file_extension;

$file_path = "../../upload/usersphoto/".$new_name;
// print_r($new_name);
move_uploaded_file($tmp_name, $file_path);


header("location:./users.php"); -->
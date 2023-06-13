<?php
require_once('../db_connect.php');
session_start();
$profile_pic = $_FILES["profile_pic"]["name"];
$tmp_name = $_FILES["profile_pic"]["tmp_name"];

$first_name = htmlspecialchars(trim($_POST['first_name']));
$last_name = htmlspecialchars(trim($_POST['last_name']));
$email = htmlspecialchars(trim($_POST['email']));
$password = htmlspecialchars(trim($_POST['password']));
$bio = htmlspecialchars(trim($_POST['bio']));
$phone_number = htmlspecialchars(trim($_POST['phone_number']));
$role = htmlspecialchars(trim($_POST['role']));
$description = htmlspecialchars(trim($_POST['description']));

$id =$_POST['id'];

// print_r($_POST);
// die();
// print_r($_GET['id']);
if (isset($_POST['email'])) {
  if ($first_name && $last_name && $password && $role ) {
    
if ($profile_pic) {
  $profile_pic_list = " SELECT profile_pic FROM users";
  $profile_pic_list_query = mysqli_query($db_connect, $profile_pic_list);
  $profile_pic_name = mysqli_fetch_assoc($profile_pic_list_query)["profile_pic"];
  // print_r($profile_pic_name);
  // die();
  unlink("../../upload/usersphoto/".$profile_pic_name);
  $profile_pic_arr = explode(".", $profile_pic);
// print_r(end($profile_pic_arr));
$file_extension = end($profile_pic_arr);

$new_name =date("Y_m_d")."_".time().".".$file_extension;

$file_path = "../../upload/usersphoto/".$new_name;
// print_r($new_name);
move_uploaded_file($tmp_name, $file_path);

    $user_update_data_query =" UPDATE users SET
    first_name = '$first_name',
    last_name = '$last_name',
    password = '$password',
    profile_pic = '$new_name',
    bio = '$bio',
    phone_number = '$phone_number',
    role = '$role',
    description = '$description'
    WHERE id = $id      
    ";
    $user_update_data_query_to_db = mysqli_query($db_connect, $user_update_data_query);
    $_SESSION["success"] = "<h4>User Edited successfully</h4>";
    header("location:./users.php");

}else{
  $user_update_data_query =" UPDATE users SET
  first_name = '$first_name',
  last_name = '$last_name',
  password = '$password',
  bio = '$bio',
  phone_number = '$phone_number',
  role = '$role',
  description = '$description'
  WHERE id = $id      
  ";
  $user_update_data_query_to_db = mysqli_query($db_connect, $user_update_data_query);
  $_SESSION["success"] = "<h4>User Edited successfully</h4>";
  header("location:./users.php");

}




  }else{
    $_SESSION['edit_error'] = "All field are required";
    header("location:./users_edit.php?id={$id}");

  }
}

// if ($profile_pic) {
//   $profile_pic_list = " SELECT profile_pic FROM users";
//   $profile_pic_list_query = mysqli_query($db_connect, $profile_pic_list);
//   $profile_pic_name = mysqli_fetch_assoc($profile_pic_list_query)["profile_pic"];
//   // print_r($profile_pic_name);
//   // die();
//   unlink("../../upload/usersphoto/".$profile_pic_name);
//   $profile_pic_arr = explode(".", $profile_pic);
// // print_r(end($profile_pic_arr));
// $file_extension = end($profile_pic_arr);

// $new_name =date("Y_m_d")."_".time().".".$file_extension;

// $file_path = "../../upload/usersphoto/".$new_name;
// // print_r($new_name);
// move_uploaded_file($tmp_name, $file_path);

//     $user_update_data_query =" UPDATE users SET
//     first_name = '$first_name',
//     last_name = '$last_name',
//     password = '$password',
//     profile_pic = '$new_name',
//     bio = '$bio',
//     phone_number = '$phone_number',
//     role = '$role',
//     description = '$description'
//     WHERE id = $id      
//     ";
//     $user_update_data_query_to_db = mysqli_query($db_connect, $user_update_data_query);
//     $_SESSION["success"] = "<h4>User Edited successfully</h4>";
//     header("location:./users.php");

// }else{
//   $user_update_data_query =" UPDATE users SET
//   first_name = '$first_name',
//   last_name = '$last_name',
//   password = '$password',
//   bio = '$bio',
//   phone_number = '$phone_number',
//   role = '$role',
//   description = '$description'
//   WHERE id = $id      
//   ";
//   $user_update_data_query_to_db = mysqli_query($db_connect, $user_update_data_query);
//   $_SESSION["success"] = "<h4>User Edited successfully</h4>";
//   header("location:./users.php");

// }

// if (isset($_POST['email'])) {
//   if ($first_name && $last_name && $password && $role ) {
   
//     $user_update_data_query =" UPDATE users SET
//     first_name = '$first_name',
//     last_name = '$last_name',
//     password = '$password',
//     profile_pic = '$profile_pic',
//     bio = '$bio',
//     phone_number = '$phone_number',
//     role = '$role',
//     description = '$description'
//     WHERE id = $id      
//     ";
//     $user_update_data_query_to_db = mysqli_query($db_connect, $user_update_data_query);
//     $_SESSION["success"] = "<h4>User Edited successfully</h4>";
//     header("location:./users.php");
    
//   }else{    
//       $_SESSION['edit_error'] = "All field are required";
//       header("location:./users_edit.php?id={$id}");
//   }
// }else{
//   $_SESSION['edit_error'] = "All field are required";
// }

// session_start();
// $user_id = $_SESSION['user_id'];

// $user_data_query = " SELECT * FROM `users` WHERE id = $user_id";
// $user_data_query_to_db = mysqli_query($db_connect, $user_data_query);
// $result_to_array = mysqli_fetch_assoc($user_data_query_to_db);

//print_r($result_to_array);
?>
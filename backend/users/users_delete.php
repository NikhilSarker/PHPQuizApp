<?php
require_once("../db_connect.php");

$id = $_GET["id"];
$profile_pic_list = " SELECT profile_pic FROM users";
$profile_pic_list_query = mysqli_query($db_connect, $profile_pic_list);
$profile_pic_name = mysqli_fetch_assoc($profile_pic_list_query)["profile_pic"];
unlink("../../upload/usersphoto/".$profile_pic_name);

$delete_query = " DELETE FROM users WHERE id = $id";
mysqli_query($db_connect, $delete_query);
header("location:./users.php");


?>
<?php
require_once("../db_connect.php");

$id = $_GET["id"];


$delete_query = " DELETE FROM categories WHERE id = $id";
mysqli_query($db_connect, $delete_query);
header("location:./categories.php");


?>
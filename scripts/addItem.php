<?php

require_once('functions.php');
session_start();
connect_db();

$item = $_POST['item'];
$count = $_POST['count'];
$user_id = $_SESSION['id'];
$result = mysqli_query($connection,
"INSERT INTO mkonsa_ostukorv_tooted (user_id, description, count) VALUES ($user_id, '$item', $count)") or die(mysqli_error($connection));

header("Location: /~mkonsa/Ostukorv/index.php?page=shoplist");
?>
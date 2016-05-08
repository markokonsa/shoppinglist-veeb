<?php

require_once('functions.php');
session_start();
connect_db();

$itemId = $_POST['id'];
$result = $_POST['checked'];

$user = $_SESSION['id'];

$sql = "UPDATE mkonsa_ostukorv_tooted SET checked='$result' WHERE id='$itemId' AND user_id=$user";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
?>
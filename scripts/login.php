<?php

require_once('functions.php');
session_start();
connect_db();

$username = $_POST['username'];
$password = $_POST['password'];
$result = mysqli_query($connection ,"SELECT id, username FROM mkonsa_ostukorv_kasutaja WHERE username='$username' AND password='$password' LIMIT 1") or die(mysqli_error($connection));
$row    = mysqli_fetch_array($result);
$count = mysqli_num_rows($result);
if($count == 1) {
    $_SESSION['id']    = $row[0];
    $_SESSION['username'] = $row[1];

    header("Location: /~mkonsa/Ostukorv/index.php?page=shoplist");
} else {
    echo "Sisselogimine ebaõnnestus!";
}
?>
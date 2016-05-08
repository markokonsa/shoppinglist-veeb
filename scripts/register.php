<?php
session_start();
require_once("../configuration/config.php");
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if ($password == $password2) {

    $checkExistance = mysqli_query($l, "SELECT username FROM mkonsa_ostukorv_kasutaja WHERE username='$username' LIMIT 1");
    if (mysqli_num_rows($checkExistance) == 0) {
        $result = mysqli_query($l, "SELECT id, username FROM mkonsa_ostukorv_kasutaja WHERE username='$username' AND password='$password' LIMIT 1") or die(mysqli_error($l));
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $_SESSION['id'] = $row[0];
            $_SESSION['username'] = $row[1];

            header("Location: /~mkonsa/Ostukorv/index.php?page=ostukorv");
        }else {
            header("Location: /~mkonsa/Ostukorv/registreeru.php");
        }
    }
}
?>
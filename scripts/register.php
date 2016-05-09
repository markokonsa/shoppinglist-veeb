<?php

require_once('functions.php');
session_start();
connect_db();

$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if ($password == $password2) {

    $checkExistance = mysqli_query($connection, "SELECT username FROM mkonsa_ostukorv_kasutaja WHERE username='$username' LIMIT 1");
    if (mysqli_num_rows($checkExistance) == 0) {

        $result = mysqli_query($connection, "INSERT INTO mkonsa_ostukorv_kasutaja (username, password) VALUES ('$username', '$password')") or die(mysqli_error($connection));
        $result = mysqli_query($connection ,"SELECT id, username FROM mkonsa_ostukorv_kasutaja WHERE username='$username' AND password='$password' LIMIT 1") or die(mysqli_error($connection));
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $_SESSION['id'] = $row[0];
            $_SESSION['username'] = $row[1];

            header("Location: /~mkonsa/Ostukorv/index.php?page=shoplist");
        }else {
            $error = array('error' => 'Registreerumine ei õnnestunud!');
            echo json_encode($error);
        }
    } else {
        $error = array('error' => 'Sellise kasutajanimega kasutaja on juba olemas!');
        echo json_encode($error);
}
} else {
    $error = array('error' => 'Paroolid ei ühti!');
    echo json_encode($error);
}
?>
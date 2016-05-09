<?php

require_once('functions.php');
session_start();
connect_db();

$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);
$result = mysqli_query($connection ,"SELECT id, username FROM mkonsa_ostukorv_kasutaja WHERE username='$username' AND password=SHA1('$password') LIMIT 1") or die(mysqli_error($connection));
$row    = mysqli_fetch_array($result);
$count = mysqli_num_rows($result);
if($count == 1) {
    $_SESSION['id']    = $row[0];
    $_SESSION['username'] = $row[1];

    $success = array('success' => '/~mkonsa/Ostukorv/index.php?page=shoplist');
    echo json_encode($success);
} else {
    $error = array('error' => 'Sisselogimine ebaõnnestus!');
    echo json_encode($error);
}
?>
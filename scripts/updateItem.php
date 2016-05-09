<?php

require_once('functions.php');
session_start();
connect_db();

$itemId = mysqli_real_escape_string($connection, $_POST['id']);
$result = mysqli_real_escape_string($connection, $_POST['checked']);

$user = $_SESSION['id'];

if (empty($itemId)) {
     $error = array('error' => 'Midagi läks valesti!');
     echo json_encode($error);
} else if (empty($result)) {
     $error = array('error' => 'Midagi läks valesti!');
     echo json_encode($error);
} else {
    $sql = "UPDATE mkonsa_ostukorv_tooted SET checked='$result' WHERE id='$itemId' AND user_id=$user";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if ($result === TRUE) {
        $result = mysqli_query($connection, "SELECT * FROM mkonsa_ostukorv_tooted WHERE id = '$itemId'") or trigger_error(mysql_error());
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }
}

?>
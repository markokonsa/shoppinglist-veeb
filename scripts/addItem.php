<?php

require_once('functions.php');
session_start();
connect_db();

$item = $_POST['item'];
$count = $_POST['count'];
$user_id = $_SESSION['id'];
$result = mysqli_query($connection,
"INSERT INTO mkonsa_ostukorv_tooted (user_id, description, count) VALUES ($user_id, '$item', $count)") or die(mysqli_error($connection));

if ($result === TRUE) {
    $last_id = $connection->insert_id;

    $result = mysqli_query($connection, "SELECT * FROM mkonsa_ostukorv_tooted WHERE user_id = '$user_id' AND description = '$item' AND id = '$last_id' ") or trigger_error(mysql_error());
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}
?>
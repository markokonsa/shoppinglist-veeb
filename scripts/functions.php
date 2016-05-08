<?php
function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: /~mkonsa/Ostukorv/index.php");
}

function openShopList() {
    global $connection;

    if(isset($_SESSION['id'])) {

        $user_id = $_SESSION['id'];
        $sql = "SELECT * FROM `mkonsa_ostukorv_tooted` WHERE user_id=$user_id and checked=0";
        $tooted = mysqli_query($connection , $sql) or die(mysqli_error($connection));

        include('views/ostukorv.html');
    }
}
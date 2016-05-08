<?php
require_once('scripts/funk.php');
session_start();
connect_db();

$page="login";
if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);
} else if(isset($_SESSION['id'])) {
    $page = "ostukorv";
}

include_once('views/head.html');

switch($page){
	case "login":
		include_once('views/login.html');
	break;
	case "logout":
		logout();
	break;
	case "shoplist":
    	include_once('views/ostukorv.html');
    	break;
    case "register":
        include_once('views/register.html');
        break;
	default:
		include_once('views/login.html');
	break;
}

include_once('views/foot.html');

?>
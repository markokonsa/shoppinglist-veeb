<?php
require_once('scripts/functions.php');
session_start();
connect_db();

$page = "login";

if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);
} else if(isset($_SESSION['id']) && $_SESSION['id']!="") {
    $page = "shoplist";
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
	    openShoplist();
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
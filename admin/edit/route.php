<?php
define('__ROOT__', $_SERVER['DOCUMENT_ROOT']);

require_once __ROOT__."/config/connect.php";
require_once __ROOT__."/auth/user.php";
require_once __ROOT__."/helpers/debug.php";

$id_route = $_GET['id'];

$query = mysqli_query($connect,
	"SELECT * 
	FROM `routes`
	WHERE id_route = '$id_route'
	LIMIT 1"
);
$route = mysqli_fetch_assoc($query);

$query = mysqli_query($connect, "SELECT * FROM `destinations`");
$destinations = mysqli_fetch_all($query, MYSQLI_ASSOC);

$query = mysqli_query($connect, "SELECT * FROM `movement_days`");
$movements = mysqli_fetch_all($query, MYSQLI_ASSOC);

if ($route == null) {
	header("HTTP/1.0 404 Not Found");
	$tpl = __ROOT__."/pages/404_page.php";
	include __ROOT__."/layout/layout.php";
	mysqli_close($connect);
	die();
}

$pageTitle = "курсовой проект";

$tpl = __ROOT__."/pages/admin/route/edit.php";
include __ROOT__."/layout/admin_layout.php";

mysqli_close($connect);
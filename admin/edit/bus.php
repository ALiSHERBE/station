<?php
define('__ROOT__', $_SERVER['DOCUMENT_ROOT']);

require_once __ROOT__."/config/connect.php";
require_once __ROOT__."/auth/user.php";
require_once __ROOT__."/helpers/debug.php";

$id_bus = $_GET['id'];

$query = mysqli_query($connect,
	"SELECT * 
	FROM `buses`
	WHERE id_bus = '$id_bus'
	LIMIT 1"
);
$bus = mysqli_fetch_assoc($query);

if ($bus == null) {
	header("HTTP/1.0 404 Not Found");
	$tpl = __ROOT__."/pages/404_page.php";
	include __ROOT__."/layout/layout.php";
	mysqli_close($connect);
	die();
}

$pageTitle = "курсовой проект";

$tpl = __ROOT__."/pages/admin/bus/edit.php";
include __ROOT__."/layout/admin_layout.php";

mysqli_close($connect);
<?php
define('__ROOT__', $_SERVER['DOCUMENT_ROOT']);

require_once __ROOT__ . "/config/connect.php";
require_once __ROOT__ . "/auth/user.php";
require_once __ROOT__ . "/helpers/debug.php";

if ($userdata == null || (isset($userdata) && $userdata['role'] != 'manager')) {
	header("HTTP/1.0 403 forbidden");
	$tpl = __ROOT__."/pages/404_page.php";
	include __ROOT__."/layout/layout.php";
	mysqli_close($connect);
	die();
}

$query = mysqli_query($connect,
	"SELECT * FROM `stops`
	LEFT JOIN routes ON routes.id_route=stops.id_route
	LEFT JOIN destinations ON destinations.id_destination=routes.id_destination");
$stops = mysqli_fetch_all($query, MYSQLI_ASSOC);

$pageTitle = "Админка, курсовой проект";

$tpl = __ROOT__ . "/pages/admin/stop/index.php";
include __ROOT__."/layout/admin_layout.php";

mysqli_close($connect);
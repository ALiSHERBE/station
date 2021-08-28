<?php
define('__ROOT__', $_SERVER['DOCUMENT_ROOT']);

require_once __ROOT__ . "/config/connect.php";
require_once __ROOT__ . "/auth/user.php";
require_once __ROOT__ . "/helpers/debug.php";

if ($userdata == null || (isset($userdata) && $userdata['role'] != 'manager')) {
	header("HTTP/1.0 403 forbidden");
	$tpl = __ROOT__ . "/pages/404_page.php";
	include __ROOT__ . "/layout/layout.php";
	mysqli_close($connect);
	die();
}

$query = mysqli_query($connect,
	"SELECT * 
	FROM `flights`
	LEFT JOIN routes ON flights.id_route=routes.id_route
	LEFT JOIN buses ON flights.id_bus=buses.id_bus
	LEFT JOIN destinations ON routes.id_destination=destinations.id_destination
	LEFT JOIN movement_days ON routes.id_movement=movement_days.id_movement
	");

$flights = mysqli_fetch_all($query, MYSQLI_ASSOC);

$pageTitle = "Админка, курсовой проект";

$tpl = __ROOT__ . "/pages/admin/flight/index.php";
include __ROOT__ . "/layout/admin_layout.php";

mysqli_close($connect);
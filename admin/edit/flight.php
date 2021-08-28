<?php
define('__ROOT__', $_SERVER['DOCUMENT_ROOT']);

require_once __ROOT__ . "/config/connect.php";
require_once __ROOT__ . "/auth/user.php";
require_once __ROOT__ . "/helpers/debug.php";

$id_flight = $_GET['id'];

$query = mysqli_query($connect,
	"SELECT * 
	FROM `flights`
	WHERE id_flight = '$id_flight'
	LIMIT 1"
);
$flight = mysqli_fetch_assoc($query);

$query = mysqli_query($connect,
	"SELECT * FROM `routes`
	LEFT JOIN destinations ON destinations.id_destination=routes.id_destination");
$routes = mysqli_fetch_all($query, MYSQLI_ASSOC);

$query = mysqli_query($connect, "SELECT * FROM `buses`");
$buses = mysqli_fetch_all($query, MYSQLI_ASSOC);

if ($flight == null) {
	header("HTTP/1.0 404 Not Found");
	$tpl = __ROOT__ . "/pages/404_page.php";
	include __ROOT__ . "/layout/layout.php";
	mysqli_close($connect);
	die();
}

$pageTitle = "курсовой проект";

$tpl = __ROOT__ . "/pages/admin/flight/edit.php";
include __ROOT__ . "/layout/admin_layout.php";

mysqli_close($connect);
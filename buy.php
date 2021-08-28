<?php
require_once "config/connect.php";
require_once "auth/user.php";
require_once "helpers/debug.php";

$id_flight = $_GET['f'];

$query = mysqli_query($connect,
	"SELECT * 
	FROM `flights`
	LEFT JOIN routes ON flights.id_route=routes.id_route
	LEFT JOIN buses ON flights.id_bus=buses.id_bus
	LEFT JOIN destinations ON routes.id_destination=destinations.id_destination
	LEFT JOIN movement_days ON routes.id_movement=movement_days.id_movement
	WHERE flights.id_flight = '$id_flight'
	LIMIT 1"
);
$flight = mysqli_fetch_assoc($query);

if ($flight == null) {
	header("HTTP/1.0 404 Not Found");
	$tpl = "pages/404_page.php";
	include "layout/layout.php";
	mysqli_close($connect);
	die();
}

$pageTitle = "Купить билет, курсовой проект";

$tpl = "pages/buy.php";
include "layout/layout.php";

mysqli_close($connect);
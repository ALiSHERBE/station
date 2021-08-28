<?php
require_once "config/connect.php";
require_once "auth/user.php";
require_once "helpers/debug.php";

if ($userdata == null) {
	header("HTTP/1.0 404 Not Found");
	$tpl = "pages/404_page.php";
	include "layout/layout.php";
	mysqli_close($connect);
	die();
}

$id_user = $userdata['id_user'];

$query = mysqli_query($connect,
	"SELECT * 
	FROM `tickets`
	LEFT JOIN flights ON tickets.id_flight=flights.id_flight
	LEFT JOIN routes ON flights.id_route=routes.id_route
	LEFT JOIN destinations ON routes.id_destination=destinations.id_destination
	WHERE id_user = '$id_user';"
);
$tickets = mysqli_fetch_all($query, MYSQLI_ASSOC);

$id_flight = implode(', ', array_map(function ($entry) {
	return $entry['id_flight'];
}, $tickets));

$flights = mysqli_query($connect,
	"SELECT * 
	FROM `flights`
	LEFT JOIN routes ON flights.id_route=routes.id_route
	LEFT JOIN buses ON flights.id_bus=buses.id_bus
	LEFT JOIN destinations ON routes.id_destination=destinations.id_destination
	LEFT JOIN movement_days ON routes.id_movement=movement_days.id_movement
	WHERE flights.id_flight in ($id_flight)
	ORDER BY id_flight DESC"
);
$flights = mysqli_fetch_all($flights, MYSQLI_ASSOC);

$pageTitle = "Мои билеты, курсовой проект";

$tpl = "pages/my_tickets.php";
include "layout/layout.php";

mysqli_close($connect);
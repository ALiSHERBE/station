<?php
require_once "config/connect.php";
require_once "auth/user.php";

$from = $_POST['from'];
$to = $_POST['to'];
$date = $_POST['date'];

if (trim($from) != '' && trim($to) != ''&& trim($date) != '') {
	$date_f = strtotime($date);
	$day = date('d', $date_f);

	if ($day % 2 === 0) {
		$cond = 1;
	} else {
		$cond = 2;
	}

	$query = mysqli_query($connect,
		"SELECT * 
		FROM `stops`
		WHERE stop = '$to'
		LIMIT 1"
	);
	$stop = mysqli_fetch_assoc($query);
	$condition = "AND destinations.destination = '$to'";
	if ($stop != null){
		$id_route = $stop['id_route'];
		$condition = "AND (destinations.destination = '$to' OR flights.id_route = $id_route)";
	}

	$query = "SELECT * 
	FROM `flights`
	LEFT JOIN routes ON flights.id_route=routes.id_route
	LEFT JOIN buses ON flights.id_bus=buses.id_bus
	LEFT JOIN destinations ON routes.id_destination=destinations.id_destination
	LEFT JOIN movement_days ON routes.id_movement=movement_days.id_movement
	WHERE routes.departure = '$from'
	$condition
	AND (
		(routes.id_movement = '$cond')
		OR (routes.id_movement = '3')
	)
	";
	$flights = mysqli_query($connect, $query);
	$flights = mysqli_fetch_all($flights, MYSQLI_ASSOC);

	$destinations = mysqli_query($connect, "SELECT * FROM `destinations`");
	$destinations = mysqli_fetch_all($destinations, MYSQLI_ASSOC);

	$pageTitle = "Результаты поиска, курсовой проект";

	$tpl = "pages/search_ticket.php";
	include "layout/layout.php";
} else {
	header("HTTP/1.0 404 Not Found");
	$tpl = "pages/404_page.php";
	include "layout/layout.php";
}
mysqli_close($connect);
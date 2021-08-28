<?php
require_once "config/connect.php";
require_once "auth/user.php";

$flights = mysqli_query($connect,
	"SELECT * 
	FROM `flights`
	LEFT JOIN routes ON flights.id_route=routes.id_route
	LEFT JOIN buses ON flights.id_bus=buses.id_bus
	LEFT JOIN destinations ON routes.id_destination=destinations.id_destination
	LEFT JOIN movement_days ON routes.id_movement=movement_days.id_movement
	ORDER BY id_flight ASC"
);
$flights = mysqli_fetch_all($flights, MYSQLI_ASSOC);

$destinations = mysqli_query($connect, "SELECT * FROM `destinations`");
$destinations = mysqli_fetch_all($destinations, MYSQLI_ASSOC);

$pageTitle = "Маршруты и рейсы, курсовой проект";

$tpl = "pages/home.php";
include "layout/layout.php";

mysqli_close($connect);
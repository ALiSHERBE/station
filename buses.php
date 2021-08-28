<?php
require_once "config/connect.php";
require_once "auth/user.php";

$query = mysqli_query($connect,
	"SELECT * 
	FROM `buses`
	ORDER BY id_bus DESC"
);
$buses = mysqli_fetch_all($query, MYSQLI_ASSOC);

$destinations = mysqli_query($connect, "SELECT * FROM `destinations`");
$destinations = mysqli_fetch_all($destinations, MYSQLI_ASSOC);

$pageTitle = "Автобусы автостанции, курсовой проект";

$tpl = "pages/buses.php";
include "layout/layout.php";

mysqli_close($connect);
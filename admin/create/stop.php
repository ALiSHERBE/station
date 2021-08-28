<?php
define('__ROOT__', $_SERVER['DOCUMENT_ROOT']);

require_once __ROOT__ . "/config/connect.php";
require_once __ROOT__ . "/auth/user.php";
require_once __ROOT__ . "/helpers/debug.php";

$query = mysqli_query($connect,
	"SELECT * FROM `routes`
	LEFT JOIN destinations ON destinations.id_destination=routes.id_destination");
$routes = mysqli_fetch_all($query, MYSQLI_ASSOC);

$pageTitle = "курсовой проект";

$tpl = __ROOT__ . "/pages/admin/stop/create.php";
include __ROOT__ . "/layout/admin_layout.php";

mysqli_close($connect);
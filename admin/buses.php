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

$query = mysqli_query($connect, "SELECT * FROM `buses`");
$buses = mysqli_fetch_all($query, MYSQLI_ASSOC);

$pageTitle = "Админка, курсовой проект";

$tpl = __ROOT__ . "/pages/admin/bus/index.php";
include __ROOT__."/layout/admin_layout.php";

mysqli_close($connect);
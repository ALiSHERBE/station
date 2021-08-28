<?php
require_once "config/connect.php";
require_once "auth/user.php";
require_once "helpers/debug.php";

if ($userdata == null || (isset($userdata) && $userdata['role'] != 'manager')) {
	header("HTTP/1.0 403 forbidden");
	$tpl = "pages/404_page.php";
	include "layout/layout.php";
	mysqli_close($connect);
	die();
}

$query = mysqli_query($connect, "SELECT * FROM `destinations`");
$destinations = mysqli_fetch_all($query, MYSQLI_ASSOC);

$pageTitle = "Админка, курсовой проект";

$tpl = "pages/admin/home.php";
include "layout/admin_layout.php";

mysqli_close($connect);
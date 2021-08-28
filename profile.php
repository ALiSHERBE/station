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

$pageTitle = "Мой профиль, курсовой проект";

$tpl = "pages/profile.php";
include "layout/layout.php";

mysqli_close($connect);
<?php
// Скрипт проверки
require_once "config/connect.php";

if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{
	$query = mysqli_query($connect, "SELECT * FROM users WHERE id_user = '".intval($_COOKIE['id'])."' LIMIT 1");
	$userdata = mysqli_fetch_assoc($query);

	if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['id_user'] !== $_COOKIE['id']))
	{
		setcookie("id", "", time() - 3600*24*30*12, "/");
		setcookie("hash", "", time() - 3600*24*30*12, "/", null, null, true);

		$title = 'Ошибка';
		$description = 'Хм, что-то не получилось';
		$tpl = "pages/info.php";
		include "layout/layout.php";
		mysqli_close($connect);
		die();
	}
	else
	{
		$title = 'Успешная авторизация!';
		$description = "Привет, ".$userdata['first_name'];
		$tpl = "pages/info.php";
		include "layout/layout.php";
		mysqli_close($connect);
		die();
	}
}
else
{
	$title = 'Ошибка';
	$description = 'Включите куки';
	$tpl = "pages/info.php";
	include "layout/layout.php";
	mysqli_close($connect);
	die();
}
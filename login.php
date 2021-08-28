<?php
// Страница авторизации
require_once "config/connect.php";

// Функция для генерации случайной строки
function generateCode($length = 6)
{
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
	$code = "";
	$clen = strlen($chars) - 1;
	while (strlen($code) < $length) {
		$code .= $chars[mt_rand(0, $clen)];
	}
	return $code;
}

if (isset($_POST['submit'])) {
	// Вытаскиваем из БД запись, у которой логин равняеться введенному
	$query = mysqli_query($connect, "SELECT id_user, user_password FROM users WHERE user_login='" . mysqli_real_escape_string($connect, $_POST['login']) . "' LIMIT 1");
	$data = mysqli_fetch_assoc($query);

	// Сравниваем пароли
	if ($data['user_password'] === md5(md5($_POST['password']))) {
		// Генерируем случайное число и шифруем его
		$hash = md5(generateCode(10));

		// Записываем в БД новый хеш авторизации
		mysqli_query($connect, "UPDATE users SET user_hash='" . $hash . "' WHERE id_user='" . $data['id_user'] . "'");

		// Ставим куки
		setcookie("id", $data['id_user'], time() + 60 * 60 * 24 * 30, "/");
		setcookie("hash", $hash, time() + 60 * 60 * 24 * 30, "/", null, null, true);

		// Переадресовываем браузер на страницу проверки нашего скрипта
		header("Location: check.php");
		exit();
	} else {
		$title = 'Ошибка';
		$description = 'Вы ввели неправильный логин/пароль';
		$tpl = "pages/info.php";
		include "layout/layout.php";
		mysqli_close($connect);
		die();
	}
}
$pageTitle = "Сайт автостанции, курсовой проект";

$tpl = "pages/login.php";
include "layout/layout.php";

mysqli_close($connect);
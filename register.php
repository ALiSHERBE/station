<?
// Страница регистрации нового пользователя
require_once "config/connect.php";

if (isset($_POST['submit'])) {
	$err = [];

	// проверям логин
	if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['login'])) {
		$err[] = "Логин может состоять только из букв английского алфавита и цифр";
	}

	if (strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) {
		$err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
	}

	// проверяем, не сущестует ли пользователя с таким именем
	$query = mysqli_query($connect, "SELECT id_user FROM users WHERE user_login='" . mysqli_real_escape_string($connect, $_POST['login']) . "'");
	if (mysqli_num_rows($query) > 0) {
		$err[] = "Пользователь с таким логином уже существует в базе данных";
	}

	// Если нет ошибок, то добавляем в БД нового пользователя
	if (count($err) == 0) {
		$login = $_POST['login'];
		$last_name = $_POST['last_name'];
		$first_name = $_POST['first_name'];
		$patronymic = $_POST['patronymic'];
		$gender = $_POST['gender'];
		$date_birth = $_POST['date_birth'];
		$serie_passport = $_POST['serie_passport'];
		$phone_number = $_POST['phone_number'];

		// Убераем лишние пробелы и делаем двойное хеширование
		$password = md5(md5(trim($_POST['password'])));

		$query = "INSERT INTO users SET user_login='$login', 
			user_password='$password',
			last_name='$last_name',
			first_name='$first_name',
			patronymic='$patronymic',
			gender='$gender',
			date_birth='$date_birth',
			phone_number='$phone_number',
			serie_passport='$serie_passport';";
		mysqli_query($connect, $query);
		header("Location: login.php");
		exit();
	} else {
		$title = 'Ошибка';
		$description = '<b>При регистрации произошли следующие ошибки: </b>' . implode(', ', $err);
		$tpl = "pages/info.php";
		include "layout/layout.php";
		mysqli_close($connect);
		die();
	}
}

$pageTitle = "Сайт автостанции, курсовой проект";

$tpl = "pages/register.php";
include "layout/layout.php";

mysqli_close($connect);
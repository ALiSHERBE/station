<?php
require_once "config/connect.php";
require_once "auth/user.php";
require_once "helpers/debug.php";

$id_flight = $_POST['id_flight'];

$query = mysqli_query($connect,
	"SELECT * 
	FROM `flights`
	WHERE flights.id_flight = '$id_flight'
	LIMIT 1"
);
$flight = mysqli_fetch_assoc($query);

if ($flight == null) {
	header("HTTP/1.0 404 Not Found");
	$tpl = "pages/404_page.php";
	include "layout/layout.php";
	mysqli_close($connect);
	die();
}
$id_user = $userdata['id_user'];
$date = date('Y-m-d H:i:s');

$query = "INSERT INTO tickets SET id_user='$id_user',
			id_flight='$id_flight',
			created_at='$date';";
mysqli_query($connect, $query);

$pageTitle = "Заявка оставлена, курсовой проект";

$title = 'Заявка успешно оставлена!';
$description = 'Заявка принята, с Вами свяжется наш менеджер!';
$tpl = "pages/info.php";
include "layout/layout.php";
mysqli_close($connect);
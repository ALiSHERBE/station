<?php
define('__ROOT__', $_SERVER['DOCUMENT_ROOT']);

require_once __ROOT__ . "/config/connect.php";
require_once __ROOT__ . "/auth/user.php";
require_once __ROOT__ . "/helpers/debug.php";

$table = $_POST['table'];

unset($_POST['table']);
unset($_POST['submit']);

$insert = '';
foreach ($_POST as $key => $data){
	$insert .= "$key = '$data',";
}
$insert = substr($insert, 0, -1);

$query = "INSERT INTO $table SET $insert;";
mysqli_query($connect, $query);

$pageTitle = "Запись успешно добавлена";
$title = $pageTitle;

$tpl = __ROOT__ . "/pages/admin/info/index.php";
include __ROOT__ . "/layout/admin_layout.php";

mysqli_close($connect);

<?php
define('__ROOT__', $_SERVER['DOCUMENT_ROOT']);

require_once __ROOT__ . "/config/connect.php";
require_once __ROOT__ . "/auth/user.php";
require_once __ROOT__ . "/helpers/debug.php";

$table = $_POST['table'];
$id_item = $_POST['id_item'];
$id_table = $_POST['id_table'];

unset($_POST['table']);
unset($_POST['submit']);
unset($_POST['id_table']);
unset($_POST['id_item']);

$update = '';
foreach ($_POST as $key => $data){
	$update .= "$key = '$data',";
}
$update = substr($update, 0, -1);

$query = "UPDATE $table SET $update WHERE $id_table='$id_item';";
mysqli_query($connect, $query);

$pageTitle = "Запись успешно обновлена";
$title = $pageTitle;

$tpl = __ROOT__ . "/pages/admin/info/index.php";
include __ROOT__ . "/layout/admin_layout.php";

mysqli_close($connect);

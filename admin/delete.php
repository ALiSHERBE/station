<?php
define('__ROOT__', $_SERVER['DOCUMENT_ROOT']);

require_once __ROOT__ . "/config/connect.php";
require_once __ROOT__ . "/auth/user.php";
require_once __ROOT__ . "/helpers/debug.php";

$table = $_GET['table'];
$id_item = $_GET['id'];
$id_table = $_GET['id_table'];

$query = "DELETE FROM `$table` WHERE $id_table='$id_item';";
mysqli_query($connect, $query);

$pageTitle = "Запись успешно удалена";
$title = $pageTitle;

$link = '/admin.php';
$link_text = 'На главную';

$tpl = __ROOT__ . "/pages/admin/info/index.php";
include __ROOT__ . "/layout/admin_layout.php";

mysqli_close($connect);

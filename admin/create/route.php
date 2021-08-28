<?php
define('__ROOT__', $_SERVER['DOCUMENT_ROOT']);

require_once __ROOT__."/config/connect.php";
require_once __ROOT__."/auth/user.php";
require_once __ROOT__."/helpers/debug.php";

$query = mysqli_query($connect, "SELECT * FROM `destinations`");
$destinations = mysqli_fetch_all($query, MYSQLI_ASSOC);

$query = mysqli_query($connect, "SELECT * FROM `movement_days`");
$movements = mysqli_fetch_all($query, MYSQLI_ASSOC);

$pageTitle = "курсовой проект";

$tpl = __ROOT__."/pages/admin/route/create.php";
include __ROOT__."/layout/admin_layout.php";

mysqli_close($connect);
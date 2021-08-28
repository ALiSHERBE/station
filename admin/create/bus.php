<?php
define('__ROOT__', $_SERVER['DOCUMENT_ROOT']);

require_once __ROOT__."/config/connect.php";
require_once __ROOT__."/auth/user.php";
require_once __ROOT__."/helpers/debug.php";

$pageTitle = "курсовой проект";

$tpl = __ROOT__."/pages/admin/bus/create.php";
include __ROOT__."/layout/admin_layout.php";

mysqli_close($connect);
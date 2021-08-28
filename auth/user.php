<?php
define('__ROOT__', $_SERVER['DOCUMENT_ROOT']);
require_once __ROOT__."/config/connect.php";

$query = mysqli_query($connect, "SELECT * FROM users WHERE id_user = '".intval($_COOKIE['id'])."' LIMIT 1");
$userdata = mysqli_fetch_assoc($query);
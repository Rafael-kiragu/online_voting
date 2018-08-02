<?php
//error_reporting(1);
define('DB_CONNECTION', 'localhost');
//define('DB_NAME', 'poll');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

//mysqli_connect('localhosT', 'root', '') or die(mysqli_error());
$link = mysqli_connect(DB_CONNECTION, DB_USER, DB_PASSWORD);
$db_select = mysqli_select_db($link,'poll') or die(mysqli_error());

?>

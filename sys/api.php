<?php
session_start();

//----------------------------------- ПОДКЛЮЧЕНИЕ К БД ----------------------------------
//Формирование подключения
$check_link = mysql_connect('localhost', 'USER', 'PASS');
//Проверка подключения
if (!$check_link) {
    die('Ошибка соединения: ' . mysql_error());
}
mysql_select_db("BD NAME") or die("Не могу выбрать таблицу в БД");
mysql_query("SET NAMES utf8");

//----------------------------------- КОНСТАНТЫ -----------------------------------------
//$adminbar=mysql_query("SELECT * FROM users WHERE username='".$_SESSION['username']."'");


//----------------------------------- КОНТРОЛЛЕР ПЕРЕДАЮЩИХСЯ ДАННЫХ --------------------
if (isset($_GET['id'])) {
	$_SESSION['id'] = $_GET['id'];
}	
if (isset($_GET['key'])) {
	$_SESSION['key'] = $_GET['key'];
};
?>
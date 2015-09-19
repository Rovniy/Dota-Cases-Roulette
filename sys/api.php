<?php
session_start();
include 'steam_auth.php';


//----------------------------------- ПОДКЛЮЧЕНИЕ К БД ----------------------------------
//Формирование подключения
$check_link = mysql_connect('localhost', 'root', '');
//Проверка подключения
if (!$check_link) {
    die('Ошибка соединения: ' . mysql_error());
}
 mysql_select_db('dota2_bd') or die("Не могу выбрать таблицу в БД");
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
//----------------------------------- STEAM API --------------------
function InsertIntoTableAccount() {
if (isset ($player))
	{	
		$InsertIntoAccount = "INSERT INTO account (steamid, personaname, profileurl, avatar, avatarfull) VALUES ('$player->steamid', '$player->personaname', '$player->profileurl', '$player->avatar' , '$player->avatarfull')";
			mysql_query($InsertIntoAccount);
	}
}

?>
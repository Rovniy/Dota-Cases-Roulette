<?php
# $SteamExUrl - Глобальный массив запрошенных данных из таблицы `account`. Строка 29. Пример: echo $SteamExUrl['linkid'];
# $SiteTopRow  - Глобальный массив запрошенных данных из таблицы `top`. Строка 32.
#
# xPloitGroup 2015 // MaximZhuravlev $ AndrewRovniy
session_start();
include 'steam_auth.php';
/************************************* SAIT CONFIG *******************************************/
$MainUrl = "http://localhost";
$BdUser = "root";
$BdPass = "";
$BdName = "dota2_bd";


//************************************ ТЕСТОВЫЙ ПОЛЬЗОВАТЕЛЬ **********************************/
$_SESSION['steamid'] = '123456';
$_SESSION['personaname'] = 'SOMEUSER';
$_SESSION['profileurl'] = '#';
$_SESSION['money'] = '1250';
$_SESSION['avatar'] = 'img/avatar.png';
$_SESSION['avatarfull'] = 'img/avatar.png';

//----------------------------------- ПОДКЛЮЧЕНИЕ К БД ----------------------------------
//Формирование подключения
$check_link = mysql_connect('localhost', $BdUser, $BdPass);
//Проверка подключения
if (!$check_link) {
    die('Ошибка соединения: ' . mysql_error());
}
mysql_select_db($BdName) or die("Не могу выбрать таблицу в БД");
mysql_query("SET NAMES utf8"); 

//-----------------------------------ПЕРЕМЕННЫЕ СЕССИЙ----------------------------------
if (isset($_SESSION['steamid'])) {
$SteamIdSession = $_SESSION['steamid'];
};

//----------------------------------- Запросы К БД -----------------------------------------
if (isset($SteamIdSession)) {
$SteamExchange = mysql_query("SELECT * from `account` WHERE `steamid` = '$SteamIdSession'"); 
$SteamExUrl = mysql_fetch_array($SteamExchange);
};
$SiteTopUser = mysql_query("SELECT * FROM `top`");
$SiteTopRow = mysql_fetch_array($SiteTopUser);

//----------------------------------- КОНТРОЛЛЕР ПЕРЕДАЮЩИХСЯ ДАННЫХ --------------------
if (isset($_GET['id'])) {
	$_SESSION['id'] = $_GET['id'];
}	
if (isset($_GET['key'])) {
	$_SESSION['key'] = $_GET['key'];
};
//----------------------------------- STEAM API --------------------

//Формирование ТОПа
$SelectTop = mysql_query("SELECT * from top");
$SelectTopRow = mysql_fetch_array($SelectTop); 

$SelectTopMoney = mysql_query("SELECT * from account");
$SelectTopMoneyRow = mysql_fetch_array($SelectTopMoney); 
 
//$TableTopDelete = mysql_query("DELETE FROM `top`");  
$TableTopUpdate = "INSERT INTO top (steamid, personaname, profileurl, avatar) VALUES ('$SelectTopMoneyRow[steamid]' , '$SelectTopMoneyRow[personaname]' , '$SelectTopMoneyRow[profileurl]' , '$SelectTopMoneyRow[avatar]')";
mysql_query($TableTopUpdate);


//Добавление нового пользователя в БД, и проверка на его существование
#
#
# ВОТ ТУТ НАДО СДЕЛАТЬ ФУНКЦИЯЮ ИЛИ ЧЕ-НИТЬ ЕЩЕ, ЧТОБЫ КОНТРОЛИРОВАТЬ ВЫЗОВ ЗАПРОСА.
# ПОКА Я ЭТО ПРИВЕЛ К ТАКОМУ ВИДУ, ЧТОБЫ НЕ ВЫДАВАЛОСЬ ОШИБОК
#
if ( isset($player)) {
	$steamid = mysql_query("SELECT * FROM account WHERE steamid = '$player->steamid'");
	$row = mysql_fetch_assoc($steamid); 
	
	if ($player->steamid != $row[steamid]) 
		{	
			$InsertIntoAccount = "INSERT INTO account (steamid, personaname, profileurl, avatar, avatarfull) VALUES ('$player->steamid', '$player->personaname', '$player->profileurl', '$player->avatar' , '$player->avatarfull')";
				mysql_query($InsertIntoAccount);
		}
}

//Добавление ссылки обмена в БД + проверки !!!!!!РЕАЛИЗОВАТЬ POST!
if (isset($_GET['saveurl'])) {
	$AccountLink = $_GET['saveurl'];
	if (isset($AccountLink)) 
	{
		if (isset($SteamIdSession)) 
		{
			$InsertIntoAccountLink = "UPDATE `account` set `linkid` = '$AccountLink' WHERE `steamid` = '$SteamIdSession'";
		}
	}
	mysql_query($InsertIntoAccountLink);
}
?>
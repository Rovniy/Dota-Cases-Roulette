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
$SaitBrand = "DOTA777.COM";
//Стоимость карт
$DefaultCard = '49';
$SilverCard = '75';
$GoldCard = '95';
$PlatinumCard = '119';
$BrilliantCard = '199';


//************************************ ТЕСТОВЫЙ ПОЛЬЗОВАТЕЛЬ **********************************/
$_SESSION['steamid'] = '123456';
$_SESSION['personaname'] = 'SOMEUSER';
$_SESSION['profileurl'] = '#';
$_SESSION['money'] = '1000';
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

//АКТУАЛЬНЫЙ РОЗЫГРЫШ
$ActualDrowQuery = mysql_query("SELECT * from `drows` WHERE `actual` = '1'"); 
$ActualDrow = mysql_fetch_array($ActualDrowQuery);
$ActualDrowID = $ActualDrow['id'];
//Количество купленных билетов
//$BilletCountQuery = mysql_query("SELECT * from `paycards` WHERE `actual` = '1'"); 
//Текущий пользователь
$CurrentUserSteam = $_SESSION['steamid'];
$CurrentUserName = $_SESSION['personaname'];
//Проверка наличия в нике приставки и зачисление бонуса
$CurrentUserBonusQuery = mysql_query("SELECT bonus from `account` WHERE `steamid` = '$CurrentUserSteam'");
$CurrentUserBonusArray = mysql_fetch_assoc($CurrentUserBonusQuery);
$CurrentUserBonus = $CurrentUserBonusArray['bonus'];
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


//---------------------------------------- ФОРМИРОВАНИЕ ТОПа ------------------------------------
$CountFetchArray = mysql_query("SELECT * FROM top ORDER BY allsum DESC");
$CountFetchTop = mysql_num_rows(mysql_query("SELECT * FROM top"));
if ($CountFetchTop > 50) {
	//Ищем минимальную сумму выигрыша
	$MinSumSql = mysql_query("SELECT MIN(allsum) as sum FROM top");
	$MinSumRow = mysql_fetch_assoc($MinSumSql);
	$MinSum = $MinSumRow['sum'];
	//Ищем ID строки у которой самый маленький выигрыш
	$MinIdSqlTop = mysql_query("SELECT id FROM top WHERE allsum = '$MinSum'");
	$MinIdTopRow = mysql_fetch_array($MinIdSqlTop);
	$MinIdTop = $MinIdTopRow['id'];
	//Удаляем строку с найденным ID
	$DelRowTopSql = mysql_query("DELETE FROM top WHERE id='$MinIdTop'");
}

//----------------------------------- STEAM API --------------------
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
			$FindBonus = strpos($player->personaname, $SaitBrand);
			if ($FindBonus === true) { //Именно ===, а не ==, чтобы он вернул Булевое значение
				$InsertIntoAccount = "INSERT INTO account (steamid, personaname, profileurl, avatar, avatarfull, bonus) VALUES ('$player->steamid', '$player->personaname', '$player->profileurl', '$player->avatar' , '$player->avatarfull', '5')";
				mysql_query($InsertIntoAccount);
			}
			else{
				$InsertIntoAccount = "INSERT INTO account (steamid, personaname, profileurl, avatar, avatarfull, bonus) VALUES ('$player->steamid', '$player->personaname', '$player->profileurl', '$player->avatar' , '$player->avatarfull', '0')";
				mysql_query($InsertIntoAccount);
			}
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
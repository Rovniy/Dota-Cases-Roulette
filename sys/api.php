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
$_SESSION['personaname'] = 'Ravy';
$_SESSION['profileurl'] = '#';
$_SESSION['money'] = '1050';
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
$BilletCountQuery = mysql_query("SELECT * from `paycards` WHERE `drow` = '$ActualDrowID'"); 
$BilletCount = mysql_num_rows($BilletCountQuery);

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



		
//получение вещей админа
function getInventory($_STEAMAPI, $steamid) {
     
	$SearchActualId = mysql_query("SELECT actual FROM `drows` WHERE actual = 1");
	$countRows = mysql_num_rows($SearchActualId);
	
	if ($countRows == 0) {
				$InsertInto = mysql_query("INSERT INTO `drows` (item1,actual) VALUES ('READY', '1') ");
			} 
		
	 
    $url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=".$_STEAMAPI."&steamids=76561198021990602";
    $json_object = file_get_contents($url);
    $json_decoded = json_decode($json_object);
    $str = '76561198021990602';
    $urlInv = "http://steamcommunity.com/profiles/" . $str . "/inventory/json/570/2/?trading=1";
    $json_object_inv = file_get_contents($urlInv);
    $json_decoded_inv = json_decode($json_object_inv, true);
    // iterate through Inventory and find ids.
    $rgInventory = $json_decoded_inv[rgInventory];
    $rgInventory = array_values($rgInventory);
    $rgDesc = $json_decoded_inv[rgDescriptions];
    $rgDesc = array_values($rgDesc);
    $itemnames = array();
    for ($i = 0; $i < 10; $i++) {  //iterate through rgInventory.
        $classidInv = $rgInventory[$i]['classid'];
        $instanceidInv = $rgInventory[$i]['instanceid'];
        for ($j = 0; $j < 10; $j++) {   //iterate through rgDesc.
            $classid = $rgDesc[$j]['classid'];
            $instanceid = $rgDesc[$j]['instanceid'];
            if ($classidInv == $classid && $instanceidInv == $instanceid) {
                $icon_url = $rgDesc[$j]['icon_url'];
                $market_name = $rgDesc[$j]['market_name'];
                $market_name_formatted = str_replace(" ", "%20", $market_name);
                $st_color = $rgDesc[$j]['name_color'];
				$itemType = $rgDesc[$j]['type'];
                $itemnames = array_push($itemnames, $market_name_formatted);
				for ($k = 0; $k < 10; $k++) {
					if ($rgDesc[$j]['tags'][$k]['category'] == "Rarity") {
							$name_color = $rgDesc[$j]['tags'][$k]['color'];
					} else if ($rgDesc[$j]['tags'][$k]['category'] == "Exterior") {
							$name_exterior = $rgDesc[$j]['tags'][$k]['name'];
					} 
				}
            }
			
        }
        if ($st_color == "CF6A32") {
            $name_color = "CF6A32";
        }
		//берем вещи из БД
		$ViewItemFromBD = mysql_query("SELECT item$i,img$i FROM `drows` WHERE actual = 1");
			$row = mysql_fetch_assoc($ViewItemFromBD); 
		
         echo '
		<div class="roz-item item' . $i . '" style="border:1px solid #$name_color ">
				<img style=border-color:#' . $name_color. ' src="http://steamcommunity-a.akamaihd.net/economy/image/' . $row['img' .$i. ''] . '" width="112px" height="98px" alt="' . $market_name . "/" . $name_color . '"/>
			<div class="Opisanie">
			<span>' . $row['item' .$i. ''] . '<br/><strong></strong></span>
			</div>
				</div>
		'; 

			if ($countRows == 1) {
				$InsertItemsIntoTable = 'UPDATE drows SET item' .$i. ' = "' .$market_name. '", img' .$i. ' = "' .$icon_url. '" WHERE actual = 1';
			}
				mysql_query($InsertItemsIntoTable);
				
				$name_exterior = null;
	
    }
			
	
}
?>
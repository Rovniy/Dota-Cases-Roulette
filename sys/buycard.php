<?php
include 'api.php';
$typecard = $_GET['typecard'];
$data = array();

//Проверка состояний счета
if ($typecard == 'default') {
$CurrentBuyCard = $DefaultCard;
$CurrentPoins = 10;
}
if ($typecard == 'silver') {
$CurrentBuyCard = $SilverCard;
$CurrentPoins = 20;
}
if ($typecard == 'gold') {
$CurrentBuyCard = $GoldCard;
$CurrentPoins = 30;
}
if ($typecard == 'platinum') {
$CurrentBuyCard = $PlatinumCard;
$CurrentPoins = 40;
}
if ($typecard == 'brilliant') {
$CurrentBuyCard = $BrilliantCard;
$CurrentPoins = 50;
}

	if ($_SESSION['money'] >= $CurrentBuyCard) {
		
		$RemoveMoney = $_SESSION['money'] - ($CurrentBuyCard - $CurrentBuyCard * $CurrentUserBonus / 100);
		$RemoveMoneyQuery = "UPDATE account SET money=$RemoveMoney";
		mysql_query($RemoveMoneyQuery);
		
		$InsertIntoAccount = "INSERT INTO paycards (drow, steamid, user, cardtype, cardpoints) VALUES ('$ActualDrowID', '$CurrentUserSteam', '$CurrentUserName', '$typecard', '$CurrentPoins')";
		mysql_query($InsertIntoAccount);
		
		$PaymentsQuery = "INSERT INTO payments (steamid, user, operation, summ) VALUES ('$CurrentUserSteam', '$CurrentUserName', '-$CurrentBuyCard', '$RemoveMoney')";
		mysql_query($PaymentsQuery);
		
		$data['status'] = true; 
		echo json_encode($data);
	} 
	else {
		$data['status'] = false; 
		echo json_encode($data); 
		}
/*
if ($typecard == 'default') {
	if ($_SESSION['money'] >= $DefaultCard) {
		
		$RemoveMoney = $_SESSION['money'] - $DefaultCard;
		$RemoveMoneyQuery = "UPDATE account SET money=$RemoveMoney";
		mysql_query($RemoveMoneyQuery);
		
		$InsertIntoAccount = "INSERT INTO paycards (drow, steamid, cardtype, cardpoints) VALUES ('$ActualDrowID', '$CurrentUser', '$typecard', '10')";
		mysql_query($InsertIntoAccount);
		
		$PaymentsQuery = "INSERT INTO payments (steamid, operation, summ) VALUES ('$CurrentUser', '-$DefaultCard', '$RemoveMoney')";
		mysql_query($PaymentsQuery);
		
		$data['status'] = true; 
		echo json_encode($data);
	} 
	else {
		$data['status'] = false; 
		echo json_encode($data); 
		}
}
if ($typecard == 'silver') {
	if ($_SESSION['money'] >= $DefaultCard) {
		$InsertIntoAccount = "INSERT INTO paycards (drow, steamid, cardtype, cardpoints) VALUES ('$ActualDrowID', '$CurrentUser', '$typecard', '20')";
		mysql_query($InsertIntoAccount);
		$data['status'] = true; 
		echo json_encode($data);
	} else { $data['status'] = false; echo json_encode($data); }
}
if ($typecard == 'gold') {
	if ($_SESSION['money'] >= $DefaultCard) {
		$InsertIntoAccount = "INSERT INTO paycards (drow, steamid, cardtype, cardpoints) VALUES ('$ActualDrowID', '$CurrentUser', '$typecard', '30')";
		mysql_query($InsertIntoAccount);
		$data['status'] = true; 
		echo json_encode($data);
	} else { $data['status'] = false; echo json_encode($data); }
}
if ($typecard == 'platinum') {
	if ($_SESSION['money'] >= $DefaultCard) {
		$InsertIntoAccount = "INSERT INTO paycards (drow, steamid, cardtype, cardpoints) VALUES ('$ActualDrowID', '$CurrentUser', '$typecard', '40')";
		mysql_query($InsertIntoAccount);
		$data['status'] = true; 
		echo json_encode($data);
	} else { $data['status'] = false; echo json_encode($data); }
}
if ($typecard == 'brilliant') {
	if ($_SESSION['money'] >= $DefaultCard) {
		$InsertIntoAccount = "INSERT INTO paycards (drow, steamid, cardtype, cardpoints) VALUES ('$$ActualDrowID', '$CurrentUser', '$typecard', '50')";
		mysql_query($InsertIntoAccount);
		$data['status'] = true; 
		echo json_encode($data);
	} else { $data['status'] = false; echo json_encode($data); }
}*/
?>
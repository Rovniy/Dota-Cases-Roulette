<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dota2.gg Install</title>
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<script src="../js/jquery-1.11.0.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/controls.js"></script>
</head>
<body>
<?php
require "../sys/api.php";

function install() {
	$TableAccount = "
	CREATE TABLE account (
	 id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
	 steamid text,
	 personaname text,
	 profileurl varchar(100),
	 avatar VARCHAR(100),
	 avatarfull VARCHAR(100),
	 money VARCHAR(50),
	 bonus int,
	 linkid text,
	 bonusnick text
	) DEFAULT CHARSET=utf8; 
	";
		
	$TableTop = "
	CREATE TABLE top (
	 id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
	 steamid text,
	 pearsonaname text,
	 items text,
	 allsum text
	) DEFAULT CHARSET=utf8;
	";
	
			
	$TableChat = "
		CREATE TABLE `messages` (
	  `id` int(5) NOT NULL auto_increment,
	  `name` char(255) character set utf8 NOT NULL,
	  `text` text character set utf8,
	  PRIMARY KEY  (`id`)
	);
	";
	
	
	$TablePayCards = "
	CREATE TABLE paycards (
	 id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
	 drow int,
	 steamid text,
	 cardtype VARCHAR(100),
	 cardpoints int
	) DEFAULT CHARSET=utf8;
	";
	//Вот тут тоже надо дату сделать, чтоы автоматом ставилась
	$TableDrows = "
	CREATE TABLE drows (
	 id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
	 actual varchar(100),
	 datestart timestamp,
	 item1 text,
	 cost1 text,
	 user1 text,
	 item2 text,
	 cost2 text,
	 user2 text,
	 item3 text,
	 cost3 text,
	 user3 text,
	 item4 text,
	 cost4 text,
	 user4 text,
	 item5 text,
	 cost5 text,
	 user5 text,
	 item6 text,
	 cost6 text,
	 user6 text,
	 item7 text,
	 cost7 text,
	 user7 text,
	 item8 text,
	 cost8 text,
	 user8 text,
	 item9 text,
	 cost9 text,
	 user9 text,
	 item10 text,
	 cost10 text,
	 user10 text
	) DEFAULT CHARSET=utf8;
	";
	//Вот тут надо намудрить с полем Даты, чтобы автоматом было CURRENT_TIMESTAMP
	$TablePayments = "
	CREATE TABLE payments (
	 id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
	 steamid VARCHAR(100),
	 operation VARCHAR(100),
	 summ VARCHAR(100),
	 date timestamp 
	) DEFAULT CHARSET=utf8;
	";
	
	
	$TabUniPay = "
	CREATE TABLE `unitpay_payments` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`unitpayId` varchar(255) NOT NULL,
	`account` varchar(255) NOT NULL,
	`sum` float NOT NULL,
	`itemsCount` int(11) NOT NULL DEFAULT '1',
	`dateCreate` datetime NOT NULL,
	`dateComplete` datetime DEFAULT NULL,
	`status` tinyint(4) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
	
	
	
	//mysql_query($TableAccount);
	//mysql_query($TableTop);
	//mysql_query($TabUniPay);
	//mysql_query($TablePayCards);
	//mysql_query($TableDrows);
	//mysql_query($TablePayments);
	mysql_query($TableChat);
	
	/* Проверка состояния БД */
	if (mysql_error()) { echo "<h1 class='ins_center ins_red'>".mysql_error()."</h1>"; }
	else { echo "<h1 class='ins_center ins_green'>Установка успешно закончена!</h1>"; };
}
?>
<div class="container">
	<div class="row ins_ptop50 ins_center">
		<h2>Создание базы данных</h2>
		<a class="btn btn-large btn-danger" href="?run=1">Запустить установку MySQL bd</a>
	</div>
</div>
<?php
	/* Функция запуска установки */
	if ($_GET['run']==1) {
		install();
}
?>
</body>
</html>
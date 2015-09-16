<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dota2.gg</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/controls.js"></script>
</head>
<body>
<?php 
//Подключение библиотеки API сайта
include '/sys/api.php'; 
?>
<!-- Шапка сайта, главное меню и логотип -->
<div class="container-fluid header_bar">
	<a href="#" class="pull-right steam_enter">Steam</a>
	<div class="container header">
		<div class="row">
			<div class="col-lg-2 logo">
				<img src="img/logo.png" alt=""/>
			</div>
			<div class="col-lg-10 menunav">
				<ul>
					<li><a href="#" class="active">Главная</a></li>
					<li><a href="#">Помощь</a></li>
					<li><a href="#">Инструкция</a></li>
					<li><a href="#">Гарантии</a></li>
					<li><a href="#">ТОП игроков</a></li>
					<li><a href="#">Личный кабинет</a></li>
					<li><a href="#">Мы Вконтакте</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	
</div>
<!-- Тело сайта  -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dota777.com | Испытай свою удачу!</title>
<link type="image/x-icon" rel="shortcut icon" href="favicon.png">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
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
	
		<div class="row header">
			<div class="col-lg-1 user_acc center">
				<a href="#" class="pull-right">
					<i class="fa fa-user fa-2x"></i>
				</a>
			</div>
			<div class="col-lg-1 logo center">
				<a href="#">
					<img src="img/logo.gif" alt="Dota777"/>
				</a>
			</div>
			<div class="col-lg-8 menunav col-sm-12">
				<ul>
					<li class="active"><a href="#" >ГЛАВНАЯ</a></li>
					<li><a href="#">ПОМОЩЬ</a></li>
					<li><a href="#">ИНСТРУКЦИЯ</a></li>
					<li><a href="#">ГАРАНТИИ</a></li>
					<li><a href="#">ТОП</a></li>
					<li><a href="#">ЛИЧНЫЙ КАБИНЕТ</a></li>
				</ul>
			</div>
			<div class="col-lg-1 steam pull-right">
				<a href="#" class="steam_enter" id="steam_enter">
						<i class="fa fa-steam fa-2x"></i>
				</a>			
			</div>
		</div>
	
	
</div>
<!-- Тело сайта  -->
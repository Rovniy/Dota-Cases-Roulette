<?php
//Подключение шапки сайта
require 'header.php';
?>
<!--  Тело сайта - главная страница -->
<div class="container main">
		<section class="indexsection" id="Section1">
			<?php
			//Подключение контент
			//require 'content/main.php';
			?>
		</section>
		<section class="Accountsection" id="Section2">
			<div class="row AccountPath">
				<h3>ЛИЧНЫЙ КАБИНЕТ | Steam ID: 6819_874198494</h3>
			</div>
			<div class="row AccountLine">
				<div class="col-lg-5 LeftBar">
					<div class="col-lg-2 AccountAvatar">
						<img alt="avatar" src="img/avatar.png"/>
					</div>
					<div class="col-lg-10 AccountName">
						<h3>Ravy<br/><small>Сейчас на сайте</small></h3>
					</div>
				</div>
				<div class="col-lg-3 AccountBalance">
					<h3>458 руб.<br/><small>Ваш баланс</small></h3>
				</div>
				<div class="col-lg-4 AccountByu">
					<a href="#" class="ByuTicket">ПОПОЛНИТЬ БАЛАНС</a>
				</div>
			</div>
			<div class="TradeLink">
				<form action="">
					<input type="text" class="TradeLinkArea" placeholder="Персональная ссылка на обмен" value="https://steamcommunity.com/tradeoffer/new/?partner=60679470&token=Rbp6kdzZ">
					<button type="submit">Сохранить</button>
				</form>
			</div>
			<div class="row AccountDetails">
				<div class="col-lg-6">
					
				</div>				
				<div class="col-lg-6">
					
				</div>				
			</div>
			
			
			<?php
			//Подключение контент
			//require 'content/account.php';
			?>
		</section>

</div>

<?php
//Подключение футера
require 'footer.php';
?>
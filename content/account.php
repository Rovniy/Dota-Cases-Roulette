<div class="row AccountPath">
				<h3>ЛИЧНЫЙ КАБИНЕТ | Steam ID: <?php echo $_SESSION['steamid'] ?></h3>
</div>
			<div class="row AccountLine">
				<div class="col-lg-5 LeftBar">
					<div class="col-lg-2 AccountAvatar">
						<img alt="avatar" src="<?php echo $_SESSION['avatar'] ?>"/>
					</div>
					<div class="col-lg-10 AccountName">
						<h3><?php echo $_SESSION['personaname'] ?><br/><small>Сейчас на сайте</small></h3>
					</div>
				</div>
				<div class="col-lg-2 AccountBalance">
					<h3><?php echo $_SESSION['money'];?> руб. <br/><small>Ваш баланс</small></h3>
				</div>
				<div class="col-lg-4 AddBalance">
					<a href="#" data-toggle="modal" data-target="#myModal" class="ByuTicket"><i class="fa fa-plus"></i> ПОПОЛНИТЬ БАЛАНС</a>
				</div>
				<div class="col-lg-1 AccountByu">
					<a href="sys/logout.php" class="RedButton SmallBtn" >ВЫХОД</a>
				</div>
			</div>
			<div class="row TradeLink">
				<div class="col-lg-9 Left">
							<input type="text" name="linkid" class="TradeLinkArea" placeholder="ВАША ССЫЛКА НА ОБМЕН" value="<?php echo $SteamExUrl['linkid']; ?>">
							<button onclick="SaveUrl()" class="ByuTicket">СОХРАНИТЬ</button>
				</div>
				<div class="col-lg-3 Right">
					<a class="GreyButton Danger" id="HelpButton" href="#">КАК ЕЕ ПОЛУЧИТЬ?</a>
					
				</div>
			</div>
			<div class="row AccountDetails">
				<div class="col-lg-8">
				<h3>ПОСЛЕДНИЕ ВЫИГРАННЫЕ ПРЕДМЕТЫ</h3>
					<div class="roz-item item1 grade-common" id="obj1">
						<img src="http://steamcommunity-a.akamaihd.net/economy/image/W_I_5GLm4wPcv9jJQ7z7tz_l_0sEIYUhRfbF4arNQkgGQGKd3kMuVpMgCwRZrguDeFivh70CfurUGzExG43xUkG5C7mfw0zvX9QTeNVjYGtMio3pjkoSAnXTDeQTXth_uM6RgQy7CAPAfmA6mo8Fi-2O3pGimJRH5w"/>
						<div class="Opisanie">
							<span>Genuine Crystal<br/><strong>(845 руб.)</strong></span>
						</div>
					</div>
					<div class="roz-item item2 grade-uncommon" id="obj2">
						<img src="http://steamcommunity-a.akamaihd.net/economy/image/W_I_5GLm4wPcv9jJQ7z7tz_l_0sEIYUhRfbF4arNQkgGQGKd3kMuVpMgCwRZrguPdUmZ0v8CaOrdEQY2Dtf9T0OuPKKZiByjXYcffIBhbz9AiYrhj08QBiHWUOJGCtApupPHgQzvXArCfjBsydgfwq2ZwlCw3CM"/>
						<div class="Opisanie">
							<span> Genuine The Barb of Skadi<br/><strong>(310 руб.)</strong></span>
						</div>
					</div>				
					<div class="roz-item item3 grade-rare" id="obj3">
						<img src="http://steamcommunity-a.akamaihd.net/economy/image/W_I_5GLm4wPcv9jJQ7z7tz_l_0sEIYUhRfbF4arNQkgGQGKd3kMuVpMgCwRZrguPdUmZ0v8CaOrdEQY2Dtf9T0OuPKKZ-VukVt9Tf9ZqNG0m0pm76R1NEHC4QeNHUIl-_vWBh1fmSVb-JGtjnpJU0fuY0cCBCKbQ-xXkdwAlgeFrDc8QnxlZMzsxmmZiIap1ZlIeo1Jt-0CuDDpkbZgZ"/>
						<div class="Opisanie">
							<span>Blade of Tears<br/><strong>(453 руб.)</strong></span>
						</div>
					</div>	
					<div class="roz-item item4 grade-mythical" id="obj4">
						<img src="http://steamcommunity-a.akamaihd.net/economy/image/W_I_5GLm4wPcv9jJQ7z7tz_l_0sEIYUhRfbF4arNQkgGQGKd3kMuVpMgCwRZrh6EYkid1utIJeHPEAAwFJ_AR0mCJ6iZ-XapXtFDNdZwK2EQ0o6H1xR9F3STatlMXYF_o8yW1wmxXgqRfjo7md4C1qfP0sHTXfOBrBa1JVVy2udsBJQbmh9ZZDIuiW01ObjFJn4"/>
						<div class="Opisanie">
							<span>Leviathan Whale Blade<br/><strong>(1545 руб.)</strong></span>
						</div>
					</div>				
					<div class="roz-item item5 grade-immortal" id="obj5">
						<img src="http://steamcommunity-a.akamaihd.net/economy/image/W_I_5GLm4wPcv9jJQ7z7tz_l_0sEIYUhRfbF4arNQkgGQGKd3kMuVpMgCwRZrgqYZUDfxPtEbPflAQI4DafqVFe8C6yfy1ruTsJUe-t2LmYfyLa72hhVSiLQB-BCDIYrv5LF0Vy9WVDCKGZuwtlXivPIhZKBCqeBqkexcApxhuV3TcJEg4BiXd0"/>
						<div class="Opisanie">
							<span>Exalted Frost Avalanche<br/><strong>(188 руб.)</strong></span>
						</div>
					</div>	
				</div>
				<div class="col-lg-2 changenick">
					<h3>Добавь в свой ник</h3>
					<dota777>DOTA777.COM</dota777>
					<h3>и получи скидку в 5% на покупку билетов!</h3>
	
				</div>
				<div class="col-lg-2 changebonus">
					<h3>ТЕКУЩИЙ БОНУС</h3>
					<bonus><?php echo $CurrentUserBonus;?>%</bonus>
					
				</div>
			</div>
<?php //********************* MODAL **************** ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">ПОПОЛНЕНИЕ ЛИЧНОГО СЧЕТА</h4>
			</div>
			<div class="modal-body">
				<form method="GET" action="./sys/gopay.php?cost=<? echo $_GET['sum']?>">
					<input name="sum" type="text" class="InputCash" placeholder="Сумма пополнения (руб.)">
			</div>
			<div class="modal-footer">
				<button type="submit" class="ByuTicket">ПОПОЛНИТЬ</button>
				</form>
			</div>
		</div>
	</div>
</div>
			
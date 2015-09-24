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
					<a href="sys/logout.php" class="RedButton SmallBtn"><i class="fa fa-sign-out fa"></i></a>
				</div>
			</div>
			<div class="row TradeLink">
				<div class="col-lg-9 Left">
					<form method="GET" action="#">
						<input type="text" name="saveurl" class="TradeLinkArea" placeholder="Укажите ссылку" value="<?php echo $SteamExUrl['linkid']; ?>">
						<button class="ByuTicket" type="submit">СОХРАНИТЬ</button>
					</form>
					
		
				</div>
				<div class="col-lg-3 Right">
					<a class="GreyButton Danger" href="#">КАК ЕЕ ПОЛУЧИТЬ?</a>
					
				</div>
			</div>
			<div class="row AccountDetails">
			
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
			
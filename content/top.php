<div class="row">
	<div class="row TopTitle">
		<div class="col-lg-4">
				<h1><?php echo $CountFetchTop; ?><br/><small>ИГРОКОВ В РЕЙТИНГЕ</small></h1>
		</div>
		<div class="col-lg-4">
			<h1>5<br/><small>ИГР СЕГОДНЯ</small></h1>
		</div>
		<div class="col-lg-4">
			<h1>35<br/><small>УНИКАЛЬНЫХ ИГРОКОВ СЕГОДНЯ</small></h1>
		</div>
	</div>
</div>
<div class="row TopBody">
	<table>
		<tr class="ToptableTitle">
			<td class="TopID">
				<span>ID #</span>
			</td>
			<td class="TopNameSteam">
				<span>ИМЯ В STEAM</span>
			</td>
			<td class="TopColItems">
				<span>КОЛИЧЕСТВО ПРЕДМЕТОВ</span>
			</td>
			<td class="TopSummWin">
				<span>СУММА ВЫИГРЫША</span>
			</td>
		</tr>
		<?php 
		$i = 0;
		while ($thistop = mysql_fetch_array($CountFetchArray)) {
			$i++;
			echo '
			<tr>
				<td>
					<span class="TopID">'.$i.'</span>
				</td>
				<td>
					<span class="TopNameSteam">'.$thistop["pearsonaname"].'</span>
				</td>
				<td>
					<span class="TopColItems">'.$thistop["items"].'</span>
				</td>
				<td>
					<span class="TopSummWin">'.$thistop["allsum"].' руб.</span>
				</td>
			</tr>';	
		}
		?>		
	</table>
</div>
			
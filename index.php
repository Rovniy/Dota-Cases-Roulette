<?php
//Подключение шапки сайта
include_once 'header.php';
?>
<div class="container">
<!--  Тело сайта - главная страница -->
		<section class="indexsection current" id="Section1">
			<div class="container main">
				<?php
				//Подключение контент
				require 'content/main.php';
				?>
			</div>
		</section>
		<section class="Accountsection none" id="Section2">
			<div class="container main">
				<?php
				//Подключение контент
				require 'content/account.php';
				?>
			</div>
		</section>
		<section class="Accountsection none" id="Section3">
			<div class="container main">
				<?php
				//Подключение контент
				require 'content/account.php';
				?>
			</div>
		</section>
		<section class="Accountsection none" id="Section4">
			<div class="container main">
				<?php
				//Подключение контент
				require 'content/account.php';
				?>
			</div>
		</section>
</div>
<?php
//Подключение футера
require 'footer.php';
?>
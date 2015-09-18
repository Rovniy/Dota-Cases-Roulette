<?php
//Подключение шапки сайта
require 'header.php';
?>
<!--  Тело сайта - главная страница -->
<div class="container main">
		<section class="indexsection current" id="Section1">
			<?php
			//Подключение контент
			require 'content/main.php';
			?>
		</section>
		<section class="Accountsection none" id="Section2">
			<?php
			//Подключение контент
			require 'content/account.php';
			?>
		</section>
		<section class="Accountsection none" id="Section3">
			<?php
			//Подключение контент
			require 'content/account.php';
			?>
		</section>
		<section class="Accountsection none" id="Section4">
			<?php
			//Подключение контент
			require 'content/account.php';
			?>
		</section>

</div>

<?php
//Подключение футера
require 'footer.php';
?>
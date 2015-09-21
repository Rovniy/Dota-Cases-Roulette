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
		<section class="Helpsection none" id="Section2">
			<div class="container main">
				<?php
				//Подключение контент
				require 'content/help.php';
				?>
			</div>
		</section>
		<section class="Instructionsection none" id="Section3">
			<div class="container main">
				<?php
				//Подключение контент
				require 'content/instruction.php';
				?>
			</div>
		</section>
		<section class="Garantsection none" id="Section4">
			<div class="container main">
				<?php
				//Подключение контент
				require 'content/garant.php';
				?>
			</div>
		</section>
		<section class="Topsection none" id="Section5">
			<div class="container main">
				<?php
				//Подключение контент
				require 'content/top.php';
				?>
			</div>
		</section>
		<section class="Accountsection none" id="Section6">
			<div class="container main">
				<?php
				//Подключение контент
				require 'content/account.php';
				?>
			</div>
		</section>
		<section class="ByuPage none" id="Section7">
			<div class="container main">
				<?php
				//Подключение контент
				require 'content/byupage.php';
				?>
			</div>
		</section>
</div>
<?php
//Подключение футера
require 'footer.php';
?>
<!--  Нижний колонтитул  -->
<div class="container-fluid footer_bar">
	<div class="row footer">
			<div class="col-lg-4 col-sm-4 textareachat">
				<div class="chat">
					<div id="chat_area"><!-- Сюда мы будем добавлять новые сообщения --></div>
				</div>
				<form id="pac_form"><!-- Наша форма с именем, сообщением и кнопкой для отправки -->
					<input type="text" id="pac_name" value="<?php echo $_SESSION['personaname']; ?>">
					<input type="text" id="pac_text" class="chatinput" autocomplete="off" placeholder="Это чат. Здесь можно поболтать." value="">
					<input type="submit" id="SubmitChat" value="Отправить">
				</form>
			</div>
			<div class="col-lg-4 col-sm-4 center">
			</div>
			<div class="col-lg-4 col-sm-4 pull-right controls-buttons">
				<a href="#" id="volume" class="volume"><i class="fa fa-volume-up fa-2x"></i></a>
			</div>
		</div>
</div>
<!-- ОТКЛЮЧЕНИЕ ЗВУКА, ВРЕМЕННАЯ МЕРА  -->
<!--<audio id="MusicDota" src="sounds/main_theme.mp3" loop autoplay></audio>-->















<!--------------------- ВИДЕОФОН  -------------------------->
<div id="trailer" class="is_overlay">
	<video id="video" width="100%" height="auto" autoplay="autoplay" loop="loop" preload="auto">
		<source src="movies/Dots2_background.mp4"></source>
		<source src="movies/Dots2_background.webm" type="video/webm"></source>
	</video>
</div>
</body>
</html>
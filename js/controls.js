//---------------------------------------------------ќбраотчик форм ---------------------------------------
$(document).ready(function ($) {
		$('#formSubmit').click(function(){ 
			var error = false;

			var name = $('input#formName').val(); 
			if(name == "" || name == " ") {
				$('#error-name').fadeIn('slow');
				error = true;
			}else{
				$('#error-name').fadeOut('slow');
			}

			var email_compare = /^([a-z0-9_.-]+)@([da-z.-]+).([a-z.]{2,6})$/;
			var email = $('input#formEmail').val();
			if (email == "" || email == " ") {
				$('#error-email').fadeIn('slow');
				error = true;
			}else if (!email_compare.test(email)) {
				$('#error-email').fadeIn('slow');
				error = true;
			}else{
				$('#error-email').fadeOut('slow');
			}

			var message = $('textarea#message').val();
			if(message == "" || message == " ") {
				$('#error-sms').fadeIn('slow');
				error = true;
			}else{
				$('#error-sms').fadeOut('slow');
			}
			
			if(error == false){
			$.post("../sys/mail.php", $("#contactForm").serialize(), function(){
			$('#contactForm').slideUp('slow');
			$('#modal-header').slideUp('slow');
			$('#success-forms').slideDown('slow');
			});
			}
		return false;
		});
//Выдвигающаяся кнопка логин в стим
		$('#steam_enter').hover(function(){
			//$('#hidden_btn_steam').css('display','block');
		});
		
		
		$('#volume').click(function(){ 
			var pausa = document.getElementById('MusicDota');
			if (pausa.paused == true) {
				document.getElementById('MusicDota').play();
				$('#volume').html("<i class='fa fa-volume-up fa-2x'>");
			} 
			else {
				document.getElementById('MusicDota').pause();
				$('#volume').html("<i class='fa fa-volume-down fa-2x volumedown'>");
			}
		});
		
		
//--------------------------------------------------------------Открытие подсказок для разыгрываемых предметов
		
		$('#obj1').popover({placement:'top',trigger:'hover'});
		$('#obj2').popover({placement:'top',trigger:'hover'});
		$('#obj3').popover({placement:'top',trigger:'hover'});
		$('#obj4').popover({placement:'top',trigger:'hover'});
		$('#obj5').popover({placement:'top',trigger:'hover'});
		$('#obj6').popover({placement:'top',trigger:'hover'});
		$('#obj7').popover({placement:'top',trigger:'hover'});
		$('#obj8').popover({placement:'top',trigger:'hover'});
		$('#obj9').popover({placement:'top',trigger:'hover'});
		$('#obj10').popover({placement:'top',trigger:'hover'});
		
		
		
//-------------------------------------------------------------- СЛАЙДЕР КОНТЕНТА -------------------------------------
$GoToWidth = (($(window).width()-1000)/2)+15; //Расчет ширины экрана и положения блоков
$timeout = 300; //Задержка анимации
function ClassOperation() {
	$('.current').animate({left: "-2000"}, $timeout);
	$('.current').removeClass('current');
	$('.active').removeClass('active');
	var audio = new Audio(); // Создаём новый элемент Audio
	audio.src = 'sounds/menu.ogg'; // Указываем путь к звуку "клика"
	audio.autoplay = true; // Автоматически запускаем
};
//Конпка ГЛАВНАЯ
$('#nav_index').click(function(){
	$Sect = '#Section1';
	$id = '#nav_index';
	ClassOperation();
	$($Sect).animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//Конпка ПОМОЩь
$('#nav_help').click(function(){
	$Sect = '#Section2';
	$id = '#nav_help';
	ClassOperation();
	$($Sect).animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//Конпка ИНСТРУКЦИИ
$('#nav_instructions').click(function(){
	$Sect = '#Section3';
	$id = '#nav_instructions';
	ClassOperation();
	$($Sect).animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//Конпка ГАРАНТИИ
$('#nav_garant').click(function(){
	$Sect = '#Section4';
	$id = '#nav_garant';
	ClassOperation();
	$($Sect).animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//Конпка ТОП
$('#nav_top').click(function(){
	$Sect = '#Section5';
	$id = '#nav_top';
	ClassOperation();
	$($Sect).animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//Кнопка ЛИЧНЫЙ КАБИНЕТ
$('#nav_account').click(function(){
	$Sect = '#Section6';
	$id = '#nav_account';
	ClassOperation();
	$($Sect).animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//Кнопка ЛИЧНЫЙ КАБИНЕТ С ИКОНКИ ЛК
$('#UserIcon').click(function(){
	$Sect = '#Section6';
	$id = '#UserIcon';
	ClassOperation();
	$($Sect).animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//Кнопка ПРИНЯТЬ УЧАСТИЕ
$('#ByuTicket').click(function(){
	$Sect = '#Section7';
	$id = '#ByuTicket';
	ClassOperation();
	$($Sect).animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//Сылка логотипа
$('#logo_index').click(function(){
	$Sect = '#Section1';
	$id = '#logo_index';
	ClassOperation();
	$($Sect).animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
		
		
		
		
		
		
		
		

});	

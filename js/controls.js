//---------------------------------------------------Обраотчик форм ---------------------------------------
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
//‚ыдвигающаЯсЯ кнопка логин в стим
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
		

		
//-------------------------------------------------------------- ‘‹Ђ‰„…ђ ЉЋЌ’…Ќ’Ђ -------------------------------------
$GoToWidth = (($(window).width()-1000)/2)+15; //ђасчет ширины экрана и положениЯ блоков
$timeout = 200; //‡адержка анимации
function ClassOperation() {
	$('.current').stop().animate({left: "-2000"}, $timeout);
	$('.current').removeClass('current');
	$('.active').removeClass('active');
	var audio = new Audio(); // ‘оздаЮм новый элемент Audio
	audio.src = 'sounds/menu.ogg'; // “казываем путь к звуку "клика"
	audio.autoplay = true; // Ђвтоматически запускаем
};
//Љонпка ѓ‹Ђ‚ЌЂџ
$('#nav_index').click(function(){
	$Sect = '#Section1';
	$id = '#nav_index';
	ClassOperation();
	$($Sect).stop().animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//Љонпка ЏЋЊЋ™ь
$('#nav_help').click(function(){
	$Sect = '#Section2';
	$id = '#nav_help';
	ClassOperation();
	$($Sect).stop().animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//Љонпка €Ќ‘’ђ“Љ–€€
$('#nav_instructions').click(function(){
	$Sect = '#Section3';
	$id = '#nav_instructions';
	ClassOperation();
	$($Sect).stop().animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//Љонпка ѓЂђЂЌ’€€
$('#nav_garant').click(function(){
	$Sect = '#Section4';
	$id = '#nav_garant';
	ClassOperation();
	$($Sect).stop().animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//Љонпка ’ЋЏ
$('#nav_top').click(function(){
	$Sect = '#Section5';
	$id = '#nav_top';
	ClassOperation();
	$($Sect).stop().animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//Љнопка ‹€—Ќ›‰ ЉЂЃ€Ќ…’
$('#nav_account').click(function(){
	$Sect = '#Section6';
	$id = '#nav_account';
	ClassOperation();
	$($Sect).stop().animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//Љнопка ‹€—Ќ›‰ ЉЂЃ€Ќ…’ ‘ €ЉЋЌЉ€ ‹Љ
$('#UserIcon').click(function(){
	$Sect = '#Section6';
	$id = '#UserIcon';
	ClassOperation();
	$($Sect).stop().animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//Љнопка Џђ€Ќџ’њ “—Ђ‘’€…
$('#ByuTicket').click(function(){
	$Sect = '#Section7';
	$id = '#ByuTicket';
	ClassOperation();
	$($Sect).stop().animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//‘ылка логотипа
$('#logo_index').click(function(){
	$Sect = '#Section1';
	$id = '#logo_index';
	ClassOperation();
	$($Sect).stop().animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
		
		
		
		
		
		
		
		
		

});	

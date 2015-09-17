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
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

});	

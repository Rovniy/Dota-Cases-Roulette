//---------------------------------------------------��������� ���� ---------------------------------------
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
//������������� ������ ����� � ����
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
		
		
//--------------------------------------------------------------�������� ��������� ��� ������������� ���������
		
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
		
		
		
//-------------------------------------------------------------- ������� �������� -------------------------------------
$GoToWidth = (($(window).width()-1000)/2)+15; //������ ������ ������ � ��������� ������
$timeout = 300; //�������� ��������
function ClassOperation() {
	$('.current').animate({left: "-2000"}, $timeout);
	$('.current').removeClass('current');
	$('.active').removeClass('active');
	var audio = new Audio(); // ������� ����� ������� Audio
	audio.src = 'sounds/menu.ogg'; // ��������� ���� � ����� "�����"
	audio.autoplay = true; // ������������� ���������
};
//������ �������
$('#nav_index').click(function(){
	$Sect = '#Section1';
	$id = '#nav_index';
	ClassOperation();
	$($Sect).animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//������ ������
$('#nav_help').click(function(){
	$Sect = '#Section2';
	$id = '#nav_help';
	ClassOperation();
	$($Sect).animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//������ ����������
$('#nav_instructions').click(function(){
	$Sect = '#Section3';
	$id = '#nav_instructions';
	ClassOperation();
	$($Sect).animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//������ ��������
$('#nav_garant').click(function(){
	$Sect = '#Section4';
	$id = '#nav_garant';
	ClassOperation();
	$($Sect).animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//������ ���
$('#nav_top').click(function(){
	$Sect = '#Section5';
	$id = '#nav_top';
	ClassOperation();
	$($Sect).animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//������ ������ �������
$('#nav_account').click(function(){
	$Sect = '#Section6';
	$id = '#nav_account';
	ClassOperation();
	$($Sect).animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//������ ������ ������� � ������ ��
$('#UserIcon').click(function(){
	$Sect = '#Section6';
	$id = '#UserIcon';
	ClassOperation();
	$($Sect).animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//������ ������� �������
$('#ByuTicket').click(function(){
	$Sect = '#Section7';
	$id = '#ByuTicket';
	ClassOperation();
	$($Sect).animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
//����� ��������
$('#logo_index').click(function(){
	$Sect = '#Section1';
	$id = '#logo_index';
	ClassOperation();
	$($Sect).animate({left:$GoToWidth}, $timeout)
	setTimeout("$($Sect).removeClass('none'),$($Sect).addClass('current'),$($id).addClass('active')",$timeout);
});
		
		
		
		
		
		
		
		

});	

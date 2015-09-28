//---------------------------------------------------Обраотчик форм ---------------------------------------
$(document).ready(function ($) {
//Включение и отключение фоновой музыки на сайте --------------------------------------------------------------------		
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
			
//Позиции, перемещение и смена секций страниц сайта --------------------------------------------------------------------		
	$GoToWidth = (($(window).width()-1000)/2)+15; //ђасчет ширины экрана и положениЯ блоков
	$timeout = 200; //Animation duration
	function ClassOperation() {
		$('.current').stop().animate({left: "-2000"}, $timeout);
		$('.current').removeClass('current');
		$('.active').removeClass('active');
		var audio = new Audio(); // Create new element 'audio'
		audio.src = 'sounds/menu.ogg'; // Give path to sound
		audio.autoplay = true; // Autostart
	};
	//Button index
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
	$('#HelpButton').click(function(){
		$Sect = '#Section2';
		$id = '#nav_help';
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
		
//Проверка отправки сообщения чата. Т.е. нажатие кнопки Enter; --------------------------------------------------------------------		
		$("#pac_form").submit(Send); 
		$("#pac_text").focus();
		setInterval("Load();", 2000);	
			
});		
//Функция покупки карты участия в розыгрыше --------------------------------------------------------------------		
function BuyCard(typecard){
   $.ajax({
		url: "./sys/buycard.php",
		data: "typecard="+typecard,
		type     : 'GET',
        dataType : 'json',
        success  : function(data)
        {
				$.noty.closeAll();
                if(data && data['status'] == true)
				var n = noty({timeout: '2000',theme: 'successnoty',layout: 'center',text: 'СПАСИБО ЗА ПОКУПКУ<br/>ДОЖДИТЕСЬ РОЗЫГРЫША'});
			
				if(data && data['status'] == false)
                var n = noty({timeout: '2000',theme: 'warningnoty',layout: 'center',text: 'У ВАС НЕДОСТАТОЧНО СРЕДСТВ<br/>ПОПОЛНИТЕ БАЛАНС'});
        }
	})
};
//Функция сохранения ссылки на обмен --------------------------------------------------------------------		
function SaveUrl(){
	$link = $('.TradeLinkArea').val();
	console.log($link);
    $.ajax({
		url: "./sys/saveurl.php",
		data: "save="+$link,
		type     : 'GET',
        dataType : 'json',
        success  : function(data)
        {
			$.noty.closeAll();
                if(data && data['status'] == true)
				var n = noty({timeout: '2000',theme: 'successnoty',layout: 'center',text: 'ВАША ССЫЛКА СОХРАНЕНА'});
			
				if(data && data['status'] == false)
                var n = noty({timeout: '2000',theme: 'warningnoty',layout: 'center',text: 'ВОЗНИКЛИ ПРОБЛЕМЫ<br/>СВЯЖИТЕСЬ С АДМИНОМ'});
        }
	})
};
//Релизация чата для сайта --------------------------------------------------------------------		
function Send() {
	if ($("#pac_text").val().trim() == "") {
		chat.append("<span><strong><red>Сначала введите сообщение!</red></strong></span>");
		$("#pac_text").val('');
		return false;	
	} else {
			$.post("./sys/ajax.php",  
			{
				act: "send",  
				name: $("#pac_name").val().trim(),
				text: $("#pac_text").val().trim()
			}, Load );
			
			$("#pac_text").val("");
			$("#pac_text").focus();
			
			return false;
	}
}

var last_message_id = 0; 
var load_in_process = false;

function Load() {
    if(!load_in_process)
    {
	    load_in_process = true;
    	$.post("./sys/ajax.php",
    	{
      	    act: "load", 
      	    last: last_message_id,
      	    rand: (new Date()).getTime()
    	},
   	    function (result) {
		    $(".chat").scrollTop($(".chat").get(0).scrollHeight);
		    load_in_process = false;
    	});
    }
}
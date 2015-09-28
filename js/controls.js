//---------------------------------------------------Обраотчик форм ---------------------------------------
$(document).ready(function ($) {
//Remove volume
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
		

		
//-------------------------------------------------------------- SECTIONS POSITIONS -------------------------------------
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
	
		
	$("#pac_form").submit(Send); // вешаем на форму с именем и сообщением событие которое срабатывает кодга нажата кнопка "Отправить" или "Enter"
    $("#pac_text").focus(); // по поле ввода сообщения ставим фокус
    setInterval("Load();", 2000); // создаём таймер который будет вызывать загрузку сообщений каждые 2 секунды (2000 милесукунд)	
		
});		



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
//************************************************************** CHAT **********************************/

// Функция для отправки сообщения
function Send() {
	if ($("#pac_text").val() == "" || $("#pac_text").val() == " ") {
		chat.append("<span><strong><red>Сначала введите сообщение!</red></strong></span>")
		return false; // очень важно из Send() вернуть false. Если этого не сделать то произойдёт отправка нашей формы, те страница перезагрузится	
	} else {
		// Выполняем запрос к серверу с помощью jquery ajax: $.post(адрес, {параметры запроса}, функция которая вызывается по завершению запроса)
		$.post("ajax.php",  
		{
			act: "send",  // указываем скрипту, что мы отправляем новое сообщение и его нужно записать
			name: $("#pac_name").val(), // имя пользователя
			text: $("#pac_text").val() //  сам текст сообщения
		},
		 Load ); // по завершению отправки вызвовем функцию загрузки новых сообщений Load()

		$("#pac_text").val(""); // очистим поле ввода сообщения
		$("#pac_text").focus(); // и поставим на него фокус
		
		return false; // очень важно из Send() вернуть false. Если этого не сделать то произойдёт отправка нашей формы, те страница перезагрузится
	}
}

var last_message_id = 0; // номер последнего сообщения, что получил пользователь
var load_in_process = false; // можем ли мы выполнять сейчас загрузку сообщений. Сначала стоит false, что значит - да, можем

// Функция для загрузки сообщений
function Load() {
    // Проверяем можем ли мы загружать сообщения. Это сделанно для того, что бы мы не начали загрузку заново, если старая загрузка ещё не закончилась.
    if(!load_in_process)
    {
	    load_in_process = true; // загрузка началась
	    // отсылаем запрос серверу, который вернёт нам javascript
    	$.post("ajax.php", 
    	{
      	    act: "load", // указываем на то что это загрузка сообщений
      	    last: last_message_id, // передаём номер последнего сообщения который получил пользователь в прошлую загрузку
      	    rand: (new Date()).getTime()
    	},
   	    function (result) {		// в эту функцию в качестве параметра передаётся javascript код, который мы должны выполнит
		    $(".chat").scrollTop($(".chat").get(0).scrollHeight); // прокручиваем сообщения вниз
		    load_in_process = false; // говорим что загрузка закончилась, можем теперь начать новую загрузку
    	});
    }
}
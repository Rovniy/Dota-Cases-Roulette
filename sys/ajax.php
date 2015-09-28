<?php
include 'api.php';
if( !mysql_select_db($BdName) )
{
	exit();
}

Header("Cache-Control: no-cache, must-revalidate"); 
Header("Pragma: no-cache");
Header("Content-Type: text/javascript; charset=utf-8");


if( isset($_POST['act']) ) 
{
	switch ($_POST['act'])
	{
		case "send" :
			Send();
			break;
		case "load" :
			Load();
			break;
		default :
			exit();
	}
}

// Функция выполняем сохранение сообщения в базе данных
function Send()
{
	$name = substr($_POST['name'], 0, 200);
	$name = htmlspecialchars($name);
	$name = mysql_escape_string($name);
	
	$text = substr($_POST['text'], 0, 200); 
	$text = htmlspecialchars($text); 
	$text = mysql_escape_string($text);
	
	mysql_query("INSERT INTO messages (name,text) VALUES ('" . $name . "', '" . $text . "')");
}

// функция выполняем загрузку сообщений из базы данных и отправку их пользователю через ajax виде java-скрипта
function Load()
{
	$last_message_id = intval($_POST['last']);
	$query = mysql_query("SELECT * FROM messages WHERE ( id > $last_message_id ) ORDER BY id DESC LIMIT 10");
	
	if( mysql_num_rows($query) > 0 )
	{
		$js = 'var chat = $("#chat_area");'; 
		$messages = array();
		while ( $row = mysql_fetch_array($query) )
		{
			$messages[] = $row;
		}

		$last_message_id = $messages[0]['id'];
		$messages = array_reverse($messages);	

		foreach ( $messages as $value )
		{
			$js .= 'chat.append("<span><strong>[' . $value['name'] . ']</strong>: ' . $value['text'] . '</span>");';
		}
		$js .= "last_message_id = $last_message_id;";
		echo $js;
	}
}
?>
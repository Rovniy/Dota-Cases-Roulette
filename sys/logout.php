<?php
include 'api.php';
//Уничтожение сессии	
session_destroy();
$_SESSION = array();
//Выход на стартовую страницу сайта
header('Location: '.$MainUrl);
exit;
?>
<?php
include 'api.php';
$link = "http://unitpay.ru/pay/12345?sum=".$_GET['sum']."&account=".$_SESSION['steamid']."&desc=description";
header ('Location: '.$link);
exit;
?>
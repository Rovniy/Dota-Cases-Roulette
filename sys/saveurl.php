<?php
include 'api.php';
$UserLink = $_GET['save'];
$data = array();
$UserLinkSql = "UPDATE account SET linkid='$UserLink' WHERE steamid=123456";
if (mysql_query($UserLinkSql)) {
	
	
$data['status'] = true; 
		echo json_encode($data);
} else {
	
	$data['status'] = false; 
		echo json_encode($data);
}
?>
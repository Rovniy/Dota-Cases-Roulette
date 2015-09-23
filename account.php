<?php 
//Подключение шапки сайта
include 'header.php';
	if (isset ($player)) 
{
			echo "
                    <br/>Player ID: $player->steamid
                    <br/>Player Name: $player->personaname
                    <br/>Profile URL: $player->profileurl
                    <br/>SmallAvatar: <img src='$player->avatar'/> 
                    <br/>MediumAvatar: <img src='$player->avatarmedium'/> 
                    <br/>LargeAvatar: <img src='$player->avatarfull'/> 
                    ";
}
	else 
			echo "<br><br><br><center><a>данных нет</a></center>";
?>
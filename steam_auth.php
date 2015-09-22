<?php
include "lightopenid/openid.php";
$_STEAMAPI = "3D8E21896DB601C791CCCB63A549C8DE";
try 
{
    $openid = new LightOpenID('http://xn--b1aolcj3e.xn--p1ai/');
    if(!$openid->mode) 
    {
        if(isset($_GET['login'])) 
        {
            $openid->identity = 'http://steamcommunity.com/openid/?l=english'; 
            header('Location: ' . $openid->authUrl());
        }
?>
<!--<form action="?login" method="post">
    <input type="image" src="http://cdn.steamcommunity.com/public/images/signinthroughsteam/sits_small.png">
</form>-->
<?php
    } 
    elseif($openid->mode == 'cancel') 
    {
        echo 'User has canceled authentication!';
    } 
    else 
    {
        if($openid->validate()) 
        {
                $id = $openid->identity;
                // identity is something like: http://steamcommunity.com/openid/id/76561197960435530
                // we only care about the unique account ID at the end of the URL.
                $ptn = "/^http:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
                preg_match($ptn, $id, $matches);
                echo "User is logged in (steamID: $matches[1])\n";
 
                $url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$_STEAMAPI&steamids=$matches[1]";
                $json_object= file_get_contents($url);
                $json_decoded = json_decode($json_object);
 
                foreach ($json_decoded->response->players as $player)
                {
                     /* echo "
					 <br>
					 <br>
					 <br>
                    <br/>Player ID: $player->steamid
                    <br/>Player Name: $player->personaname
                    <br/>Profile URL: $player->profileurl
                    <br/>SmallAvatar: <img src='$player->avatar'/> 
                    <br/>MediumAvatar: <img src='$player->avatarmedium'/> 
                    <br/>LargeAvatar: <img src='$player->avatarfull'/> 
                    ";  */
                }
 
        } 
        else 
        {
                echo "User is not logged in.\n";
        }
		
		$_SESSION['steamid'] = $player->steamid;
		$_SESSION['personaname'] = $player->personaname;
		$_SESSION['profileurl'] = $player->profileurl;
		$_SESSION['avatar'] = $player->avatar;
		$_SESSION['avatarfull'] = $player->avatarfull;
    }
} 
catch(ErrorException $e) 
{
    echo $e->getMessage();
}
?>
<?php
$ip_address = $_SERVER['REMOTE_ADDR'];
$using="REMOTE_ADDR";
$ownIP = file_get_contents("http://ipecho.net/plain"); 
echo $ip_address,' ',$ownIP,' ',$using;
echo '<br>';
echo $_POST['user'],' ',$_POST['pass'];
//$_SESSION['test']='test';

//setcookie("TestCookie", 1, time() + 3600);
//curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//header("Location: http://$ip_address/info.php");

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, "http://$ip_address/multichain-web-demo/test.php");
curl_setopt($ch,CURLOPT_POST, 1);
//multichaind chain2@172.31.83.106:9547
curl_setopt($ch,CURLOPT_POSTFIELDS,'result=true');
curl_exec($ch);
curl_close($ch);

//echo "something";
?>

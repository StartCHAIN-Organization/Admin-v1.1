<?php
$IP=file_get_contents("http://ipecho.net/plain");
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, "http://$IP/multichain-web-demo/login.php");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_exec($ch);
curl_close($ch);
//echo $_POST['data'];
//$output=shell_exec($_POST['data']);
//echo $output;
//echo "somethin2g";
?>

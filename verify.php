<?php
$access_token = 'u4tkJt4cfqqaudtD6OiZWxStQa+I6AwQSb2yEEx8sEs4153Uh3sq8ALf3ACUasAAE1zTebWrKwZbl31Z6PgOKBa2W2JWuht1Olo7pm5IP6r7koAm4ttgCLt3rYqLomzA5PDe3DuxdgU0o2oHB2//pAdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

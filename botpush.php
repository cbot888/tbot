<?php



require "vendor/autoload.php";

$access_token = 'u4tkJt4cfqqaudtD6OiZWxStQa+I6AwQSb2yEEx8sEs4153Uh3sq8ALf3ACUasAAE1zTebWrKwZbl31Z6PgOKBa2W2JWuht1Olo7pm5IP6r7koAm4ttgCLt3rYqLomzA5PDe3DuxdgU0o2oHB2//pAdB04t89/1O/w1cDnyilFU=';

$channelSecret = '0dfe6e5291e93f8c6ea412d21fec3d77';

$pushID = 'C1ed983e99bdb2bcfa16c731d1e6bc862';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('botpush.php');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();








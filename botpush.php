<?php
require "vendor/autoload.php";
$access_token = 'u4tkJt4cfqqaudtD6OiZWxStQa+I6AwQSb2yEEx8sEs4153Uh3sq8ALf3ACUasAAE1zTebWrKwZbl31Z6PgOKBa2W2JWuht1Olo7pm5IP6r7koAm4ttgCLt3rYqLomzA5PDe3DuxdgU0o2oHB2//pAdB04t89/1O/w1cDnyilFU=';
$channelSecret = '0dfe6e5291e93f8c6ea412d21fec3d77';

$pushID = 'C1ed983e99bdb2bcfa16c731d1e6bc862';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$yeke_no=0;
if(date('H')>=6)
  $yeke_no = 4*(date('H')-6)+floor(date('i')/15)+1;
else
  $yeke_no = 4*(date('H')+18)+floor(date('i')/15)+1;
$str = 'ผลยี่กี '.DateThai(date('Y/m/d')).PHP_EOL.' JET  รอบที่ '.$yeke_no.' = xxx-xx'.PHP_EOL.' JET VIP รอบที่ '.$yeke_no.'= xxx-xx'

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($str);
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

function DateThai($strDate)
{
    $strYear = (date("Y",strtotime($strDate))+543)%100;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));

    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}






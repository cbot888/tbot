<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'Pn0W5z/4NvI9AI22R/RPnZN3kSyX/M5u/UgvGZVe7MZDFNel1k2Nu1AEbsD8eYrbL/r8ZuMAdn+ea/5frWh5RN+U3NsZh5T3RhnYJjOHL5UkIcp6mQx+2GLMaC3l13Mct3vPNmePlIqy/2PI25vHAwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
//รับข้อความจากผู้ใช้
$msg_input = $events['events'][0]['message']['text'];

// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			if(preg_replace('/[[:space:]]+/', '',trim($msg_input)) == '[bot=groupid]')
			{
				$text = $event['source']['groupId'];
				echo $text;
			}
			//else if($msg_input == 'grpreport')
				
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text,
				//'imageThumbnail' => "",
            			//'imageFullsize' => '',
				'stickerPackageId' => 1,
            			'stickerId' => 410
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "999\r\n";
		}
	}
}
echo "OK";

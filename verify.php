<?php
$access_token = 'Pn0W5z/4NvI9AI22R/RPnZN3kSyX/M5u/UgvGZVe7MZDFNel1k2Nu1AEbsD8eYrbL/r8ZuMAdn+ea/5frWh5RN+U3NsZh5T3RhnYJjOHL5UkIcp6mQx+2GLMaC3l13Mct3vPNmePlIqy/2PI25vHAwdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

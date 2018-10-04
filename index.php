<?php
include_once('simple_html_dom.php');
$url = 'https://www.jetsadabet.com/login';
 
$html = file_get_html($url);
echo $html;
echo "Hello LINE BOT...";

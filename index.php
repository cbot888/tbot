<?php
require "simple_html_dom.php';
$url = 'https://www.jetsadabet.com/login';
 
$html = file_get_html($url);
echo $html;
$links = array();
foreach($html->find('a[class="postlink"]') as $a) {
 $links[] = $a->href;
}

echo $links;
echo "Hello LINE BOT...";

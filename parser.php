<?php
$html = file_get_contents('http://ocsmash.weebly.com/the-ladder-current.html');
$dom = new DOMDocument;
$dom->loadHTML($html);

//font color= 00FFCC
$items = $dom->getElementsByTagName('center');
$players =array();

for ($i = 6; $i < $items->length; $i = 4 + $i){
	$name = (string)$items->item($i)->nodeValue;
	$players[$name] = $items->item($i + 1)->nodeValue;
}
var_dump($players);

?>
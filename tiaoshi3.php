<?php
function getInfo($url){
	$guan=curl_init();
	curl_setopt($guan,CURLOPT_URL,$url);
	curl_setopt($guan,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($guan,CURLOPT_HEADER,0);
	$output=curl_exec($guan);
	curl_close($guan);
	return $output;
}
$yun=array(
	'name'=>'guan',
	 'age'=>'19',
	  'home'=>'jiangxi',
	    'shcool'=> 'ccnu');
$feng=json_encode($yun);
echo $feng;
echo'<br>';
$url="http://www.ccnu.edu.cn/";
$json=getInfo($url);
$oj=json_decode($json);
include "simple/simple_html_dom.php";
$html=str_get_html($json);

foreach ($html->find("a") as $e) 
		echo  $e->plaintext.":". $e->href.'<br>';
		echo $e->href.'<br>';
foreach ($html->find('img') as $e) 
		echo $e->scr.'<br>';
foreach($html->find('img') as $e)
		echo $e->outertext.'<br>';
foreach($html->find('div#section') as $e)
		echo $e->innertext.'<br>';
foreach($html->find('span.section') as $e)
		echo $e->outertext.'<br>';


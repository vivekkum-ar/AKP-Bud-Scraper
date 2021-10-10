<?php
//penman: Vivek

include('simple_html_dom.php');//include_once was used
$html = file_get_html('files/resultspage.html');
$html2 = $html->find('a.jd_download_url');
$title[] = array();
$linktext[] = array();                 
$f[] =array();
for ($i = 0; $i < sizeof($html2); $i++) {                                                                  //1st type of code
	$f[$i] = array_merge(array_combine(array('index'),@array($i + 1))
	,array_combine(array('title'),@array($html2[$i]->innertext))
	,array_combine(array('hrefLink'),@array("https://alkabir.in/index.php" . $html2[$i]->href)));
}
print_r(json_encode($f));
?>
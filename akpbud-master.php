<?php
// this can grab result,notification pages
include('simple_html_dom.php');
$html = file_get_html(htmlspecialchars($_GET["pageurl"]));
$html2 = $html->find('a.jd_download_url');
$title[] = array();
$linktext[] = array();                
$f[] =array();
for ($i = 0; $i < sizeof($html2); $i++) {
	$f[$i] = array_merge(array_combine(array('index'),@array($i + 1))
	,array_combine(array('title'),@array($html2[$i]->innertext))
	,array_combine(array('hrefLink'),@array("https://alkabir.in/index.php" . $html2[$i]->href)));
}
print_r(json_encode($f));
/*
*how to use ==== *phpfilelink*.php?pageurl=https://alkabir.in/index.php/facilities/downloads/category/3-notifications.html?start=60
*/
?>
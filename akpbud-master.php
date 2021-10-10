<?php
// this can grab result,notification pages
include('simple_html_dom.php');
$html = file_get_html(htmlspecialchars($_GET["pageurl"]));
$html2 = $html->find('a.jd_download_url');
$title[] = array();
$linktext[] = array();
for ($i = 0; $i < sizeof($html2); $i++) {
	$title[$i] = $html2[$i]->innertext;
	$linktext[$i] = "https://alkabir.in/index.php" . $html2[$i]->href;
}
echo json_encode(array_combine("title",$title),array_combine("HrefLink",$linktext));
/*
*how to use ==== *phpfilelink*.php?pageurl=https://alkabir.in/index.php/facilities/downloads/category/3-notifications.html?start=60

* returns JSON as
* [
*	{item1:itemHrefLink1}
*	,{item1:itemHrefLink1}
*	, ..................
* ]
*/
?>
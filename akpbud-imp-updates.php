
<?php
//this can grab important updates
include('simple_html_dom.php');
$html = file_get_html('http://alkabir.in/index.php/component/k2/itemlist/category/4-imp-updates-hp-right.html'); //htmlspecialchars($_GET["pageurl"])
$title[] = array();
$linktext[] = array();
$html2 = array();
$html2 = $html->find('h3.catItemTitle');
foreach($html2 as $html3)
{
	$html4 = $html3->find('a');
  foreach($html4 as $key => $value1)
    {
	$title[] = str_replace('   ', '',($value1->plaintext));
	$linktext[] = 'https://alkabir.in' . $value1->href;
	}
}
$title = array_filter($title);
$linktext = array_filter($linktext);

for($k=0;$k<=sizeof($title);$k++)
{
$f[$k]=array_merge(array_combine(array('index'),@array($k))
				  ,array_combine(array('title'),@array($title[$k]))
				  ,array_combine(array('link'),@array($linktext[$k]))
				  );
}
print_r(json_encode(array_slice($f,1)));
?>
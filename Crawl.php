
bhaiyon right now it works for some selected and popular countries  like india china etc... try!!!!!

<form action='crawl.php'>
Select Please: <br>
<select id="countries" name="cat">

<option value="India">India</option>
<option value="Iraq">Iraq</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kuwait">Kuwait</option>
<option value="Lebanon">Lebanon</option>
<option value="Egypt">Egypt</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Venezuela">Venezuela</option>

</select>
<br>
<input type=submit>
</form>
<table>

<?php
include "Crawler.php";
if(isset($_GET["cat"]))
{
$cat = $_GET["cat"];
$url = "http://www.kwintessential.co.uk/resources/global-etiquette/$cat-country-profile.html";
$html= file_get_contents($url);
$dom = new DOMDocument();
@$dom->loadHTML($html);
$xPath = new DOMXPath($dom);
$elements = $xPath->query("//strong");
$x=0;
foreach ($elements as $e) 
{
if($x > 8){
echo "<h2>".$e->nodeValue. "</h2><br />";
$z = $e->nextSibling->nextSibling->nextSibling;
echo $z->nodeValue. "<br />";
}
else
{
echo "<h2>".$e->nodeValue. "</h2><br />";
$z = $e->nextSibling;
echo $z->nodeValue. "<br />";
}
$x++;
if($x == 19)
{
break;
}
}
}
?>
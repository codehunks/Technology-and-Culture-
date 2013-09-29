<html>
<head>
<title>Tech N Culture</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
</head>
<body>
<div class ="container"><br />
<div id="form-details">
<form action='crawl.php'>
<span id = "select-option">Select Please:</span>
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
<input type="submit" class="btn btn-success">
</form>
</div>
<table class="table">

<?php
include "Crawler.php";
if(isset($_GET["cat"]))
{
$cat = $_GET["cat"];
echo "<legend id=\"legend\">About ".$cat."</legend>";
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
echo "<p id=\"data-info\"> ". $z->nodeValue. "</p><br />";
}
else
{
echo "<h2>".$e->nodeValue. "</h2><br />";
$z = $e->nextSibling;
echo "<p id=\"data-info\" >". $z->nodeValue. "</p><br />";
}
$x++;
if($x == 19)
{
break;
}
}
}
?>

</table>
<footer>
	<div class="footer-text">
	    <ul class="social-icons">

          <a href="http://facebook.com/tnc">Facebook</a>
          <a href="http://twitter.com/tnc">Twitter</a>
          <a href="http://github.com/codehunks/tnc">Github</a>
      </ul>
    <span id="copyright">(c) Codehunks 2013 Designed and coded by Codehunks Team.</span>
    </div>
</footer>

</div>
</body>
</html>

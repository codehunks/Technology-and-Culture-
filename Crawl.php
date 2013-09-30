<html>
<head>
<title>Technology N Culture</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
</head>
<body>
<div class ="container"><br />
<h1>xCulture</h1><br />
<!--<div id="form-details">
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
</div> -->

<?php

//echo "recieved country names : ";
//print_r(join(",",array_values($countries)));
?>

<table class="table">

<?php
include "Crawler.php";





/********************   Data recived from map *********************/

if(isset($_GET["data"]) and !empty($_GET["data"]))
{
$countries = explode('$',$_GET['data']);
$length = sizeof($countries);
}



/*********************  use this; edit from here **********************************/















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
<?php



?>
</br>
<div class="navbar navbar-fixed-bottom">
   <div class="container text-center">&copy. 2013 codehunks. All rights reserved</div>
</div>
</div>
</body>
</html>

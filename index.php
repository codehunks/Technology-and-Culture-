<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xculture</title>

  <link rel="stylesheet" href="./css/jquery-jvectormap-1.2.2.css" type="text/css" media="screen"/>
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">


  <script src="./js/jquery.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="./js/jquery-jvectormap-world-mill-en.js"></script>
  <script>
    $(function(){
      

      var countries = [];

      var palette = ['#66C2A5', '#FC8D62', '#8DA0CB', '#E78AC3', '#A6D854'];
      generateColors = function(){
        var colors = {},
            key;

        for (key in map.regions) {
          colors[key] = palette[Math.floor(Math.random()*palette.length)];
        }
        return colors;
      },
      map;

  map = new jvm.WorldMap({
    map: 'world_mill_en',
    container: $('#map'),
    regionsSelectable : true,
    onRegionSelected : function(e,code,isSelected){
      if(isSelected)
      {
        countries.push(code);
      }

      else{
        countries.splice(countries.indexOf(code),1);
      }

    },
    series: {
      regions: [{
        attribute: 'fill'
      }]
    }
  });
  map.series.regions[0].setValues(generateColors());
  
  $('#reg').click(function(e){

      e.preventDefault();
      if(countries.length == 0){
        alert('Please select some country');
      }
      else 

      {
        for (key in countries)
            {
              
              countries[key] = map.getRegionName(countries[key]);
            }
      
            var ccode = countries.join('$');
            window.location="index.php?data="+ccode;
      }
    });


    });

    

</script>

<script src="js/modernizr.custom.63321.js"></script>
<script>
var ray=
{
ajax:function(st)
    {
    this.show('load');
  },
show:function(el)
  {
    this.getID(el).style.display='';
  },
getID:function(el)
  {
    return document.getElementById(el);
  }
}
</script>

</head>
<body>
<div class="container">

<h1><p class="text-success" align="center">Welcome to xCulture</p></h1>
<p class="lead" align=center>Select countries and click culturize button</p>

<div id="load" class="demo-5" style="display:none;">
<div class="pre-loader"></div>
</div>

  <div id="map" style="width: 900px; height: 480px;margin-left:160px" ></div>
  </br>
 <div class="text-center" align="center"><button type="button" id="reg" class="btn btn-success" onclick="return ray.ajax()">Culturize</button></div>








<table class="table">

<?php
include "Crawler.php";
if(isset($_GET["data"]) and !empty($_GET["data"]))
{    
$countries = explode('$',$_GET['data']);
$length = sizeof($countries);
foreach ($countries as $z)
{
$cat = $z;
$flag = 0;
$count = array("India","China","Brazil","Venezuela","Kuwait","Russia","Egypt","Morocco","Cyprus","Denmark","Finland","France","Germany","Greece","Hungary","Norway","Mexico","Hongkong","Japan","Philippines","Austria","Bahrain","Belgium","Iran","Japan","Spain","Thiland","Tunisia","Turkey");
foreach( $count as $value )
{
  if ($value == $cat)
      $flag = 1;
}
$url = "http://www.kwintessential.co.uk/resources/global-etiquette/$cat-country-profile.html";
$url1 = "http://www.kwintessential.co.uk/resources/global-etiquette/$cat.html";
if($flag == 1)
    $html= @file_get_contents($url);
else
  $html= @file_get_contents($url1);  
if($html === FALSE) 
{
    echo "<legend id=\"legend\">No Data Found For ".$cat."</legend>";
}
else
{
   echo "<legend id=\"legend\">Culture About ".$cat."</legend>";
}
$dom = new DOMDocument();
@$dom->loadHTML($html);
$xPath = new DOMXPath($dom);
$elements = $xPath->query("//strong");
echo '<table id=table1 class="table"><tr>';
$x=0;
foreach ($elements as $e) 
{
if($x>0)
{
  if($e->nextSibling->nodeValue != '')
  {
  echo "<th><h2>".$e->nodeValue. "</h2></th>";
  $z = $e->nextSibling;
  echo "<td><p id=\"data-info\" >". $z->nodeValue. "</p></td></tr>";
  }
  else
  {
  echo "<th><h2>".$e->nodeValue. "</h2></th>";
  $z = $e->nextSibling->nextSibling->nextSibling;
  echo "<td><p id=\"data-info\"> ". $z->nodeValue. "</p></td></tr>";
  }
}
$x++;
if($x == 19)
    break;
echo '</table>';
}

}
}
?>

</table>
</br>
<div class="navbar navbar-static-bottom">
   <div class="container text-center">&copy. 2013 codehunks. All rights reserved</div>
</div>
</div>
</div>
</body>
</html>




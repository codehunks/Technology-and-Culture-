<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xculture</title>

  <link rel="stylesheet" href="./css/jquery-jvectormap-1.2.2.css" type="text/css" media="screen"/>
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  
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
            window.location="crawl.php?data="+ccode;
      }
    });


    });

    

  </script>
</head>
<body>
<div class="container">

<h1><p class="text-success">Welcome to xCulture</p></h1>
</br></br>
<p class="lead">Select countries and click culturize button</p>

  <div id="map" style="width: 900px; height: 500px"></div>
  </br>
 <div class="text-center"><button type="button" id="reg" class="btn btn-success">culturize</button></div>

</br></br></br>
<div class="navbar navbar-bottom-bottom">
   <div class="container text-center">&copy. 2013 codehunks. All rights reserved</div>
</div>

</div>
</body>
</html>
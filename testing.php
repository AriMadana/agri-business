<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <title>Get coordinates of the mouse pointer</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.50.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.50.0/mapbox-gl.css' rel='stylesheet' />
    <style>
        body { margin:0; padding:0; }
        #map { position:absolute; top:0; bottom:0; width:100%; }
    </style>
</head>
<body>

<style type='text/css'>
    #info {
        display: block;
        position: relative;
        margin: 0px auto;
        width: 50%;
        padding: 10px;
        border: none;
        border-radius: 3px;
        font-size: 12px;
        text-align: center;
        color: #222;
        background: #fff;
    }
</style>
<div id='map'></div>
<pre id='info'></pre>
<script>
  mapboxgl.accessToken = 'pk.eyJ1IjoiN2hlNHIxc2UiLCJhIjoiY2prcXpzdTV6MXpwMjN1czc2eG5uZjd6bSJ9.P4KTUArF5MU9eY-WrOCJdg';
  var map = new mapboxgl.Map({
      container: 'map', // container id
      style: 'mapbox://styles/mapbox/streets-v9',
      center: [-74.50, 40], // starting position
      zoom: 9 // starting zoom
  });

  map.on('mousemove', function (e) {
      document.getElementById('info').innerHTML =
          // e.point is the x, y coordinates of the mousemove event relative
          // to the top-left corner of the map
          JSON.stringify(e.point) + '<br />' +
          // e.lngLat is the longitude, latitude geographical position of the event
          JSON.stringify(e.lngLat);
  });
</script>

</body>
</html>

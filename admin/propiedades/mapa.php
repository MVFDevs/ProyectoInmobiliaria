<?php
$mapa = htmlentities($_GET['mapa']);
$address = urlencode($mapa);
$url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=".$address;
$response = file_get_contents($url);
$json = json_decode($response,true);
$lat = $json['results'][0]['geometry']['location']['lat'];
$lng = $json['results'][0]['geometry']['location']['lng'];
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <style media="screen">
        html,body{
          height: 100%;
          margin:0;
          padding: 0;
        }
        #map{
          height: 100%;
        }
     </style>
   </head>
   <body>     
     <div id="map"></div>
     <script>
       function initMap() {
         var uluru = {lat: <?php echo $lat?>, lng: <?php echo $lng?>};
         var map = new google.maps.Map(document.getElementById('map'), {
           zoom: 18,
           center: uluru
         });
         var marker = new google.maps.Marker({
           position: uluru,
           map: map
         });
       }
     </script>
     <script async defer
     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDalb_AxT2sktHvR5k-RyWp89nMmYmZYJs&callback=initMap">
     </script>
   </body>
 </html>

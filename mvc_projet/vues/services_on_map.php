<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//FR"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="fr">

<head>
  <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>Mon ptit index</title>

  <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 90%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
</head>

<script src="../../bootstrap/js/jquery.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
</script>

<body align="center" text-align="center">
  <?php
    include_once ("navbar.php"); 
  ?>

  <?php

  echo '<div id="map"></div>
    <script>

      function initMap() {';
        echo 'var locations = [';
        for($i = 0; $i <= count($_SESSION['row']); $i++ ){
          $srvc = $_SESSION['row'][$i];
          if($i < count($_SESSION['row']))
            echo '["'.utf8_encode($srvc["service_title"]).'",'.$srvc["user_address_latitude"].','.$srvc["user_address_longitude"].','.$i.'],';
          else 
            echo '["Ma maison",'.$_SESSION["user_adrLat"].','.$_SESSION["user_adrLng"].','.$i.']';
        }
        echo '];';

        echo 'var pos = new google.maps.LatLng('.$_SESSION["user_adrLat"].','.$_SESSION["user_adrLng"].');';
        echo 'var map = new google.maps.Map(document.getElementById("map"), {
          zoom: 12,
          center: new google.maps.LatLng('.$_SESSION["user_adrLat"].','.$_SESSION["user_adrLng"].')
        });';

        echo 'var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < locations.length; i++) {  
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
          });

          google.maps.event.addListener(marker, "click", (function(marker, i) {
            return function() {
              infowindow.setContent(locations[i][0]);
              infowindow.open(map, marker);
            }
          })(marker, i));
        }';

      echo '}</script>
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNfIpY1HskI6EdkVAMVwb9QwULRc-VPUk&callback=initMap"></script>';
    ?>
</body>
</html>

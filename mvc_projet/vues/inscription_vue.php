<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//FR"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="fr">

<head>
  <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>Mon ptit index</title>
</head>

<script src="../../bootstrap/js/jquery.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
</script>

<body text-align="center">
  <?php
    include_once ("navbar.php"); 
  ?>

  <?php
  if (isset($_GET["empty_fields"])){
    $message='Remplissez tous les champs svp';
    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
  }
  ?>

  <div align="center" style="margin-top: 10%">
    <h1 align="center">Inscription</h1><br>
    <form method="post" action="../controleurs/inscription_controleur.php">
		<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" style="width:50%; height:15%; text-align:center; font-size:20pt;">
    <br><br>
    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" style="width:50%; height:15%; text-align:center; font-size:20pt;">
    <br><br>


    <!-- Champ pour l'adresse avec auto completion -->
    <input id="pac-input"  name="address" class="form-control" type="text" placeholder="Entrez votre adresse (ça reste entre nous)" style="width:50%; height:15%; text-align:center; font-size:20pt;">
    <div id="map"></div>
    <script>
      function initMap() {
        var cityBounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(44.783621,-0.566061),
            new google.maps.LatLng(44.822751, -0.537646)
        );

        var input = document.getElementById('pac-input');
        var options = {
          bounds: cityBounds,
          types: ['geocode'],
          componentRestrictions: {country: "fr"}
        };
        var autocomplete = new google.maps.places.Autocomplete(input, options);
        autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
          if (!place.geometry) {
            window.alert("Cette adresse est fausse, arretez de tricher svp : '" + place.name + "'");
            return;
          }
          window.alert("latitude " + place.geometry.location.lat() + " longittude : " + place.geometry.location.lng());
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNfIpY1HskI6EdkVAMVwb9QwULRc-VPUk&libraries=places&callback=initMap"async defer></script>



    <br><br>
    <input type="text" class="form-control" id="email" name="email" placeholder="xyz.example@mail.com" style="width:50%; height:15%; text-align:center; font-size:20pt;">
    <br><br>
    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Allias" style="width:50%; height:15%; text-align:center; font-size:20pt;">
    <br><br>
    <input type="hidden" id="type" name="type" value="confirmation">
    <!--<input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" style="width:20%; height:15%; text-align:center; font-size:20pt;">
    <br><br>!-->
    <input type="submit" value="Valider" class="btn btn-success" style="font-size: 35px ! important; width: 50%; height: 100px;">
    </form>
  </div>

</body>
</html>

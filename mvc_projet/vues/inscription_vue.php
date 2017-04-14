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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNfIpY1HskI6EdkVAMVwb9QwULRc-VPUk&libraries=places&callback=initMap"async defer></script>


<script type="text/javascript">
</script>

<body align="center" text-align="center">
  <?php
    include_once ("navbar.php"); 
  ?>

  <?php
    if (isset($_GET["missing"])){
      $message = "Le champ ".$_GET["missing"]." est incomplet !";
      echo '<div style="font-size:20pt;text-align: center;" class="alert alert-danger">
        <strong>ERREUR !</strong> '.$message.'</div>';
    }else if(isset($_GET["successfulSignin"]))
      echo '<div style="font-size:20pt;text-align: center;" class="alert alert-success">
        <strong>BRAVO ! </strong>Un mail a été envoyé sur votre adresse mail, regardez vos mails et cliquez sur le lien pour pouvoir finaliser l\'inscription.</div>';

        else if (isset($_GET["notUnique"])){
      $message = 'Il existe déjà quelqu\'un qui a choisi ce pseudo.';
      echo '<div style="font-size:20pt;text-align: center;" class="alert alert-danger">
        <strong>ERROR!</strong> '.$message.'
      </div>';
    }
  ?>

  <div align="center">
    <h1 align="center">Inscription</h1><br>
    <form method="post" action="../controleurs/inscription_controleur.php">
		<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" style="width:50%; height:15%; text-align:center; font-size:20pt;">
    <br><br>
    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" style="width:50%; height:15%; text-align:center; font-size:20pt;">
    <br><br>
    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Allias" style="width:50%; height:15%; text-align:center; font-size:20pt;">
    <br><br>
    <input type="text" class="form-control" id="email" name="email" placeholder="Adresse mail" style="width:50%; height:15%; text-align:center; font-size:20pt;">
    <br><br>


    <!-- Champ pour l'adresse avec auto completion -->
    <input id="adresse"  name="adresse" class="form-control" type="text" placeholder="Adresse postale (ça reste entre nous promis)" style="width:50%; height:15%; text-align:center; font-size:20pt;">
    <div id="map"></div>
    <script>
      function initMap() {
        var cityBounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(44.783621,-0.566061),
            new google.maps.LatLng(44.822751, -0.537646)
        );

        var input = document.getElementById('adresse');
        var options = {
          bounds: cityBounds,
          types: ['geocode'],
          componentRestrictions: {country: "fr"}
        };
        var autocomplete = new google.maps.places.Autocomplete(input, options);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          document.getElementById('inputLat').value = place.geometry ? place.geometry.location.lat() : "";
          document.getElementById('inputLng').value = place.geometry ? place.geometry.location.lng() : "";
        });
      }
    </script>
    
    <input id="inputLat" name="adresseLatitude" type="hidden" value="">
    <input id="inputLng" name="adresseLongitude" type="hidden" value="">
    <input type="hidden" id="type" name="type" value="confirmation">
    <br><br>
    
    
    <!--<input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" style="width:20%; height:15%; text-align:center; font-size:20pt;">
    <br><br>!-->
    <input type="submit" value="Valider" class="btn btn-success" style="font-size: 35px ! important; width: 50%; height: 100px;">
    <br><br>
    </form>
  </div>

  <?php

    echo "<script type=\"text/javascript\">
            document.getElementById('nom').value = '".(isset($_GET["nom"]) ? $_GET["nom"] : "")."';
            document.getElementById('prenom').value = '".(isset($_GET["prenom"]) ? $_GET["prenom"] : "")."';
            document.getElementById('pseudo').value = '".(isset($_GET["pseudo"]) ? $_GET["pseudo"] : "")."';
            document.getElementById('email').value = '".(isset($_GET["email"]) ? $_GET["email"] : "")."';
            document.getElementById('adresse').value = '".(isset($_GET["adresse"]) ? $_GET["adresse"] : "")."';
            document.getElementById('inputLat').value = '".(isset($_GET["latitude"]) ? $_GET["latitude"] : "")."';
            document.getElementById('inputLng').value = '".(isset($_GET["longitude"]) ? $_GET["longitude"] : "")."';
          </script>
        ";
  ?>

</body>
</html>

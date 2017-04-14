<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//FR"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="fr">

<head>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>Mon ptit index</title>
</head>

<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNfIpY1HskI6EdkVAMVwb9QwULRc-VPUk&libraries=places&callback=initMap"async defer></script>

<script type="text/javascript"> 
</script>

<body align="center" text-align="center">
  
  <?php 
    include_once ("navbar.php"); 
    if(isset($_GET["successful"]))
      echo '<div style="font-size:20pt;text-align: center;" class="alert alert-success">
        Vos données ont été modifiées.</div>'; 
    else if(isset($_GET["notUnique"]))
      echo '<div style="font-size:20pt;text-align: center;" class="alert alert-danger">
        Vous essayer de copier quelqu\'un Monsieur</div>';
  ?>

  <h1 style="margin:2%">Vos informations</h1><br>

  <div align="center">

  <?php

      $usr = $_SESSION['row'][0];
      echo '<form action="../controleurs/update_user_profil_controleur.php" method="post">';

      if($_SESSION['user_isModerator'])
        echo '<h2 style="color:red;">Vous avez les privilèges d\'un modérateur</h2><br>';

      echo '<div class="form-group">
          <label style="font-size:15pt;" for="nom">Nom</label>
          <input style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" name="lastname" class="form-control" id="nom" value="'.$usr["user_lastname"].'">
      </div><br>

      <div class="form-group">
          <label style="font-size:15pt;" for="prenom">Prénom</label>
          <input style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" name="firstname" class="form-control" id="prenom" value="'.$usr["user_firstname"].'">
      </div><br>

      <div class="form-group">
          <label style="font-size:15pt;" for="pseudo">Pseudo</label>
          <input style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" name="nickname" class="form-control" id="pseudo" value="'.$usr["user_nickname"].'">
      </div><br>

      <div class="form-group">
          <label style="font-size:15pt;" for="mail">Adresse email</label>
          <input style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" name="email" class="form-control" id="mail" value="'.$usr["user_email"].'">
      </div><br>

      <div class="form-group">
          <label style="font-size:15pt;" for="adresse">Adresse postale</label>
          <input id="adresse" style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" name="adresse" class="form-control" id="mail" value="'.utf8_encode($usr["user_address"]).'">
      </div><br>';




      echo '<script>
        function initMap() {
          var cityBounds = new google.maps.LatLngBounds(
              new google.maps.LatLng(44.783621,-0.566061),
              new google.maps.LatLng(44.822751, -0.537646)
          );

          var input = document.getElementById("adresse");
          var options = {
            bounds: cityBounds,
            types: ["geocode"],
            componentRestrictions: {country: "fr"}
          };
          var autocomplete = new google.maps.places.Autocomplete(input, options);
          autocomplete.addListener("place_changed", function() {
            var place = autocomplete.getPlace();
            document.getElementById("inputLat").value = place.geometry ? place.geometry.location.lat() : "";
            document.getElementById("inputLng").value = place.geometry ? place.geometry.location.lng() : "";
          });
        }
      </script>';


      echo '<div class="form-group">
          <label style="font-size:15pt;" for="mdp">Mot de passe</label>
          <input style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" name="password" class="form-control" id="mdp" value="'.$usr["user_password"].'">
      </div><br>

      <div>
      <input type="submit" value="Valider" class="btn btn-success" style="font-size: 35px ! important; width: 200px; height: 75px; margin: 10px;">
      <button type="button" onclick="document.location.href=\'index.php\'" class="btn btn-default" style="font-size: 35px ! important; width: 200px; height: 75px; margin: 10px;">Retour</button>
      </div>
      
      </form>';

?>

  </div>

</body>
</html>
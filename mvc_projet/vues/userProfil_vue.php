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

<script type="text/javascript">
</script>

<body align="center" text-align="center">
	
	<?php 
		include_once ("navbar.php"); 
	?>

  <h1 style="margin:2%">Vos informations</h1><br>

  <div align="center">

  <?php
     for($i = 0; $i< count($_SESSION['row']); $i++ ){
      echo '<form action="updateUser.php" method="post">
      <div class="form-group">
          <label style="font-size:15pt;" for="nom">Nom</label>
          <input style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" class="form-control" id="nom" value="'.$_SESSION['row'][$i]["user_lastname"].'">
      </div><br>

      <div class="form-group">
          <label style="font-size:15pt;" for="prenom">Prénom</label>
          <input style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" class="form-control" id="prenom" value="'.$_SESSION['row'][$i]["user_firstname"].'">
      </div><br>

      <div class="form-group">
          <label style="font-size:15pt;" for="pseudo">Pseudo</label>
          <input style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" class="form-control" id="pseudo" value="'.$_SESSION['row'][$i]["user_nickname"].'">
      </div><br>

      <div class="form-group">
          <label style="font-size:15pt;" for="email">Adresse email</label>
          <input style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" class="form-control" id="email" value="'.$_SESSION['row'][$i]["user_email"].'">
      </div><br>

      <div class="form-group">
          <label style="font-size:15pt;" for="password">Mot de passe</label>
          <input style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" class="form-control" id="password" value="'.$_SESSION['row'][$i]["user_password"].'">
      </div><br>
      <div>
      <input type="submit" value="Valider" class="btn btn-success" style="font-size: 35px ! important; width: 200px; height: 75px; margin: 10px;">
      <button type="button" onclick="document.location.href=\'test_index.php\'" class="btn btn-default" style="font-size: 35px ! important; width: 200px; height: 75px; margin: 10px;">Retour</button>
      </div>
      </form>';
    }

?>

  </div>

</body>
</html>
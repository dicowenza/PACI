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

    session_start();

    echo '<div class="form-group">
        <label style="font-size:15pt;" for="nom">Nom</label>
        <input style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" class="form-control" id="nom" value="Cabrel">
    </div><br>

    <div class="form-group">
        <label style="font-size:15pt;" for="nom">Prénom</label>
        <input style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" class="form-control" id="nom" value="Francis">
    </div><br>

    <div class="form-group">
        <label style="font-size:15pt;" for="nom">Pseudo</label>
        <input style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" class="form-control" id="nom" value="'.$_SESSION["pseudo"].'">
    </div><br>

    <div class="form-group">
        <label style="font-size:15pt;" for="nom">Mot de passe</label>
        <input style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" class="form-control" id="nom" value="sisigro">
    </div><br>';

?>

  </div>

</body>
</html>
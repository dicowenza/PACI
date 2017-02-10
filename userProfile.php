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

    try{
        $bdd = new PDO('mysql:host=dbserver;dbname=test;charset=utf8', 'jefseutin', 'jefco');
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

    $req = $bdd->prepare("SELECT * FROM user WHERE user_ID = ".$_SESSION["user_ID"]);
    $req->execute();
    while($row = $req->fetch(PDO::FETCH_ASSOC)) {
      echo '<div class="form-group">
          <label style="font-size:15pt;" for="nom">Nom</label>
          <input style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" class="form-control" id="nom" value="'.$row["user_lastname"].'">
      </div><br>

      <div class="form-group">
          <label style="font-size:15pt;" for="nom">Prénom</label>
          <input style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" class="form-control" id="nom" value="'.$row["user_firstname"].'">
      </div><br>

      <div class="form-group">
          <label style="font-size:15pt;" for="nom">Pseudo</label>
          <input style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" class="form-control" id="nom" value="'.$row["user_nickname"].'">
      </div><br>

      <div class="form-group">
          <label style="font-size:15pt;" for="nom">Adresse email</label>
          <input style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" class="form-control" id="nom" value="'.$row["user_email"].'">
      </div><br>

      <div class="form-group">
          <label style="font-size:15pt;" for="nom">Mot de passe</label>
          <input style="width:30%; height:15%; text-align:center; font-size:20pt;" type="text" class="form-control" id="nom" value="'.$row["user_password"].'">
      </div><br>';
    }

?>

  </div>

</body>
</html>
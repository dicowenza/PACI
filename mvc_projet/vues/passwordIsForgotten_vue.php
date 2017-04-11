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
  <?php include_once ("navbar.php"); ?>

  <?php
    if (isset($_GET["bad_language"]) || isset($_GET["empty_fields"])){
      $message = isset($_GET["bad_language"]) ? "Personne inconnue au bataillon: êtes vous sûr d'être inscrit?" : "Remplissez tous les champs svp";
      echo '<div style="font-size:20pt;text-align: center;" class="alert alert-danger">
        <strong>ERROR! </strong> '.$message.'
      </div>';
    }
  ?>

  <div align="center" style="margin-top: 10%">
    <h1 align="center" >Mot de passe oublié</h1><br>
    <form method="post" action="../controleurs/passwordIsForgotten_controleur.php">
    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="pseudo" style="width:20%; height:15%; text-align:center; font-size:20pt;">
        <br><br>
		<input type="text" class="form-control" id="email" name="email" placeholder="email" style="width:20%; height:15%; text-align:center; font-size:20pt;">
		<br><br>
    <input type="submit" value="demande de renouvellement" class="btn btn-success" style="font-size: 35px ! important; width: 30%; height: 100px;">
    </form>
        <br>
  <h1>Un mail sera envoyé à l'adresse indiqué avec un mot de passe temporaire.<br> Vous pourrez ensuite modifier ce mot de passe depuis votre profil.</h1>
  </div>

</body>
</html>
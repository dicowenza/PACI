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
      $message = isset($_GET["bad_language"]) ? "On te connait pas toi !! Inscrivez vous stp" : "Remplissez tous les champs svp";
      echo '<div style="font-size:20pt;text-align: center;" class="alert alert-danger">
        <strong>STOP MEC !</strong> '.$message.'
      </div>';
    }
  ?>

  <div align="center" style="margin-top: 10%">
    <h1 align="center" >Connexion</h1><br>
    <form method="post" action="../controleurs/connexion_controleur.php">
		<input type="text" class="form-control" id="login" name="login" placeholder="Pseudo ou email" style="width:20%; height:15%; text-align:center; font-size:20pt;">
		<br><br>
    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" style="width:20%; height:15%; text-align:center; font-size:20pt;">
    <br><br>
    <input type="submit" value="Se connecter" class="btn btn-success" style="font-size: 35px ! important; width: 30%; height: 100px;">
    </form>
    <a href="passwordIsForgotten_vue.php"><h1>mot de passe oublié?</h1></a>
  </div>

</body>
</html>
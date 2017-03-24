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

<body text-align="center">
  <?php
    include_once ("navbar.php"); 
  ?>

  <div align="center" style="margin-top: 10%">
    <h1 align="center">Confirmation d'inscritpion</h1><br>
    <form method="post" action="../controleurs/signupConfirmed_controleur.php">
    <input type="text" class="form-control" id="pseudo" name="pseudo" <?php echo'value="'.$_GET["pseudo"].'"'; ?> style="width:20%; height:15%; text-align:center; font-size:20pt;">
    <br><br>
    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" style="width:20%; height:15%; text-align:center; font-size:20pt;">
    <input type="hidden" id="id" name="id" <?php echo'value="'.$_GET['id'].'"'; ?>>
    <br><br>
    <input type="submit" value="Valider" class="btn btn-success" style="font-size: 35px ! important; width: 30%; height: 100px;">
    </form>
  </div>


</body>
</html>

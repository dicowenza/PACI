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
    session_start();
    include_once ("navbar.php"); 
  ?>

  <?php
  if ($SESSION["empty_fields"] = 'true'){
    $message='Remplissez tous les champs svp';
    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
  }
  ?>

  <div align="center" style="margin-top: 10%">
    <h1 align="center">Inscription</h1><br>
    <form method="post" action="insertUser.php">
		<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" style="width:20%; height:15%; text-align:center; font-size:20pt;">
		<br><br>
    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" style="width:20%; height:15%; text-align:center; font-size:20pt;">
    <br><br>
    <input type="text" class="form-control" id="email" name="email" placeholder="xyz.example@mail.com" style="width:20%; height:15%; text-align:center; font-size:20pt;">
    <br><br>
    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Allias" style="width:20%; height:15%; text-align:center; font-size:20pt;">
    <br><br>
    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" style="width:20%; height:15%; text-align:center; font-size:20pt;">
    <br><br>
    <input type="submit" value="Valider"class="btn btn-success" style="font-size: 35px ! important; width: 30%; height: 100px;">
    </form>
  </div>

</body>
</html>

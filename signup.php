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
  <?php include_once ("navbar.php"); ?>

  <div align="center" style="margin-top: 20%">
    <h1 align="center">Inscription</h1><br>
		<input type="text" class="form-control" id="usr" placeholder="Nom" style="width:20%; height:15%; text-align:center; font-size:20pt;">
		<br><br>
    <input type="text" class="form-control" id="usr" placeholder="Prénom" style="width:20%; height:15%; text-align:center; font-size:20pt;">
    <br><br>
    <input type="password" class="form-control" id="pwd" placeholder="Mot de passe" style="width:20%; height:15%; text-align:center; font-size:20pt;">
    <br><br>
    <button type="button" class="btn btn-success" style="font-size: 35px ! important; width: 30%; height: 100px;">S'inscrire</button>

  </div>

</body>
</html>

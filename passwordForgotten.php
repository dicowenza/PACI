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
    <div align="center" style="margin-top: 15%">
      <h1 align="center" >Mot de passe oublié?</h1><br>
      <form method="post" action="passwordForgottenMailSent.php">
        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo" style="width:50%; height:15%; text-align:center; font-size:20pt;">
        <br><br>
        <!--<input type="text" class="form-control" id="email" name="email" placeholder="xyz@example.com" style="width:50%; height:15%; text-align:center; font-size:20pt;">
        <br><br>!-->
        <input type="hidden" name="type" id="type" value="passwordForgotten">
        <input type="submit" value="Confirmer" class="btn btn-success" style="font-size: 35px ! important; width: 50%; height: 100px;">
      </form>
    </div>

</body>
</html>
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

  <?php
  if (isset($_GET["empty_fields"])){
    $message='Remplissez tous les champs svp';
    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
  }

  try
{
  $bdd = new PDO('mysql:host=dbserver;dbname=test;charset=utf8', 'jefseutin', 'jefco');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

     $req = $bdd->prepare("SELECT user_nickname FROM user WHERE user_id_confirm =".$_GET['id']);
      
      $req->execute();

      $row = $req->fetch(PDO::FETCH_ASSOC);

      if (count($row) > 1)
        header("Location: index.php");
  
  ?>

  <div align="center" style="margin-top: 10%">
    <h1 align="center">Confirmation d'inscritpion</h1><br>
    <form method="post" action="updateUser.php">
    <input type="text" class="form-control" id="pseudo" name="pseudo" <?php echo'value="'.$row["user_nickname"].'"'; ?> style="width:20%; height:15%; text-align:center; font-size:20pt;">
    <br><br>
    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" style="width:20%; height:15%; text-align:center; font-size:20pt;">
    <input type="hidden" id="id" name="id" <?php echo'value="'.$_GET['id'].'"'; ?>>
    <br><br>
    <input type="submit" value="Valider" class="btn btn-success" style="font-size: 35px ! important; width: 30%; height: 100px;">
    </form>
  </div>


</body>
</html>

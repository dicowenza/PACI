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
    try
    {
      $bdd = new PDO('mysql:host=dbserver;dbname=test;charset=utf8', 'jefseutin', 'jefco');
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }

    //$req = $bdd->prepare("UPDATE user SET user_password = '".$_POST['password']."', user_id_confirm = 0 WHERE user_id_confirm=".$_POST['id']);
    //$req->execute();
    if (empty($_POST['pseudo']) || empty($_POST['email']))
      header('Location: index.php');
    $req = $bdd->prepare("SELECT user_ID, user_email FROM user WHERE user_nickname =".$_POST['pseudo']);
    $req->execute();
    $row = $req->fetch(PDO::FETCH_ASSOC);
    if (count($row["user_ID"]) != 1)
      header('Location: index.php');



    $req->fetchAll();

    include_once ("navbar.php");
    include_once ("sendMail.php");
  ?>
  <h1>Un mail a été envoyé sur votre adresse mail, regardez vos mails et cliquez sur le lien pour pouvoir modifier votre mot de passe.</h1>

</body>
</html>
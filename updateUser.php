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
session_start();
if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['pseudo'])){
    header('Location: signup.php?empty_fields=true');
    break;
}

try
{
	$bdd = new PDO('mysql:host=dbserver;dbname=test;charset=utf8', 'jefseutin', 'jefco');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


	$req = $bdd->prepare("INSERT INTO user (user_firstname, user_lastname, user_password, user_nickname, user_email, user_id_confirm) VALUES (:prenom, :nom, :password, :pseudo, :email, :id_confirm)");
    $rand = rand(100000000, 999999999);
        $req->execute(array(
            'nom' => $_POST['nom'], 
            'prenom' => $_POST['prenom'],
            'pseudo' => $_POST['pseudo'],
            'password' => 'NULL',
            'email' => $_POST['email'],
            'id_confirm' => $rand
            ));

    $data = $req->fetchAll();

    //$_SESSION["started"]='true';
    //$_SESSION["pseudo"]=$_POST['pseudo'];

    //header('Location: index.php')

include_once ("sendMail.php");
    ?>
    <p>Un mail a été envoyé sur votre adresse mail, regardez vos mails et cliquez sur le lien pour pouvoir finaliser l'inscritpion.</p>

</body>
</html>
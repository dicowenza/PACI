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
/*
try
{
	$bdd = new PDO('mysql:host=dbserver;dbname=test;charset=utf8', 'jefseutin', 'jefco');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
	$req = $bdd->prepare("INSERT INTO user (user_firstname, user_lastname, user_password, user_nickname, user_email) VALUES (:prenom, :nom, :password, :pseudo, :email)");
    $req->execute(array(
            'nom' => $_POST['nom'], 
            'prenom' => $_POST['prenom'],
            'pseudo' => $_POST['pseudo'],
            'password' => $_POST['password'],
            'email' => $_POST['email']
            ));

    $data = $req->fetchAll();

    //$_SESSION["started"]='true';
    //$_SESSION["pseudo"]=$_POST['pseudo'];

    //header('Location: index.php');
    <?php

/*$to      = 'okan.soyturk@etu.u-bordeaux.fr';
$subject = 'Ici le sujet';
$message = 'le ptit message ici';
$headers = 'From: pacidnah@salut.com' . "\r\n" .
    'Reply-To: pacidnah@salut.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
echo $_POST['type'];
if ($_POST['type'] == "confirmation"){
    echo "mdr<br>";
    $to      = $_POST['email'];
    $subject = "Inscription mon cochon de ".$_POST['pseudo'];
    $message = "Content-type: text/html; charset=UTF-8; Salut ! tu veux continuer ton inscription? click sur se <a href='http://jeffrey.seutin.emi.u-bordeaux.fr/pacidnah/index.php'>lien!</a>";
    $headers = 'From: webmaster@example.com' . "\r\n" .
     'Reply-To: webmaster@example.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();
} else {
    $to      = $_POST['destination'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $headers = $_POST['sender'] . "\r\n" .
        'Reply-To:'.$_POST['sender'] . "\r\n" .
        'X-Mailer: PHP/' . phpversion();    
}
    //mail($to, $subject, $message, $headers);
*/
include_once ("sendMail.php");
    ?>
    <p>Un mail a été envoyé sur votre adresse mail, regardez vos mails et cliquez sur le lien pour pouvoir finaliser l'inscritpion.</p>

</body>
</html>
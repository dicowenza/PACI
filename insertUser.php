<?php
session_start();
if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['password']) || empty($_POST['pseudo']) || empty($_POST['email'])){
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
	$req = $bdd->prepare("INSERT INTO user (user_firstname, user_lastname, user_password, user_nickname, user_email) VALUES (:prenom, :nom, :password, :pseudo, :email)");
    $req->execute(array(
            'nom' => $_POST['nom'], 
            'prenom' => $_POST['prenom'],
            'pseudo' => $_POST['pseudo'],
            'password' => $_POST['password'],
            'email' => $_POST['email']
            ));

    $data = $req->fetchAll();

    $_SESSION["started"]='true';
    $_SESSION["pseudo"]=$_POST['pseudo'];

    header('Location: index.php');
?>

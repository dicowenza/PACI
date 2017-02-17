<?php
session_start();
if (empty($_POST['password']) || $_POST['password'] == 'NULL' || empty($_POST['nom']) empty($_POST['nom']) empty($_POST['nom']) empty($_POST['nom'])){
    header('Location: index.php');
}
try
{
	$bdd = new PDO('mysql:host=dbserver;dbname=test;charset=utf8', 'jefseutin', 'jefco');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

	$req = $bdd->prepare("UPDATE user SET user_password = '".$_POST['password']."', user_id_confirm = 0 WHERE user_id_confirm=".$_POST['id']);
        $req->execute();

    $data = $req->fetchAll();

    header('Location: login.php')

    ?> 
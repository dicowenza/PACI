<?php
session_start();
if (empty($_POST['password']) || $_POST['password'] == 'NULL'){
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

/*$req = $bdd->prepare("SELECT * FROM user WHERE user_id_confirm =".$_POST['id']);
$req->execute();
$row = $req->fetch(PDO::FETCH_ASSOC);*/

	$req = $bdd->prepare("UPDATE user SET user_password = '".$_POST['password']."', user_id_confirm = 0 WHERE user_id_confirm=".$_POST['id']);
        $req->execute();

    $data = $req->fetchAll();

    //print_r($req)


    header('Location: login.php')

    ?>
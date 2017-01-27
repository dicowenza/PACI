<?php
try
{
	$bdd = new PDO('mysql:host=dbserver;dbname=jefseutin;charset=utf8', 'jefseutin', 'jefco');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
	$req = $bdd->prepare("INSERT INTO users (Nom, Prénom, TelPerso, Mail, NombreAleatoire) VALUES (:name, :nickname, :tel, :mail, :rand)");
    $req->execute(array(
            'name' => $_POST['name'], 
            'nickname' => $_POST['nickname'],
            'tel' => $_POST['tel'],
            'mail' => $_POST['mail'],
            'rand' => rand(0, 200000)
            ));

    $data = $req->fetchAll();

    header('Location: /index.php');
?>


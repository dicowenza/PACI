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
	$req = $bdd->prepare("INSERT INTO service (service_user_ID, service_title, service_description, service_date, service_delay) VALUES (:userID, :title, :description, now(), :delay)");
    $req->execute(array(
            'userID' => $_SESSION['user_ID'],
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'delay' => $_POST['delay']
            ));

    $data = $req->fetchAll();

    header('Location: servicesView.php');
?>

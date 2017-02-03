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
	$req = $bdd->prepare("INSERT INTO service (service_user_ID, service_title, service_description, service_date, service_delay) VALUES (:userID, :title, :description, now(), now())");
    $req->execute(array(
            'userID' => $_SESSION['user_ID'],
            'title' => $_POST['title'],
            'description' => $_POST['description']
//            'delay' => $_POST['delay']
            ));

    $data = $req->fetchAll();

    header('Location: servicesView.php');
?>

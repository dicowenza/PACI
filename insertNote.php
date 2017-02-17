<?php
session_start();
/*if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['password']) || empty($_POST['pseudo']) || empty($_POST['email'])){
    header('Location: signup.php?empty_fields=true');
    break;
}*/

try
{
	$bdd = new PDO('mysql:host=dbserver;dbname=test;charset=utf8', 'jefseutin', 'jefco');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
	$req = $bdd->prepare("INSERT INTO note VALUES (0, :answerID, :userID, :status)");
    $req->execute(array(
            'answerID' => $_GET['answerID'],
            'userID' => $_GET['userID'],
            'status' => $_GET['noteStatus']
            ));

    $data = $req->fetchAll();

   header('Location: questionsView.php');
?>

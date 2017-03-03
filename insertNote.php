<?php
session_start();

try{
	$bdd = new PDO('mysql:host=dbserver;dbname=test;charset=utf8', 'jefseutin', 'jefco');
}
catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare("SELECT * FROM note WHERE note_user_ID = ".$_GET['userID']." AND note_answer_ID = ".$_GET['answerID']); $req->execute();

if($req->rowCount() == 0)
    $req = $bdd->prepare("INSERT INTO note VALUES (0, :answerID, :userID, :status)");
else
    $req = $bdd->prepare("UPDATE note SET note_status = :status WHERE note_answer_ID = :answerID AND note_user_ID = :userID");

$req->execute(array(
        'answerID' => $_GET['answerID'],
        'userID' => $_GET['userID'],
        'status' => $_GET['noteStatus']
        ));

header('Location: questionsView.php');
?>

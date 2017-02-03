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
	$req = $bdd->prepare("INSERT INTO faq (faq_user_ID, faq_question, faq_answer, faq_date) VALUES (:userID, :question, :answer, now())");
    $req->execute(array(
            'userID' => $_SESSION['user_ID'],
            'question' => $_POST['question'],
            'answer' => $_POST['answer'],
            ));

    $data = $req->fetchAll();

    header('Location: questionsView.php');
?>

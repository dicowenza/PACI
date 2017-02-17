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

if (empty($_POST['answer']) || empty($_SESSION["started"]) || $_SESSION["started"] == "false") 
    header('Location: index.php');

$req = $bdd->prepare("SELECT user_ID FROM user WHERE user_ID =".$_SESSION['user_ID']);
$req->execute();
$row = $req->fetch(PDO::FETCH_ASSOC);
if(count($row) == 0 || count($row["user_ID"]) > 1)
     header('Location: index.php');
$req = $bdd->prepare('INSERT INTO answer_faq (answer_text, answer_faq_ID, answer_user_ID, answer_note, answer_date) VALUES ("'.$_POST["answer"].'", '.$_POST["faqID"].', '.$row["user_ID"].', 0, now())');
$req->execute();
    print_r($req);
    $data = $req->fetchAll();
    echo 'done';
    header('Location: questionsViews.php')

    ?>
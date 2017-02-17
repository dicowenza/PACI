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
print_r($_POST["answer"]);

$req = $bdd->prepare("SELECT * FROM faq INNER JOIN user ON faq.faq_user_ID = user.user_ID WHERE user_ID =".$_SESSION['user_ID']);
$req->execute();
$row = $req->fetch(PDO::FETCH_ASSOC);
if(count($row) == 0 || count($row["user_ID"]) > 1)
	 header('Location: index.php');
print_r($row);
//$req = $bdd->prepare("SELECT faq SET answer = '".$_POST['password']."', user_id_confirm = 0 WHERE user_id_confirm=".$_POST['id']);*/
       // $req->execute();

    //$data = $req->fetchAll();

   // print_r($req)


    ///header('Location: login.php')

    ?>
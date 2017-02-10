<?php
session_start();
if (empty($_POST['login']) || empty($_POST['password']) || $_POST['password'] == 'NULL'){
    header('Location: login.php?empty_fields=true');
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
	$req = $bdd->prepare("SELECT DISTINCT * FROM user WHERE user_password = :password AND ( user_email = :login OR user_nickname = :login)");
    $req->execute(array(
            'password' => $_POST['password'],
            'login' => $_POST['login']
            ));

    //$data = $req->fetchAll();

    if ($req->rowCount() == 0){
        header('Location: login.php?bad_language=true');
        break; 
    }

    $row = $req->fetch(PDO::FETCH_ASSOC);

    $_SESSION["started"]='true';
    $_SESSION["pseudo"]=$row['user_nickname'];
    $_SESSION["user_ID"]=$row['user_ID'];

    $req = $bdd->prepare("SELECT DISTINCT COUNT(*) FROM service WHERE service_user_ID = :id");
    $req->execute(array(
            'id' =>  $_SESSION["user_ID"]
            ));

    $row = $req->fetch(PDO::FETCH_ASSOC);

    $_SESSION["services"]=$row['COUNT(*)'];

    $req = $bdd->prepare("SELECT DISTINCT COUNT(*) FROM faq WHERE faq_user_ID = :id");
    $req->execute(array(
            'id' =>  $_SESSION["user_ID"]
            ));

    $row = $req->fetch(PDO::FETCH_ASSOC);

    $_SESSION["questions"]=$row['COUNT(*)'];

    header('Location: index.php');
?>

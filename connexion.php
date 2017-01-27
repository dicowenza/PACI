<?php
session_start();
if (empty($_POST['login']) || empty($_POST['password'])){
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

    //print_r($row);
    //echo $row['user_nickname'];

    $_SESSION["started"]='true';
    $_SESSION["pseudo"]=$row['user_nickname'];

    header('Location: index.php');
?>

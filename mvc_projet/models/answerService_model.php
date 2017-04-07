<?php
	session_start();

	if(! isset($_SESSION['db_connexion'])){
        $db_connexion=new ConnexionServeur();
        $_SESSION['db_connexion']=$db_connexion;
    }

	$sender = $_SESSION['db_connexion']->search_mailer($user_ID);

	include_once("../models/sendMail_model.php");

	echo $type." et destination: ".$mail;

	header("Location: ../controleurs/services_controleur.php");
?>
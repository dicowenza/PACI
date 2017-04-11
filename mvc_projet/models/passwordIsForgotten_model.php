<?php
	include_once("data/connexion_db_obj.php");
	session_start();

 	if(! isset($_SESSION['db_connexion'])){
        $db_connexion=new ConnexionServeur();
        $_SESSION['db_connexion']=$db_connexion;
    }
	#test du login
	$row=$_SESSION['db_connexion']->recherche_user($pseudo); 
	#si login non valide
	if(sizeof($row) != 1){
		header('Location: ../vues/passwordIsForgotten_vue.php?bad_language=true');
	}else{
		$chaine='abcdefghijklmnopqrstuvwxyz0123456789';
		$mdp=str_shuffle($chaine);
		$mdp=substr($mdp,0,8);
		$type="passwordForgotten";
		$_SESSION['db_connexion']->update_password_forgotten($pseudo, $mdp);
		include_once("sendMail_model.php");
		header('Location: ../vues/connexion_vue.php');
	}
	?>
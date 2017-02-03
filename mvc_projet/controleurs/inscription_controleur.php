<?php
	include_once("../models/data/connexion_db_obj.php");
	session_start();
	$db_connexion=$_SESSION['db_connexion'];
	#récupération du post
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$password=$_POST['password'];
	$pseudo=$_POST['pseudo'];
	$mail=$_POST['email'];
	#renvoie de la page s'il y'a un champ vide 
	if (empty($nom) || empty($prenom) || empty($password) || empty($pseudo) || empty($mail)){
		header('Location: signup.php?empty_fields=true');
	}
	#sinon ajout du nouvel utilisateur
	include("../models/connexion_model.php");
?>
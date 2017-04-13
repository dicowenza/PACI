<?php
	include_once("../models/data/connexion_db_obj.php");
	session_start();
	$db_connexion=$_SESSION['db_connexion'];
	#récupération du post
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$pseudo = $_POST['pseudo'];
	$mail= $_POST['email'];
	$type = $_POST['type'];
	$adresse = $_POST['adresse'];
	$latitude = $_POST['adresseLatitude'];
	$longitude = $_POST['adresseLongitude'];

	#renvoie de la page s'il y'a un champ vide
	$fields = "&nom=".$_POST['nom']."&prenom=".$_POST['prenom']."&pseudo=".$_POST['pseudo']."&email=".$_POST['email']."&adresse=".$_POST['adresse']."&latitude=".$_POST['adresseLatitude']."&longitude=".$_POST['adresseLongitude'];
	if (empty($nom))
		header('Location: ../vues/inscription_vue.php?missing=nom'.$fields);
	else if(empty($prenom))
		header('Location: ../vues/inscription_vue.php?missing=prenom'.$fields);
	else if(empty($pseudo))
		header('Location: ../vues/inscription_vue.php?missing=pseudo'.$fields);
	else if(empty($mail))
		header('Location: ../vues/inscription_vue.php?missing=email'.$fields);
	else if(empty($latitude))
		header('Location: ../vues/inscription_vue.php?missing=adresse'.$fields);

	else
		#sinon ajout du nouvel utilisateur
		include_once("../models/inscription_model.php");
?>
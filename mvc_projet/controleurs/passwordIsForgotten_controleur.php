<?php

	$pseudo = $_POST["pseudo"];
	$mail = $_POST["email"];

	if (empty($pseudo) || empty($mail)){
		header('Location: ../vues/passwordIsForgotten_vue.php?empty_fields=true');
	}

	include_once("../models/passwordIsForgotten_model.php");

	//header("Location: ../vues/connexion_vue.php");
?>
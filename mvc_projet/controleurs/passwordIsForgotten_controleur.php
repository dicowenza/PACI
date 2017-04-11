<?php

	$pseudo = $_POST["pseudo"];

	if (empty($pseudo)){
		header('Location: ../vues/passwordIsForgotten_vue.php?empty_fields=true');
	}

	include_once("../models/passwordIsForgotten_model.php");

	//header("Location: ../vues/connexion_vue.php");
?>
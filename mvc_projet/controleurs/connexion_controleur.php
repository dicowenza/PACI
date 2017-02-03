<?php
	session_start();
	$login=$_POST['login'];
	$password=$_POST['password'];
	

	if (empty($login) || empty($password)){
		header('Location: ../vues/connexion_vue.php?empty_fields=true');
	}
	else include_once("../models/connexion_model.php");

?>

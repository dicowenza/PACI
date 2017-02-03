<?php
	include_once("../models/data/connexion_db_obj.php");
	session_start();
	if(!isset($_SESSION['started'])){
		$_SESSION['db_connexion']=new ConnexionServeur(); 
	}
	else $_SESSION['db_connexion']=new ConnexionServeur();
	header('Location:../vues/inscription_vue.php');

?>
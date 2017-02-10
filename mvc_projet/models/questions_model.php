<?php
	include_once("data/connexion_db_obj.php");
	#include_once("../models/data/user_model.php");
	#include_once("../models/data/log_obj_model.php");

	session_start();
	if(! isset($_SESSION['db_connexion'])){
		$db_connexion=new ConnexionServeur();
		$_SESSION['db_connexion']=$db_connexion; 
	}
	$db_connexion->db_reconnect();


	header('../vues/question_vue.php');

?>
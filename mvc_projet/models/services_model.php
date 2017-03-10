<?php
	include_once("data/connexion_db_obj.php");
	#include_once("../models/data/user_model.php");
	#include_once("../models/data/log_obj_model.php");
	session_start();

	//print_r($_SESSION);
	if(! isset($_SESSION['db_connexion'])){
		$db_connexion=new ConnexionServeur();
		$_SESSION['db_connexion']=$db_connexion;
	}
	/*if(isset($_SESSION["load_usr_questions"])){
		$_SESSION['db_connexion']->db_load_usr_questions();
	}
	else*/ 
	if(isset($_GET["category"]))
		$_SESSION['row'] = $_SESSION['db_connexion']->db_load_services_by_cat($_GET["category"]);
	else
		$_SESSION['row'] = $_SESSION['db_connexion']->db_load_services();

		header('Location: ../vues/services_vue.php');

?>
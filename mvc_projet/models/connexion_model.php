<?php
	include_once("data/connexion_db_obj.php");
	#include_once("../models/data/user_model.php");
	include_once("../models/data/log_obj_model.php");

	
	$usr_log=new LogObject($login,$password);
	$db_connexion=new ConnexionServeur();
	$_SESSION['db_connexion']=$db_connexion; 
	#test du login
	$row=$db_connexion->login($usr_log); 
	#si login non valide
	if(count($row)==0){
		header('Location: ../vues/connexion_vue.php?bad_language=true');
	}
	#sinon
	$_SESSION["started"]='true';
	$_SESSION["pseudo"]=$row['user_nickname'];
	header('Location: ../vues/test_index.php');

?>
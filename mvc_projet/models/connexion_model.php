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
	if(sizeof($row) != 1){
		header('Location: ../vues/connexion_vue.php?bad_language=true');
	}else{
		$_SESSION["started"]='true';
		$_SESSION["user_ID"]=$row[0]['user_ID'];
		$_SESSION["pseudo"]=$row[0]['user_nickname'];
		$_SESSION["user_adrLat"]=$row[0]['user_address_latitude'];
		$_SESSION["user_adrLng"]=$row[0]['user_address_longitude'];
		$_SESSION["user_isModerator"]=$row[0]['user_isModerator'];
		header('Location: ../vues/index.php');
	}

?>
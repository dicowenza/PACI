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
	else*/ 	$_SESSION['row'] = $_SESSION['db_connexion']->db_load_faq();

			for($i = 0; $i< count($_SESSION['row']); $i++ ){
		   		//echo '<br>';
		   		$_SESSION['faq_answers'][$i] = $_SESSION['db_connexion']->db_load_faq_answers($_SESSION['row'][$i]["faq_ID"]);
		   		//print_r($_SESSION['faq_answers'][$i]);
				for($j = 0; $j< count($_SESSION['faq_answers'][$i]); $j++ ){
					echo '<br>';
					print_r($_SESSION['faq_answers'][$i][$j]['nbr']);
					//print_r(count($_SESSION['faq_answers'][$i]));
				}
		   	}

	$modalTarget = (isset($_SESSION['modalTarget'])) ? ("?openModal=".$_SESSION["modalTarget"]) : "";
	unset($_SESSION['modalTarget']);

	header('Location: ../vues/questions_vue.php'.$modalTarget);

?>
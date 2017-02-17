<?php 
	
	session_start();

	//si l'utilisateur est connecté sous sa session : on charge ses questions
    if (isset($_SESSION["started"]) && isset($_GET["my_questions"]) && $_SESSION["started"] == "true" && $_GET["my_questions"] == "true"){
    	$load_usr_questions=true;
    	$_SESSION["load_usr_questions"]=$load_usr_questions;
    } 
	//sinon on lui affiche la liste des questions 
	header("Location: ../models/questions_model.php");
    //include_once("../model/questions_model.php");



?>


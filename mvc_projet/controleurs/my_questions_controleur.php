<?php 
	
	session_start();
	//si l'utilisateur est connecté sous sa session : on charge ses questions
	//sinon on lui affiche la liste des questions 
	header("Location: ../models/my_questions_model.php");
    //include_once("../model/questions_model.php");



?>


<?php 
	
	session_start();
	//si l'utilisateur est connecté sous sa session : on charge ses services
	//sinon on lui affiche la liste des services
	header("Location: ../models/my_services_model.php");
    //include_once("../model/questions_model.php");



?>
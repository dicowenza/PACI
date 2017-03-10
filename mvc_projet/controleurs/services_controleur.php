<?php 
	
	session_start();

	//si l'utilisateur est connecté sous sa session : on charge ses services
    if (isset($_SESSION["started"]) && isset($_GET["my_services"]) && $_SESSION["started"] == "true" && $_GET["my_services"] == "true"){
    	$load_usr_questions=true;
    	$_SESSION["load_usr_services"]=$load_usr_services;
    } 
	//sinon on lui affiche la liste des services
	if(isset($_GET["category"]))
		header("Location: ../models/services_model.php?category=".$_GET["category"]);
	else
		header("Location: ../models/services_model.php");

?>
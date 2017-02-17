<?php 

	session_start();


	//si l'utilisateur est connecté sous sa session : on charge ses questions
    if (isset($_SESSION["started"]) && isset($_GET["my_questions"]) && $_SESSION["started"] == "true" && $_GET["my_questions"] == "true"){
    	$req = $bdd->prepare("SELECT * FROM faq WHERE faq_user_ID = ".$_SESSION["user_ID"]);
    } 
	//sinon onlui affiche la liste des questions 
    else {
    	$req = $bdd->prepare("SELECT * FROM faq");
    }  






?>


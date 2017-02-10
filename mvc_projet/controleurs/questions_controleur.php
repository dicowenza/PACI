<?php 

	session_start();



    if (isset($_SESSION["started"]) && isset($_GET["my_questions"]) && $_SESSION["started"] == "true" && $_GET["my_questions"] == "true"){
    	$req = $bdd->prepare("SELECT * FROM faq WHERE faq_user_ID = ".$_SESSION["user_ID"]);
    } 
    else {
    	$req = $bdd->prepare("SELECT * FROM faq");
    }  



?>


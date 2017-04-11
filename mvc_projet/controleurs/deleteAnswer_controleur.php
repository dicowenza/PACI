<?php
    session_start();

    $_SESSION["answerID"] = $_GET["answerID"];
    $_SESSION["modalTarget"] = $_GET["faqID"];

	if(isset($_SESSION["user_ID"]) && ($_SESSION["user_ID"] != -1)) 
        header("Location: ../models/deleteAnswer_model.php");
    else
        header('Location: ../vues/connexion_vue.php');
?>
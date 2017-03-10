<?php
    session_start();

    $_SESSION["userService"] = $_POST["description"];
	$_SESSION["userServiceTitle"] = $_POST["title"];
    $_SESSION["userServiceCategory"] = $_POST["category"];

    if(isset($_SESSION["user_ID"]) && ($_SESSION["user_ID"] != -1) && !empty($_SESSION["userService"])) 
        header("Location: ../models/insertService_model.php");
    else
        header('Location: ../vues/connexion_vue.php');
?>
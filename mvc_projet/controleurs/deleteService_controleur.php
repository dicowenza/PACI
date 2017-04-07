<?php
    session_start();

    $_SESSION["serviceID"] = $_GET["serviceID"];

    if(isset($_SESSION["user_ID"]) && ($_SESSION["user_ID"] != -1))
        header("Location: ../models/deleteService_model.php");
    else
        header('Location: ../vues/connexion_vue.php');
?>
<?php
    session_start();

    $_SESSION["faqID"] = $_POST["faqID"];
    $_SESSION["text_faq"] = $_POST["answer"];
    $_SESSION["modalTarget"] = $_GET["faqID"];


	if(isset($_SESSION["user_ID"]) && ($_SESSION["user_ID"] != -1)) 
        header("Location: ../models/insertAnswer_model.php");
    else
        header('Location: ../vues/connexion_vue.php?need2connect=true');
?>
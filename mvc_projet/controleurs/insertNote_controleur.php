<?php
    session_start();

    $_SESSION["answerID"] = $_GET["answerID"];
    $_SESSION["userID"] = $_GET["userID"];
    $_SESSION["noteStatus"] = $_GET["noteStatus"];

    $_SESSION["modalTarget"] = $_GET["faqID"];

    header("Location: ../models/insertNote_model.php");
?>
<?php
    session_start();

    $_SESSION["answerID"] = $_GET["answerID"];
    $_SESSION["userID"] = $_GET["userID"];
    $_SESSION["noteStatus"] = $_GET["noteStatus"];

    header("Location: ../models/insertNote_model.php");
?>
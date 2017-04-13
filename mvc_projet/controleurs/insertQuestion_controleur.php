<?php
    session_start();

    $_SESSION["userQuestion"] = $_POST["question"];

    if(isset($_SESSION["user_ID"]) && ($_SESSION["user_ID"] != -1) && !empty($_SESSION["userQuestion"])) 
        header("Location: ../models/insertQuestion_model.php");
    else
        header('Location: ../vues/connexion_vue.php?need2connect=true');
?>

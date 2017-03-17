<?php
    session_start();

    $_SESSION["userLastName"] = $_POST["lastname"];
	$_SESSION["userFirstName"] = $_POST["firstname"];
    $_SESSION["userNickName"] = $_POST["nickname"];
    $_SESSION["userEmail"] = $_POST["email"];
    $_SESSION["userPassword"] = $_POST["password"];

    header("Location: ../models/update_user_profil_model.php");
?>
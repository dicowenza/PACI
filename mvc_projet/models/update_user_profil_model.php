<?php

	include_once("data/connexion_db_obj.php");
    #include_once("../models/data/user_model.php");
    #include_once("../models/data/log_obj_model.php");
    session_start();

    //print_r($_SESSION);
    if(! isset($_SESSION['db_connexion'])){
        $db_connexion=new ConnexionServeur();
        $_SESSION['db_connexion']=$db_connexion;
    }

	$_SESSION['db_connexion']->update_user_profil($_SESSION["user_ID"], $_SESSION["userLastName"], $_SESSION["userFirstName"], $_SESSION["userNickName"], $_SESSION["userEmail"], $_SESSION["userPassword"]);

    

    //header('Location: ../vues/userProfil_vue.php');
    header('Location: ../controleurs/userProfil_controleur.php');
?>
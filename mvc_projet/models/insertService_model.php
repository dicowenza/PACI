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

	$_SESSION['db_connexion']->insert_service_faq($_SESSION["user_ID"], $_SESSION["userServiceTitle"], $_SESSION["userService"], $_SESSION["userServiceCategory"]);

    header('Location: ../vues/service_vue.php');
?>
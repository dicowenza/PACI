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
	#$nw_user=new User()
	#$db_connexion->inscription(nw_user);
	$rand = rand(100000000, 999999999);	
	$e = $_SESSION['db_connexion']->inscription($nom,$prenom,$pseudo,$mail,$adresse,$latitude,$longitude,$rand);

    if($e == 23000){
        header("Location: ../vues/inscription_vue.php?notUnique=true");
    }
 
	include_once("sendMail_model.php");

 	include_once("../controleurs/finalisationInscription_controleur.php");
?>
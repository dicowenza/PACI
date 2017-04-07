<?php 
	include_once("data/connexion_db_obj.php");
    session_start();

    echo $_SESSION['faqID'];

    if(! isset($_SESSION['db_connexion'])){
        $db_connexion=new ConnexionServeur();
        $_SESSION['db_connexion']=$db_connexion;
    }
    $_SESSION['db_connexion']->delete_question_in_db($_SESSION['faqID']);

    echo "bartatta";
    header('Location: ../controleurs/questions_controleur.php');

?>
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

	//$_SESSION['db_connexion']->insert_answer_faq($_SESSION["user_ID"], $_SESSION["faqID"], $_SESSION["text_faq"]);

    $_SESSION['row'] = $_SESSION['db_connexion']->search_questioner_faq($_SESSION["faqID"]);
    for($i = 0; $i< count($_SESSION['row']); $i++ ){
        $pseudo = $_SESSION['row'][$i]["user_nickname"];
        $mail = $_SESSION['row'][$i]["user_email"];
    }
    $type = "answerQuestion";
    $answerer = $_SESSION['db_connexion']->search_answerer_faq($_SESSION["user_ID"]);
    
    include_once("sendMail_model.php");

    header("Location: ../controleurs/questions_controleur.php");

?>
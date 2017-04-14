<?php
include_once("data/connexion_db_obj.php");
session_start();

if(! isset($_SESSION['db_connexion'])){
	$db_connexion=new ConnexionServeur();
	$_SESSION['db_connexion']=$db_connexion;
}
$db_config_domain = $_SESSION['db_connexion']->get_domain();

if ($type == "confirmation"){
	$to      = $mail;
	$subject = "Inscription Pacidnah de ".$pseudo;
	$message = "Bonjour et merci pour votre inscription.\n Pour la finaliser, veuillez cliquer sur ce lien : http://".$db_config_domain."/pacidnah/mvc_projet/vues/signupConfirmed_vue.php?mail_confirmed=true&id=".$rand."&pseudo=".$pseudo;
	$headers = 'From: Pacidnah, pour vous servir' . "\r\n" .
     'Reply-To: Pacidnah, pour vous servir' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();
     echo 'ici';

} else if ($type == "passwordForgotten"){
	$to      = $mail;
	$subject = "Validation du nouveau mot de passe, ".$pseudo;
	$message = "Vous avez demandé un renouvelement de mot de passe. Voici un mot de passe temporaire: ".$mdp;
	$headers = 'Pacidnah, pour vous servir' . "\r\n" .
     'Reply-To: Pacidnah, pour vous servir' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

} else if ($type == "answerQuestion"){
	$to      = $mail;
	$subject = utf8_decode("On a répondu à une de vos question, ".$pseudo);
	$message = "Une de vos question à susciter la curiosité de ".$answerer.", allez voir!";
	$headers = 'From: Pacidnah, pour vous servir' . "\r\n" .
     'Reply-To: Pacidnah, pour vous servir' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

} else if ($type == "answerService"){
	$to      = $mail;
	$subject = $title;
	$message = $pseudo." est très intéressé par votre annonce :\n" .$message;
	$headers = 'From: '.$sender . "\r\n" .
     'Reply-To: '.$sender . "\r\n" .
     'X-Mailer: PHP/' . phpversion();
     echo 'done';

} else {
	$to      = $destination;
	$subject = $subject;
	$message = $message;
	$headers = 'From:'.$sender."\r\n";
	$headers .='Reply-To:'.$sender."\r\n";
	$headers .='X-Mailer: PHP/'.phpversion();
}
	mail($to, $subject, $message, $headers);
?> 

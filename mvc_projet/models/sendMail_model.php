<?php
if ($type == "confirmation"){
	$to      = $mail;
	$subject = "Inscription Pacidnah de ".$pseudo;
	$message = "Bonjour et merci pour votre inscription. Pour la finaliser, veuillez cliquer sur ce lien : http://jeffrey.seutin.emi.u-bordeaux.fr/pacidnah/mvc_projet/vues/signupConfirmed_vue.php?mail_confirmed=true&id=".$rand."&pseudo=".$pseudo;
	$headers = 'From: webmaster@example.com' . "\r\n" .
     'Reply-To: webmaster@example.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();
     echo 'ici';

} else if ($type == "passwordForgotten"){
	$to      = $mail;
	$subject = "Validation du nouveau mot de passe, ".$pseudo;
	$message = "Vous avez demandé un renouvelement de mot de passe. Voici un mot de passe temporaire: ".$mdp;
	$headers = 'From: webmaster@example.com' . "\r\n" .
     'Reply-To: webmaster@example.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

} else if ($type == "answerQuestion"){
	$to      = $mail;
	$subject = utf8_decode("On a répondu à une de vos question, ".$pseudo);
	$message = "Une de vos question à susciter la curiosité de ".$answerer.", allez voir!";
	$headers = 'From: webmaster@example.com' . "\r\n" .
     'Reply-To: webmaster@example.com' . "\r\n" .
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

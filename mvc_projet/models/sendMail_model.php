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
	$message = "Content-type: text/html; charset=UTF-8; Vous avez demandé un renouvelement de mot de passe. Cliquez sur le lien suivant pour valider le nouveau.";
	$headers = 'From: webmaster@example.com' . "\r\n" .
     'Reply-To: webmaster@example.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

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

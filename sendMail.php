<?php

/*$to      = 'okan.soyturk@etu.u-bordeaux.fr';
$subject = 'Ici le sujet';
$message = 'le ptit message ici';
$headers = 'From: pacidnah@salut.com' . "\r\n" .
    'Reply-To: pacidnah@salut.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);*/
if ($_POST['type'] == "confirmation"){
	$to      = $_POST['email'];
	$subject = "Inscription mon cochon de ".$_POST['pseudo'];
	$message = "Content-type: text/html; charset=UTF-8; Salut ! tu veux continuer ton inscription? click sur se lien : http://okan.soyturk.emi.u-bordeaux.fr/pacidnah/signupConfirmed.php?mail_confirmed=true&id=".$rand;
	$headers = 'From: webmaster@example.com' . "\r\n" .
     'Reply-To: webmaster@example.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

} else if ($_POST['type'] == "passwordForgotten"){
	$to      = $row['user_email'];
	$subject = "Validation du nouveau mot de passe, ".$row['user_nickname'];
	$message = "Content-type: text/html; charset=UTF-8; Salut ! tu as perdu ton mot de passe? tant pis pour toi! clique ici pour pouvoir en rentrer un nouveau!";
	$headers = 'From: webmaster@example.com' . "\r\n" .
     'Reply-To: webmaster@example.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

} else {
	$to      = $_POST['destination'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$headers = 'From:'.$_POST['sender']."\r\n";
	$headers .='Reply-To:'.$_POST['sender']."\r\n";
	$headers .='X-Mailer: PHP/'.phpversion();	
}
	mail($to, $subject, $message, $headers);

?> 
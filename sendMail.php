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
	$message = "Content-type: text/html; charset=UTF-8; Salut ! tu veux continuer ton inscription? click sur se lien : http://jeffrey.seutin.emi.u-bordeaux.fr/pacidnah/index.php";
	$headers = 'From: webmaster@example.com' . "\r\n" .
     'Reply-To: webmaster@example.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();
} else {
	$to      = $_POST['destination'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$headers = $_POST['sender'] . "\r\n" .
	    'Reply-To:'.$_POST['sender'] . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();	
}
	mail($to, $subject, $message, $headers);
?> 
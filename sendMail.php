<?php

$to      = $_POST['destination'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$headers = 'From:'.$_POST['sender']."\r\n";
$headers .='Reply-To:'.$_POST['sender']."\r\n";
$headers .='X-Mailer: PHP/'.phpversion();

mail($to, $subject, $message, $headers);
?> 
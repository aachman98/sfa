<?php

require_once "Mail.php";

$from = "SMTP pa98 <smtp.pa98@gmail.com>";
$to = "$personname <$email>";
$subject = "Activation of SFA account";
$link = "$ip/auth.php?email=$email";
$body = "Dear $personname,\n\nThank you for registering to Narnia SFA. Click the following link to activate your account\n\n$link";

$host = "smtp.gmail.com";
$username = "smtp.pa98";
$password = "punyaaachman98";

$headers = array ('From' => $from, 'To' => $to, 'Subject' => $subject);
$smtp = Mail::factory('smtp', array('host' => $host, 'auth' => true, 'username' => $username, 'password' => $password));
$mail = $smtp->send($to, $headers, $body);
 
if (PEAR::isError($mail)) {
	echo "error";
} else {
	echo "true";
}

?>

<?php

function telegram($mail, $subject, $message){
	$key = "botXXXXXXXXX:AABBCCDDEEFFGGHHIIJJKKLLMMNNOO";
	$chat_id = "123456789";

	if(isset($mail) && isset($subject) && isset($message)){ 
		
		$ch = curl_init("https://api.telegram.org/".
			$key."/sendMessage?chat_id=".
			$chat_id."&text=De : ".
			$mail."%0aSujet : ".
			$subject."%0a%0aMessage : %0a".
			$message);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$data = curl_exec($ch);
		curl_close($ch);
	}
}

$mail = $_POST['mail'];
$subject = $_POST['subject'];
$message = $_POST['message'];

telegram($mail, $subject, $message);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Blog — Telegram</title>
</head>
<body>
<h1>Formulaire vers Telegram</h1>
<form method="POST" action="">

	<label for="mail">E-mail</label><br/>
		<input type="text" name="mail"><br/>
	<label for="subject">Sujet</label><br/>
		<input type="text" name="subject"><br/>
	<label for="message">Message</label><br/>
		<input type="text" name="message"/><br/>

	<input type="submit" name="Envoyer le message">
</form>
</body>
</html>

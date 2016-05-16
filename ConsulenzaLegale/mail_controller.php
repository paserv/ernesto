<?php
function sendMail($name, $surname, $email, $phone, $motiv, $date, $misc, $attachment) {
	$email = new PHPMailer();
	$email -> From = $email;
	$email -> FromName = $name . ' ' . $surname . ' from Ricorso Verbali C.d.S.';
	$email -> Subject = $motiv . ' - Ricorso Verbali C.d.S.';
	$email -> Body = 'Nome: ' . $name . '\nCognome: ' . $surname . '\nMail: ' . $mail . '\nTelefono: ' . $phone . '\nMotivazione: ' . $motiv . '\nData ricevuta notifica atto: ' . $date . '\nVarie ed Eventuali: ' . $misc;
	$email -> AddAddress(DESTINATION_MAIL);
	
	$file_to_attach = 'PATH_OF_YOUR_FILE_HERE';
	
	$email -> AddAttachment( $file_to_attach , 'NameOfFile.pdf' );
	
	return $email->Send();
}
?>
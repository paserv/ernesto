<?php
class Controller {
	/**
	 * MAIL CONTROLS
	 */
	function sendMail($name, $mail, $phone, $motiv, $date, $misc, $attachment) {
		$email = new PHPMailer();
		$nome = !empty($name) ? $name : 'Nessun nome specificato';
		//$mail_ = !empty($mail) ? $mail : 'Nessuna email specificata';
		$telefono = !empty($phone) ? $phone : 'Nessun telefono specificato';
		$motivazione = !empty($motiv) ? $motiv : 'Richiesta Generica';
		$dataNotifica = !empty($date) ? $date : 'Nessuna data specificata';
		$varie = !empty($misc) ? $misc : 'Nessuna informazione aggiuntiva inserita';
		
		$email -> From = $mail;
		$email -> FromName = $nome;
		$email -> Subject = $nome . ' - Motivazione: ' . $motivazione;
		$email -> Body = 'Nominativo: ' . $nome . '\nMail: ' . $mail . '\nTelefono: ' . $telefono . '\nMotivazione: ' . $motivazione . '\nData ricevuta notifica atto: ' . $dataNotifica . '\nVarie ed Eventuali: ' . $varie;
		if (!empty($attachment)) {
			$file_to_attach = $attachment;
			$email -> AddAttachment( $file_to_attach , 'NameOfFile.pdf' );
		}

		$email -> AddAddress(DESTINATION_MAIL);

		return $email->Send();
	}
	
	/**
	 * CAPTCHA CONTROLS
	 */
	function checkIsRobot($recaptcha_response) {
		//$recaptcha = new \ReCaptcha\ReCaptcha(RC_SECRET_KEY);
		$recaptcha = new \ReCaptcha\ReCaptcha(RC_SECRET_KEY, new \ReCaptcha\RequestMethod\Curl());
		$resp = $recaptcha->verify($recaptcha_response, $_SERVER['REMOTE_ADDR']);
		// 		echo var_export($resp);
		if ($resp->isSuccess()) {
			return false;
		} else {
			return true;
		}
	}
}
?>
<?php
class Controller {
	/**
	 * MAIL CONTROLS
	 */
	function sendMail($name, $mail, $phone, $motiv, $date, $misc, $attachment) {
		
		$email = new PHPMailer();
		$email->isHTML(true);
		$nome = !empty($name) ? $name : 'Nessun nome specificato';
		//$mail_ = !empty($mail) ? $mail : 'Nessuna email specificata';
		$telefono = !empty($phone) ? $phone : 'Nessun telefono specificato';
		$motivazione = !empty($motiv) ? $motiv : 'Richiesta Generica';
		$dataNotifica = !empty($date) ? $date : 'Nessuna data specificata';
		$varie = !empty($misc) ? $misc : 'Nessuna informazione aggiuntiva inserita';
		
		$email -> From = $mail;
		$email -> FromName = $nome;
		$email -> Subject = $nome . ' - Motivazione: ' . $motivazione;
		$email -> Body = '<html><body><p>Nominativo: ' . $nome . '</p><p>Mail: ' . $mail . '</p><p>Telefono: ' . $telefono . '</p><p>Motivazione: ' . $motivazione . '</p><p>Data ricevuta notifica atto: ' . $dataNotifica . '</p><p>Varie ed Eventuali: ' . $varie . '</p></body></html>';
		$email -> AddAddress(DESTINATION_MAIL);
		
		if (!empty($attachment)) {
			$fileVerificationResponse = $this->validateFile($attachment);
			if ($fileVerificationResponse == 'ok') {
				$file_to_attach = $attachment['tmp_name'];
				$email -> AddAttachment( $file_to_attach , basename($attachment['name']) );
			} else {
				return new MailResponse('ko', 'fve', $fileVerificationResponse);
			}
			
		}

		$esito = $email->Send();

		if (!$esito) {
			return new MailResponse('ko', 'sme', 'Mail Error');
		}
		return new MailResponse('ok', 'ok', 'Mail Sent');
	}
	
	function validateFile($file) {
		//Get the uploaded file information
		$name_of_uploaded_file = basename($file['name']);
		//get the file extension of the file
		$type_of_uploaded_file = substr($name_of_uploaded_file,	strrpos($name_of_uploaded_file, '.') + 1);
		$size_of_uploaded_file = $file["size"]/1024;//size in KBs
		
		//Validations
		if($size_of_uploaded_file > MAX_ALLOWED_FILE_SIZE ) {
			return 'Il file deve essere minore di ' . MAX_ALLOWED_FILE_SIZE . ' KB';
		}
		
		$allowed_extensions = explode(",", ALLOWED_FILE_EXTENSIONS);
		$allowed_ext = false;
		for($i=0; $i<sizeof($allowed_extensions); $i++) {
			if(strcasecmp($allowed_extensions[$i],$type_of_uploaded_file) == 0) {
				$allowed_ext = true;
			}
		}
		
		if(!$allowed_ext) {
			return 'Il file deve avere una delle seguenti estensioni: ' . ALLOWED_FILE_EXTENSIONS;
		}
		
		return 'ok';
	}
	/**
	 * CAPTCHA CONTROLS
	 */
	function checkIsRobot($recaptcha_response) {
		//$recaptcha = new \ReCaptcha\ReCaptcha(RC_SECRET_KEY);
		//$recaptcha = new \ReCaptcha\ReCaptcha(RC_SECRET_KEY, new \ReCaptcha\RequestMethod\Post());
		$recaptcha = new \ReCaptcha\ReCaptcha(RC_SECRET_KEY, new \ReCaptcha\RequestMethod\Curl());
		$resp = $recaptcha->verify($recaptcha_response, $_SERVER['REMOTE_ADDR']);
// 		echo var_export($recaptcha_response);
// 		echo var_export($resp);
		if ($resp->isSuccess()) {
			return false;
		} else {
			return true;
		}
	}
}
?>
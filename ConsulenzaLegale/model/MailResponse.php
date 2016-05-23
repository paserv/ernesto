<?php
class MailResponse {
	public $response;
	public $description;
	
	function __construct($response, $description) {
	
		$this->response = $response;
		$this->description = $description;
	}
}
?>
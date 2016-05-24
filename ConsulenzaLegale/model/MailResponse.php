<?php
class MailResponse {
	public $response;
	public $type;
	public $description;
	
	function __construct($response, $type, $description) {
	
		$this->response = $response;
		$this->type = $type;
		$this->description = $description;
	}
}
?>
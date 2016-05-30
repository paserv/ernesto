<?php
class PropertyDTO {
	
	public $key;
	public $value;
	
	function __construct($key, $value) {
		$this->key = $key;
		$this->value = $value;
	}
	
}
?>
<?php
function getDirs() {
	$dirs = array(
			"phpmailer" =>  __DIR__ . '/library/phpmailer/class.phpmailer.php',
			"recaptcha" =>  __DIR__ . '/library/recaptcha/autoload.php',
			"configuration" =>  __DIR__ . '/conf/configuration.php',
	);
	return $dirs;
}

function autoload() {
	$dirs = getDirs();
	foreach ($dirs as $path) {
		require_once($path);
	}
	include_once("analyticstracking.php");
}

?>
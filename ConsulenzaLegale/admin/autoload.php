<?php
function getDirs() {
	$dirs = array(
			"configuration" =>  dirname(__DIR__) . '/conf/configuration.php',
			"controller" =>  dirname(__DIR__) . '/controller/admin_controller.php',
	);
	return $dirs;
}

function autoload() {
	$dirs = getDirs();
	foreach ($dirs as $path) {
		require_once($path);
	}
}

?>
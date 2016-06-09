<?php
function getDirs() {
	$dirs = array(
			"configuration" =>  dirname(__DIR__) . '/conf/configuration.php',
			"controller" =>  dirname(__DIR__) . '/controller/admin_controller.php',
			"model" =>  dirname(__DIR__) . '/model/DBModel.php',
			"dto" =>  dirname(__DIR__) . '/model/PropertyDTO.php'
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
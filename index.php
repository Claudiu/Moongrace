<?php 

	session_start();
	
	// Development
	error_reporting(E_ALL);
	
	define('APP', 'Application');
	define('DEFAULT_CONTROLLER', 'Welcome');
	define('MG_VERSION', '1.04 ALPHA');

	require_once('Moongrace/boot.php');	
	
?>

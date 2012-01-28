<?php 

	session_start();
	
	// Development
	error_reporting(E_ALL);
	
	
	define('APP', 'Application');
	define('DEFAULT_CONTROLLER', 'Welcome');

	require_once('Moongrace/boot.php');	
	
?>

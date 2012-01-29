<?php

foreach (array('Application', 'Controller', 'Model') as $object) { 
	require_once('Bootcamp'.DIRECTORY_SEPARATOR.$object.'.php');
}

$config = array();

$config_dir = APP . DIRECTORY_SEPARATOR . 'Configs' . DIRECTORY_SEPARATOR;
foreach (glob(sprintf('%s*', $config_dir)) as $key) require_once($key);
unset($config_dir);

new Application($config);

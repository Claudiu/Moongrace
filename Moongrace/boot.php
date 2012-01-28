<?php

foreach (array('Application', 'Controller', 'Model') as $object) { 
	require_once('Bootcamp'.DIRECTORY_SEPARATOR.$object.'.php');
}

new Application();

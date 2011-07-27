<?php

class Controller extends Application {
	public function __construct($name = 'Welcome', $action = 'index') {
		$file = APP . '/Controllers/' . $name . '.php';
		if(!file_exists($file))
			die('Moongrace Error: Controller not found.');

		require_once ($file);
		$object = new $name();

		if(method_exists($object, $action)) {
			$param = array(); //array_slice(uri::segments(), 2);
			if(empty($param))
				$param = array(null);
			call_user_func_array(array($object, $action), $param);
		}
	}

}

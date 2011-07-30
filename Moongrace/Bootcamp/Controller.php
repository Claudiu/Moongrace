<?php

class Controller extends Application {
	public function __construct($name = 'Welcome', $action = 'index') {
		$file = APP . '/Controllers/' . $name . '.php';
		if(!file_exists($file))
			$this->error404();

		require_once ($file);
		$object = new $name();

		if(method_exists($object, $action)) {
			$this->loadLib('uri');
			$param = array_slice($this->uri->segments(), 2);
			if(empty($param))
				$param = array(null);
			call_user_func_array(array($object, $action), $param);
		} else {
			$this -> error404();
		}
	}
	
	public function error404()
	{
		header('HTTP/1.0 404 Not Found');
		$this -> loadView('404_error');
		die();
	}
}

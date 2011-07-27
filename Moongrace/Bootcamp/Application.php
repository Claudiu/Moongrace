<?php

class Application {
	public $models;
	public function __construct() {
		
	}

	public function __get($value = '') {
		// If it is a model return it;
		if(isset($this -> models[$value]))
			return $this -> models[$value];
	}

	public function loadModel($value = '') {
		$file = APP . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . $value . '_model.php';
		if(file_exists($file)) {
			require_once ($file);
			$object_name = sprintf('%s_model', ucfirst($value));
			$this -> models[$value] = new $object_name();
			unset($object_name);
		} else
			die(sprintf('Model %s was not found.', $value));
	}

	public function loadView($name = '', $param = array()) {
		$file = APP . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . $name . '.php';
		if(file_exists($file)) {
			extract($param);
			require_once ($file);
		} else
			die();
	}

}

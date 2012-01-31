<?php
class Application {
	public $models;
	public $libs;
	public $config;

	public function __construct($config = array()) {
		$this -> loadLib('uri');
		$this -> config = $config;
        $route = $this -> uri -> route ( $this -> uri -> get_uri_string(), $config['routes'] );
		new Controller($route['Controller'], $route['Action']);
		
		
		// Load Idiorm and Paris
		foreach (array('Idiorm', 'Paris') as $key)
		require_once('Moongrace' . DIRECTORY_SEPARATOR . 'Lib' . DIRECTORY_SEPARATOR . $key . '.php');
	}

	public function __get($value = '') {
		// If it is a model return it;
		if(isset($this -> models[$value]))
			return $this -> models[$value];

		if(isset($this -> libs[$value]))
			return $this -> libs[$value];
	}
	
	/**
	 * Enables the application to load models.
	 *
	 * By using $this->loadModel()
	 * Loads the models from the 'Models' directory.
	 * The new model is loaded in $this->models.
	 * @param string
	 */
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
	
	
	/**
	 * Enables the application to load views.
	 *
	 * By using $this->loadView()
	 * The view is printed. The first param is the view name
	 * the second is the var array to be pushed on to the view.
	 * @param string, array
	 */
	public function loadView($name = '', $param = array()) {
		$file = APP . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . $name . '.php';
		if(file_exists($file)) {
			extract($param);
			require_once ($file);
		} else
			die();
	}

	/**
	 * Enables the application to load libs.
	 *
	 * By using $this->loadLib()
	 * Loads the models from the 'Lib' directory.
	 * The new lib is loaded in $this->libs.
	 * @param string
	 */
	public function loadLib($name = '', $param = array()) {
		$file = 'Moongrace' . DIRECTORY_SEPARATOR . 'Lib' . DIRECTORY_SEPARATOR . $name . '.php';
		if(file_exists($file)) {
			require_once ($file);
			if(empty($param)) {
				$this -> libs[$name] = new $name();
			} else {
				$this -> libs[$name] = new $name($param);
			}
		} else
			die(sprintf('Lib %s was not found.', $name));
	}
}

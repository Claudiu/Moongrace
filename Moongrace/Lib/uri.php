<?php
/**
 * URI Base
 *
 * @package Moongrace
 * @author  Claudiu Tașcă
 * @copyright 2011 - 2012
 */

class Uri extends Application {

	private $string = '';
	private $segments = array();

	/**
	 * Loads the request URI, prepares it and loads it into $segments
	 *
	 * @return void
	 * @author Claudiu Tașcă
	 */
	public function __construct() {
		$this -> string = $this -> get_uri_string();
		$this -> set_array();
	}
	
	public function __get($what='')
	{
		if($what == 'string') return $this->string;
	}

	/**
	 * Get uri string
	 *
	 * @return string
	 * @author Claudiu Tașcă
	 */
	private function get_uri_string() {
		$uri = $_SERVER['REQUEST_URI'];
		$uri = str_replace($_SERVER['SCRIPT_NAME'] . '/', '', $uri);
		$uri = str_replace($_SERVER['SCRIPT_NAME'] . '', '', $uri);
		return $uri;
	}

	/**
	 * Set uri array
	 *
	 * @return void
	 * @author Claudiu Tașcă
	 */
	private function set_array() {
		$this -> segments = explode('/', parse_url($this -> string, PHP_URL_PATH));
		if((!isset($this -> segments[1]) || empty($this -> segments[1])) || (!isset($this -> segments[0]) || $this -> segments[0]) == '')
			$this -> segments[1] = 'index';
		if(!isset($this -> segments[0]) || $this -> segments[0] == '')
			$this -> segments[0] = 'Welcome';
	}

	/**
	 * Returns segment array
	 *
	 * @return array
	 * @author Claudiu Tașcă
	 */
	public function segments() {
		if(empty($this -> segments))
			return array();
		return $this -> segments;
	}

	/**
	 * Returns segment
	 *
	 * @return string
	 * @param $id (Segment ID)
	 * @example uri::segments(0) = CONTROLLER
	 * @author Claudiu Tașcă
	 */
	public function segment($id = 0) {
		return $this -> segments[$id];
	}

	/**
	 * Returns URI string
	 *
	 * @return string
	 * @author Claudiu Tașcă
	 */
	public function uri_string() {
		return $this -> string;
	}

}
?>
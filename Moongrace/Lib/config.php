<?php

/**
 * Config class
 **/
class Config extends Application
{
	private $config;
	function __construct($param = array())
	{
		if (!empty($param['file'])) {
			$this -> load($param['file']);
		}
	}

	public function reset()
	{
		$this -> config = array();
	}

	public function load($filename = '')
	{
		$file = APP . DIRECTORY_SEPARATOR . 'Configs' . DIRECTORY_SEPARATOR . $filename . '.ini';
		if (file_exists($file)) {
			$this -> config = parse_ini_file($file);	
		}
	}

	function __get($value) {
		return $this -> config[$value];
	}
}

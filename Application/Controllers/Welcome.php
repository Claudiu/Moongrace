<?php 

class Welcome extends Controller {
	public function __construct() {
			
	}
	
	public function index($value='')
	{
		$this->loadModel('test');
		$this->loadView('index', $this -> test -> test());
	}
}

?>
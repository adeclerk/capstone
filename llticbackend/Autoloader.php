<?php
class Autoloader
{
	public function __construct()
	{
		spl_autoload_register(array($this,'autoload'));

	}
	
	public static function autoload($class) 
	{
 	   include_once 'classes/class.' . $class . '.php';
	}
}

?>
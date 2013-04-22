<?php
class Autoloader
{
	public function __construct()
	{
		spl_autoload_register(array($this,'autoload'));

	}
	
	public static function autoload($class) 
	{
 	   include 'classes/class.' . $class . '.php';
	}
}

?>
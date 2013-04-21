<?php

class Template
{
	private $file;
	private	$args;
	
	public function __get($name)
	{
		return $this->args[$name];
	}
	
	public function __construct($file, $args = array())
	{
		$this->file = $file;
		$this->args = $args;
	}
	
	public function render()
	{
		include $this->file;
	}
}

?>
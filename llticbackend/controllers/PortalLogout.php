<?php
require_once 'controllers/Controller.php';
require_once 'classes/class.Session.php';

class PortalLogout implements Controller
{
	private $session;
	public function __construct()
	{
		$this->session = new Session();
	}
	
	public function __destruct()
	{
		
	}
	
	public function invoke()
	{
		$this->session->delete();
		header('Location: http://' . $_SERVER[SERVER_NAME] . '/portal');
	}
}
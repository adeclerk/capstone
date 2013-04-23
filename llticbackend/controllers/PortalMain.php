<?php
require ('Controller.php');
require_once ('classes/class.UserSession.php');
require_once ('controllers/PortalLogin.php');
class PortalMain implements Controller
{
	private $session;
	public function __construct()
	{
		$this->session = new UserSession();
	}
	
	public function __destruct()
	{
		
	}
	
	public function invoke()
	{
		if($this->session->isAuthenticated())
		{
			print "STUFF";
		}
		else
		{
			$controller = new PortalLogin();
			$controller->invoke();
		}
	}
}

?>
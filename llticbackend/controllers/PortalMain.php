<?php
require ('Controller.php');
require_once ('classes/class.UserSession.php');
require_once ('controllers/PortalLogin.php');
require_once ('classes/class.Template.php');
class PortalMain implements Controller
{
	private $session;
	private $template;
	public function __construct()
	{
		$this->session = new UserSession();
		$this->template = new Template('views/view.portal.main.php');
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
			$this->template->content = $controller->invoke();
		}
		$this->template->render();
	}
}

?>
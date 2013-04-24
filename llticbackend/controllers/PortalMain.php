<?php
require_once ('Controller.php');
require_once ('classes/class.UserSession.php');
require_once ('controllers/PortalLogin.php');
require_once ('classes/class.Template.php');
class PortalMain implements Controller
{
	private $session;
	public $template;
	public function __construct()
	{
		$this->session = new UserSession();
		$this->template = new Template('views/view.portal.main.php');
		//$this->template->content = array();
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
				$this->template->content = new Template('views/view.portal.login.php');
			
		}
		$this->template->render();
		var_dump($this);
	}
}

?>
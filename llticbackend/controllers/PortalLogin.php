<?php
require_once ('Controller.php');
require_once ('classes/class.UserSession.php');
require_once ('classes/class.Template.php');
class PortalLogin implements Controller
{
	
	private $session;
	private $view;
	
	public function __construct()
	{
		$this->session = new Session();
	}
	
	public function __destruct()
	{
		
	}
	
	public function invoke()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			$login = new UserSession($session,$_POST['username'],$_POST['password']);
			if($login->autheticate())
			{
				switch($login->getUserRecord()->getUserLevel())
				{
					case 0:
						break;
					case 1:
						break;
					case 2:
						header("Location: http://". $_SERVER['SERVER_NAME'] . "/portal/admin");
						break;
				}
			}
			else
			{
				throw new Exception("Failed to login user.");
			}
		}
		else
		{
			//$this->view = new Template('views/view.portal.login.php');
			//$this->view->render();
		}
	}
}

?>
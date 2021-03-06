<?php
require_once ('Controller.php');
require_once ('classes/class.Session.php');
require_once  ('controllers/PortalLogin.php');
require_once ('classes/class.Template.php');
class PortalMain implements Controller
{
	private $session;
	public $template;
	public function __construct()
	{
		$this->session = new Session();
		$this->template = new Template('views/view.portal.main.php');
		$this->template->content = array();
	}
	
	public function __destruct()
	{
		
	}
	
	public function invoke()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			try {
					
				$controller = new PortalLogin($_POST['username'],$_POST['password']);
				$controller->invoke();
			}
			catch (Exception $e)
			{
				print $e->getMessage();
			}
		}
		if($_SESSION['userlevel'])
		{
			switch($_SESSION['userlevel'])
			{
				case 0:
					break;
				case 1:
					break;
				case 2:
					header('Location: http://' . $_SERVER['SERVER_NAME'] . '/portal/admin.php');
					break;
			}

		}
		else
		{

				$this->template->content = new Template('views/view.portal.login.php');
				$this->template->render();
			
			
		}

		
	}
}

?>
<?php
require_once ('Controller.php');
require_once ('classes/class.Session.php');
require_once('classes/class.LoginUser.php');
require_once ('classes/class.Template.php');
class PortalLogin implements Controller
{
	
	private $session;
	private $sess;

	private $user;
	private $pw;
	
	public function __construct($user, $pw)
	{
		$this->sess = new Session();
		$this->session = new LoginUser($this->sess,$user,$pw);

		$this->user = $user;
		$this->pw = $pw;
	}
	
	public function __destruct()
	{
		$this->session->__destruct();
		$this->sess->__destruct();
	}
	
	public function invoke()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			if($this->session->login())
			{
				switch($_SESSION['userlevel'])
				{
				case 0:
					break;
				case 1:
					break;
				case 2:
					header('Location: http://' . $_SERVER['SERVER_NAME']. '/portal/');
					break;
				}
				
			}
			else
			{
				throw new Exception("Failed to login user.");
			}
		}

	}
	
}

?>
<?php
require_once ('Controller.php');
require_once ('classes/class.UserSession.php');
require_once ('classes/class.UserRecord.php');
require_once ('classes/class.Template.php');
class PortalLogin implements Controller
{
	
	private $session;
	private $userSession;
	private $user;
	private $pw;
	
	public function __construct($user=NULL, $pw=NULL)
	{
		$this->session = new Session();

		$this->user = $user;
		$this->pw = $pw;
	}
	
	public function __destruct()
	{
		
	}
	
	public function invoke()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			$this->userSession = new UserSession($this->session,$_POST['username'],$_POST['password']);
			if($this->userSession->autheticate())
			{
				switch($this->userSession->getUserRecord()->getUserLevel())
				{
					case 0:
						break;
					case 1:
						break;
					case 2:
						//header("Location: http://". $_SERVER['SERVER_NAME'] . "/portal/admin");
						break;
				}
				
			}
			else
			{
				throw new Exception("Failed to login user.");
			}
		}
	}
	
	public function getUserSession()
	{
		return $this->userSession;
	}
}

?>
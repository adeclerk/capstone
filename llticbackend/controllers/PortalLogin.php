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
	
	public function __construct($userSession=NULL,$user, $pw)
	{
		if($userSession = NULL)
		{
			$this->userSession = new UserSession(NULL,$user,$pw);
		}
		$this->user = $user;
		$this->pw = $pw;
	}
	
	public function __destruct()
	{
		
	}
	
	public function invoke()
	{
	//	if ($_SERVER['REQUEST_METHOD'] === 'POST')
		//{
			//$login = new UserSession($this->session,$this->user,$this->pw);
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
		//}
	}
}

?>
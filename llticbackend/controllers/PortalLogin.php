<?php
require ('Controller.php');
require ('classes/class.UserSession.php');
require ('classes/class.Template.php');
class PortalLogin implements Controller
{
	
	private $session;
	
	private $user;
	private $pw;
	
	public function __construct($user, $pw)
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
	//	if ($_SERVER['REQUEST_METHOD'] === 'POST')
		//{
			$login = new UserSession($session,$this->user,$this->pw);
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
		//}
	}
}

?>
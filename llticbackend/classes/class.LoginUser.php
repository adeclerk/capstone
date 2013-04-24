<?php
require_once ('classes/class.Session.php');
require_once ('classes/class.User.php');

class LoginUser
{
	private $session;
	
	private $userTable;
	private $curUser;
	private $username;
	private $enteredPW;
	public function __construct($user,$password)
	{
		$this->session = new Session();
		$this->enteredPW = $password;
		$this->username = $user;
		$this->userTable = new User();
	}
	
	public function __destruct()
	{
		
	}
	
	public function login()
	{
		$this->curUser = $this->userTable->getIdByUsername($this->username);
		if(!$this->curUser)
		{
			throw new Exception('User not found');
		}
		else 
		{
			if($this->curUser->password == User::hashPass($this->enteredPW))
			{
				$_SESSION['uid'] = $this->curUser->uid;
				$_SESSION['user'] = $this->curUser->uname;
				$_SESSION['userlevel'] = $this->curUser->level;
				return true;
			}
			else
			{
				throw new Exception('Password Invalid');
			}
		}
	}
	
}

?>
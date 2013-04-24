<?php
/**
 * @author adeclerk
 * @file UserSession.inc.php
 * @brief User Authetication session class.
 */
require_once ('classes/class.Login.php');

class UserSession
{
	private $session;
	
	private $login = NULL;
	private $loggedIn = false;
	
	private $user = NULL;
	private $uname	= NULL;
	private $pw	= NULL;
  public function __construct($session = NULL,$username = NULL,$password = NULL)
  {
  	if($session == NULL)
  	{
  		$this->session = new Session();
  	}
  	else
  	{
  		$this->session = $session;
  	}
  	
  	if($username == NULL && $password == NULL)
  	{
  		if(isset($_SESSION['uid']))
  		{
  			$db = new LlticDbConnection();
			$this->user = $db->users->findUser($_SESSION['user']);
			$this->loggedIn = true;
  		}
  	}
  	else
  	{
  		$this->uname = $username;
  		$this->pw = $password;
  	}
  }
  
  public function __destruct()
  {
  
  }

  public function autheticate()
  {
  	if($this->loggedIn)
  		return true;
  	
  	$this->login = new Login($this->session);
  	  	
  	if(	$this->login->loginUser($this->uname, $this->pw) )
  	{
  		$this->loggedIn = true;
  		return true;
  	}
  	if(!$this->user)
  	{
  		$this->user = new UserRecord($_SESSION['uid'], $this->uname,
  				UserRecord::hashPass($this->pw), $_SESSION['userLevel']);
  	}
  	return false;
  }
  
  public function autheticateUser($user,$pw)
  {
  	$this->login = new Login($this->session);
  	if($this->login->loginUser($user,$pw))
  	{
  		$this->loggedIn = true;
  		$this->user = new UserRecord($_SESSION['uid'],$_SESSION['username'],UserRecord::hashPass($pw),$_SESSION['userLevel']);
  		
  		return true;
  	}
  	else
  	{
  		return false;
  	}
  }
  public function deauthorize()
  {
  	if($this->loggedIn)
  	{
  		$this->login->logoutUser();
  		$this->loggedIn = false;
  	}
  }
    
  public function getUserRecord()
  {
  	return $this->user;
  }
  
  public function isAuthenticated()
  {
  	return $this->loggedIn;
  }
  
  public function getAuthLevel()
  {
  	if($this->loggedIn)
  	{
  		return $_SESSION['userLevel'];
  	}
  	else
  	{
  		return '';
  	}
  }
  
  public function getUser()
  {
  	if($this->loggedIn)
  	{
  		return $_SESSION['user'];
  	}
  	else
  	{
  		return '';
  	}
  }
  
  public function getUID()
  {
  	if($this->loggedIn)
  	{
  		return $_SESSION['uid'];
  	}
  	else
  	{
  		return '';
  	}
  }
}

?>
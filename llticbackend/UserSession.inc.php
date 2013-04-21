<?php
require_once ('class.Login.php');
require_once ('LlticDbConnection.inc.php');
require_once ('Session.inc.php');
require_once ('User.inc.php');
class UserSession
{
	private $session;
	
	private $login = NULL;
	private $loggedIn = false;
	
	private $user = NULL;
	private $uname;
	private $pw;
  public function __construct($session = NULL,$username,$password)
  {
  	if($session == NULL)
  	{
  		$this->session = new Session();
  	}
  	else
  	{
  		$this->session = $session;
  	}
  	$this->uname = $username;
  	$this->pw = $password;
  }
  
  public function __destruct()
  {
  
  }

  public function autheticate()
  {
  	$this->login = new Login($this->session);
  	$this->user = new UserRecord($_SESSION['uid'], $this->uname,
  			UserRecord::hashPass($this->pw), $_SESSION['userLevel']);
  	
  	if(	$this->login->loginUser($this->uname, $this->pw) )
  	{
  		$this->loggedIn = true;
  		return true;
  	}
  	return false;
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
  
}

?>
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
	
	private $user;
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
  	
  	$this->user = new UserRecord($_SESSION['uid'], $username,
  			UserRecord::hashPass($password), $_SESSION['userLevel']);
  	
  }
  
  public function __destruct()
  {
  
  }

  public function autheticate()
  {
  	$this->login = new Login($this->session);
  	if(	$this->login->loginUser($this->user->getUsername(), 
  								$this->user->getPassword()))
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
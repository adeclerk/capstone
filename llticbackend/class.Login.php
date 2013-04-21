<?php
require('LlticDbConnection.inc.php');
require_once('Session.inc.php');
require_once('User.inc.php');
class Login
{
  private $dbcon;
  private $session;

  public function __construct()
  {
  	$this->session = new Session();
    $this->dbcon = new LlticDbConnection();
  }

  public function __destruct()
  {
    $this->dbcon->close();
    $this->session->__destruct();
  }
  
  public function loginUser($username, $password)
  {
	$userFound = $this->dbcon->users->findUser($username);
	if(!$userFound)
	{
		print "User not found";
		return NULL;
	}
	
	if(UserRecord::hashPass($password) != $userFound->getPassword())
	{
		print "Invalid password";
	}
	$_SESSION['uid'] = $userFound->getId();
	$_SESSION['user'] = $userFound->getUsername();
	$_SESSION['userLevel'] = $userFound->getUserLevel();
	
  }
  
  public function logoutUser()
  {
  	$this->session->delete();
  }
  
  public function userLoggedIn()
  {
  	
  }
}




?>
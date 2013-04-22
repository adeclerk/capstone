<?php
/**
 * @author adeclerk
 * @file class.Login.php
 * @brief Class representing Login for users.
 */
require_once('class.LlticDbConnection.php');
require_once('class.Session.php');
require_once('class.UserRecord.php');
class Login
{
  private $dbcon;
  private $session;

  public function __construct($session = NULL)
  {
  	if($session == NULL)
  	{
  		$this->session = new Session();
  	}
  	else
  	{
  		$this->session = $session;
  	}
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
		return false;
	}
	
	if(UserRecord::hashPass($password) != $userFound->getPassword())
	{
		print "Invalid password";
		return false;
	}
	$_SESSION['uid'] = $userFound->getId();
	$_SESSION['user'] = $userFound->getUsername();
	$_SESSION['userLevel'] = $userFound->getUserLevel();
	return true;
  }
  
  public function logoutUser()
  {
  	$this->session->delete();
  	$this->session->close();
  }
  
  public function userLoggedIn()
  {
  	
  }
}




?>
<?php
require('LlticDbConnection.inc.php');
require_once('User.inc.php');
class Login
{
  private $dbcon;


  public function __construct()
  {
    $this->dbcon = new LlticDbConnection();
  }

  public function __destruct()
  {
    $this->dbcon->close();
  }
  
  public function loginUser($username, $password)
  {
	$userFound = $this->dbcon->users->findUser($username);
	if(!$userFound)
	{
		print "User not found";
		return NULL;
	}
	
	if(UserRecord::hashPassword($password) != $userFound->getPassword())
	{
		print "Invalid password";
	}
	return $userFound;
	
  }
  
  public function logoutUser()
  {
  	
  }
  
}




?>
<?php
require_once ('LlticDbConnection.inc.php');
require ('User.inc.php');
function hashPass($pass)
{
	return md5("ewokllticsalt:".$pass);
}
class Login
{
  private $database;


  public function __construct()
  {
    $this->database = new LlticDbConnection();
  }

  public function __destruct()
  {
    $this->database->__destruct();
  }
  
  public function login($username, $password)
  {
  	$userFound = $this->database->users->findUser($username);
  	if(!$userFound)
  	{
  		print "Invalid Username.";
  		exit();
  	}

  	if($userFound->getPassword() == hashPassword($password))
  	{
  		//$_SESSION['username'] = $record['username'];
  		print "SUCCESS";
  	}
  	else
  	{
  		print "Invalid Password.";
  	}
  }
  
  public function logout()
  {
  	
  }
  
}




?>
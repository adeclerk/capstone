<?php
require ('LlticDbConnection.inc.php');
function hashPass($pass)
{
	return md5("ewokllticsalt:".$pass);
}
class Login
{
  private $database;


  public function __construct()
  {
  	session_start();
    $this->database = new LlticDbConnection();
  }

  public function __destruct()
  {
    $this->database->__destruct();
  }
  
  public function login($username, $password)
  {
  	$userFound = $this->findUser($username);
  	if(!$userFound)
  	{
  		print "Invalid Username.";
  		exit();
  	}
  	$record = $userFound->fetch_assoc();
  	if($record['password'] == hashPassword($password))
  	{
  		$_SESSION['username'] = $record['username'];
  	}
  	else
  	{
  		print "Invalid Password.";
  	}
  }
  
  public function logout()
  {
  	session_desroy();
  }
  
}




?>
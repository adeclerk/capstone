<?php
session_start();
require_once ('LlticDbConnection.inc.php');
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

  private function findUser($username)
  {
  	return $this->database->getConnection()->query("SELECT * FROM `users` WHERE username='" .$username ."'");
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
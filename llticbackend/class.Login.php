<?php
require_once ('LlticDbConnection.inc.php');
require_once ('User.inc.php');


function hashPass($pass)
{
	return md5("ewokllticsalt:".$pass."");
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
    $this->database->close();
  }
  
  public function loginUser($username, $password)
  {

  }
  
  public function logoutUser()
  {
  	
  }
  
}




?>
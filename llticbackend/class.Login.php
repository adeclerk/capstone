<?php
require('LlticDbConnection.inc.php');

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

  }
  
  public function logoutUser()
  {
  	
  }
  
}




?>
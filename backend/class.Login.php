<?php
require_once 'LlticDbConnection.inc.php';
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

}




?>
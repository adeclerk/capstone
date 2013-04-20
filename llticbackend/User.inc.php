<?php


class UserRecord
{
  public function __construct($id, $uname, $pw)
  {
    $this->id = $id;
    $this->username = $uname;
    $this->password = $pw;
  }

  public function __destruct()
  {
  }

  public $id;
  public $username;
  public $password;

}



?>
<?php


class UserRecord
{
	private $id;
	private $username;
	private $password;
	private $userLevel;
	
  public function __construct($id, $uname, $pw, $userLevel)
  {
    $this->id = $id;
    $this->username = $uname;
    $this->password = $pw;
    $this->userLevel = $userLevel;
  }

  public function __destruct()
  {
  }

  public function __toString()
  {
  	return ($this->id . " : " . $this->username . " : " . $this->password . " : " . $this->userLevel);
  }
  function getId()
  {
  	return $this->id;
  }
  
  function getUsername()
  {
  	return $this->username;
  }
  
  function getPassword()
  {
  	return $this->password;
  }
  
  function getUserLevel()
  {
  	return $this->userLevel;
  }

  public static function hashPass($pass)
  {
  	return md5("ewokllticsalt:$pass");
  }
}



?>
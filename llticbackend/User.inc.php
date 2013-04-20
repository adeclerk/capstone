<?php


class UserRecord
{
	private $id;
	private $username;
	private $password;
	private $isAdmin;
	
  public function __construct($id, $uname, $pw, $isAdmin)
  {
    $this->id = $id;
    $this->username = $uname;
    $this->password = $pw;
    $this->isAdmin = $isAdmin;
  }

  public function __destruct()
  {
  }

  public function __toString()
  {
  	return ($this->id . " : " . $this->username . " : " . $this->password . " : " . $this->isAdmin);
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
  
  function getAdminStatus()
  {
  	return $this->isAdmin;
  }

  public static function hashPass($pass)
  {
  	return md5("ewokllticsalt:".$pass."");
  }
}



?>
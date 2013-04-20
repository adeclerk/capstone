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


}



?>
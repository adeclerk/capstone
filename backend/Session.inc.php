<?php
require once 'LlticDbConnection.inc.php';
class SessionRecord
{
  private $sessionID;
	private $sessionUsername;
	private $sessionStart;
	private $isSet;
	
	public function __construct()
	{
		$this->isSet = False;
	}
	
	public function __destruct()
	{
		
	}
	
	public function set(array $row)
	{
		$this->sessionID 	= $row[0];
		$this->sessionUsername 	= $row[1];
		$this->sessionStart 	= $row[2];
	}
	
	public function isExpired()
	{
		if(($this->sessionStart - 84600) < 0)
			return True;
		else
			return False;
	}
}

class Session
{

  private $isAlive = false;
 function __construct()
  { 
    
  }

  function __destruct()
  {

  }
  
  function start($user)
  {
  	
  }
}

?>

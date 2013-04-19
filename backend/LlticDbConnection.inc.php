<?php

class LlticDbConnection
{
  private $connection;
  private $isOpen;

  public function __construct()
  {
   // Create connection	
    // server, user, password, database
    $this->connection= new mysqli("192.168.1.102","admin","llticewok","lltic");

    // Check connection
    if ($this->connection->connect_errno)
       	{
 		echo "Failed to connect to MySQL: " . $this->connection->connect_erro;
 	}

  }

  public function __destruct()
  {
    $this->connection->close();
  }

  public function getConnection()
  {
    return $this->connection;
  }
  
  public function close()
  {
  	$this->connection->close();
  	$this->isOpen = False;
  }
  
  public function isOpen()
  {
  	return $this->isOpen;
  }
}

}

?>

<?php
require ('User.inc.php');
class userTable
{
  /** 
   * Database connection. 
   */
  private $dbc;
  private $contents;
  private $contentsPtr = -1;
  private $contentsCnt = 0;
  /**
   * User Table Constructor
   */
  public function __construct($connection)
  {
    $this->dbc = $connection;
  }

  public function __destruct()
  {

  }


  public function loadAllUsers()
  {
    $sql = "SELECT * FROM `users`";
    $result = $this->dbc->qry($sql);
    

    $index = 0;
    while($row = $result->fetch_assoc())
      {
	array_push($this->contents[$index],(new UserRecord($row['id'],$row['username'],$row['password'],$row['isAdmin'])));
	$index++;
      }

    $this->contentsCnt = $index;
  }

  public function getAllUsers()
  {
    $sql = "SELECT * FROM `users`";
    $result = $this->dbc->qry($sql);
    $index = 0;
    $users = array();
    while($row = $result->fetch_assoc())
      {
	array_push($users,(new UserRecord($row['id'],$row['username'],$row['password'],$row['isAdmin'])));
	$index++;
      }
    return $users;
  }
  
  public function getUser()
  {
  	if($this->contentsPtr == -1)
  	{
  		$this->loadAllUsers();
  		$this->contentsPtr = 1;
  		return $this->contents[0];
  	}
  	elseif($this->contentsPtr == $this->contentsCnt)
  	{
  		return;
  	}
  	else
  	{
  		return $this->contents[$this->contentsPtr++];
  	}

  }
	
}
class LlticDbConnection
{
  private $connection;
  private $isOpen;
  public $users;

  public function __construct()
  {
   // Create connection	
    // server, user, password, database
    $this->connection= new mysqli("192.168.1.102","admin","llticewok","lltic");

    // Check connection
    if ($this->connection->connect_errno)
       	{
 		echo "Failed to connect to MySQL: " . $this->connection->connect_erro;
		exit();
 	}
    $this->users = new userTable($this);

  }

  public function __destruct()
  {
    $this->connection->close();
  }

  public function getConnection()
  {
    return $this->connection;
  }
  
  public function qry($query)
  {
   return $this->connection->query($query);
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

?>

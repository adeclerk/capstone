<?php
require_once ('User.inc.php');
class userTable
{
  /** 
   * Database connection. 
   */
  private $dbc;
  private $contents;
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
    
    $users = array();
    $index = 0;
    while($row = $result->fetch_assoc())
      {
	$users[$index] = new UserRecord($row['id'],$row['username'],$row['password']);
	$index++;
      }
    $this->contents = $users;
  }

  public function getAllUsers()
  {
    $sql = "SELECT * FROM `users`";
    $result = $this->dbc->qry($sql);
    
    $index = 0;
    while($row = $result->fetch_assoc())
      {
	$users[$index] = new UserRecord($row['id'],$row['username'],$row['password']);
	$index++;
      }
    return $users;
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
    $users = new userTable($this->connection);

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

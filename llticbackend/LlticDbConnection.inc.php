<?php
 /**
  * @author adeclerk
  * @file LlticDbConnection.inc.php
  * @brief LLTIC Database related classes + functions.
  * @detail Classes representing Database tables, in addition to a class
  * for connecting to the database. 
  */
require('User.inc.php');
require('Employee.inc.php');
class userTable
{
  /** 
   * @brief Database connection. 
   */
  private $dbc;
  private $contents;
  private $contentsPtr =0;
  private $contentsCnt = 0;
  /**
   * @brief User Table Constructor
   */
  public function __construct($connection)
  {
    $this->dbc = $connection;
  }

  public function __destruct()
  {
	
  }

  public function findUser($username)
  {
  	$result = $this->dbc->qry("SELECT * FROM `users` WHERE username='" .$username ."'");
  	if($result->num_rows == 0)
  	{
  		return NULL;
  	}
  	else
  	{	
  		$row = $result->fetch_assoc();
		return new UserRecord($row['id'],$row['username'],$row['password'],$row['userlevel']);
  	}
  }
  
  public function loadAllUsers()
  {
    $sql = "SELECT * FROM `users`";
    $result = $this->dbc->qry($sql);
    

    $index = 0;
    while($row = $result->fetch_assoc())
      {
		array_push($this->contents[$index],(new UserRecord($row['id'],$row['username'],$row['password'],$row['userlevel'])));
		$index++;
      }

    $this->contentsCnt = $index+1;
  }

  public function getAllUsers()
  {
    $sql = "SELECT * FROM `users`";
    $result = $this->dbc->qry($sql);
    $index = 0;
    $users = array();
    while($row = $result->fetch_assoc())
      {
		array_push($users,(new UserRecord($row['id'],$row['username'],$row['password'],$row['userlevel'])));
		$index++;
      }
    return $users;
  }
  
  public function getUserById($id)
  {
  	$users = $this->getAllUsers();
  	
  	for($i = 0; $i < sizeof($users); $i++)
  	{
  		if($users[$i]->getId() == $id)
  		{
  			return $users[$i];
  		}
  	}
  	return '';
  }
  
  public function getUser()
  {
  	if($this->contentsPtr == -1)
  	{
  		$this->contentsPtr++;
  		return $this->contents[$this->contentsPtr];
  	}
  	elseif( $this->contentsPtr == $this->contentsCnt)
  	{
  		return false;
  	}
  	else
  	{
	return $this->contents[$this->contentsPtr++];
  	}
  }
	
}

class employeeTable
{
	private $dbc;
	
	public function __construct($connection)
	{
		$this->dbc = $connection;
	}
	
	public function __destruct()
	{
	
	}
	
	public function getById($id)
	{
		$sql = "SELECT * FROM `employees` WHERE `id`='" . $id ."'";
		$result = $this->dbc->qry($sql);
		if($row = $result->fetch_assoc())
		{
			return new Employee($row['id'],$row['firstName'],$row['lastName'],
								$row['hireDate'],$row['salary'],$row['phone'],$row['userID']);
		}
		else
		{
			return false;
		}
	}
	
	public function getByUserId($id)
	{
		$sql = "SELECT * FROM `employees` WHERE `userID`='" . $id ."'";
		$result = $this->dbc->qry($sql);
		if($row = $result->fetch_assoc())
		{
			return new Employee($row['id'],$row['firstName'],$row['lastName'],
					$row['hireDate'],$row['salary'],$row['phone'],$row['userID']);
		}
		else
		{
			return false;
		}
	}
}

/**
 * @brief LlticDbConnection class representing connection to LLTIC database. 
 *
 */
class LlticDbConnection
{
  private $connection;
  private $isOpen;
  
  /**
   * @brief Representation of the users table. 
   * @var userTable
   */
  public $users;
  
  /**
   * @brief Representation of the employees table.
   * @var employeeTable
   */
  public $employees;

  /**
   * @brief Default constructor for LlticDbConnection object.
   */
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
    $this->employees = new employeeTable($this);

  }

  public function __destruct()
  {
    $this->connection->close();
  }

  /**
   * @brief Returns connection object;
   * @return mysqli connected object.
   * @return NULL if connection not open.
   */
  public function getConnection()
  {
  	if($this->isOpen())
    	return $this->connection;
  	else
  		return '';
  }
  
  /**
   * @brief Returns result of sql query.
   * @param string $query String containing sql query.
   * @return mixed Query result.
   */
  public function qry(string $query)
  {
   return $this->connection->query($query);
  }

  /**
   * @brief Close the db connection.
   */
  public function close()
  {
  	$this->connection->close();
  	$this->isOpen = False;
  }
  
  /**
   * @brief Determine if db connection is open.
   * @return bool Representing open state.
   */
  public function isOpen()
  {
  	return $this->isOpen;
  }
}

?>

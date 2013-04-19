<?php
include 'Employee.inc.php';
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
class EmployeeTable
{
  private $dbConnection;
  public function __construct()
  {
    $this->dbConnection = new LlticDbConnection;
  }

  public function __destruct()
  {
    unset($this->dbConnection);
  }

  public function findByUsername($username)
  {
    $result = $this->dbConnection->getConnection()->query("SELECT * FROM `employees`");
    
    $index = 0;
    while($row = $result->fetch_row())
      {
	$employees[$index] = new Employee;
	$employees[$index]->set($row);
	$index++;
      }

    $curCount = 0;
    $userFound = False;
    $user;
    while($curCount < $index)
      {
	
	if($employees[$curCount]->getUsername() == $username)
	  {
	    $userFound = True;
	    $user = $employees[$curCount];
	  }
	$curCount++;
      }

    if($userFound)
      {
	return $user;
      }
    else
      {
	return -1;
      }
  }

  public function hasUser($username)
  {
    $result = $this->dbConnection->getConnection()->query("SELECT * FROM `employees`");
    
    $index = 0;
    while($row = $result->fetch_row())
      {
	$employees[$index] = new Employee;
	$employees[$index]->set($row);
	$index++;
      }

    $curCount = 0;
    $userFound = False;
    while($curCount < $index)
      {
	
	if($employees[$curCount]->getUsername() == $_POST['username'])
	  {
	    $userFound = True;
	    $where = $curCount;
	  }
	$curCount++;
      }

    if($userFound)
      {
	return True;
      }
    else
      {
	return False;
      }
  }
  
  public function printEmployees()
  {
  	$result = $this->dbConnection->getConnection()->query("SELECT * FROM `employees`");
    	while($row = $result->fetch_row())
     	 {
		$employee = new Employee;
		$employees->set($row);
		$employee->print();
    	 }
  }
}

?>

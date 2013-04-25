<?php
require_once ('class.LlticDbConnection.php');
class Employee
{
  public $id;
  public $firstName;
  public $lastName;
  public $hireDate;
  public $country;
  public $salary;
  public $phone;
  public $userID;
  public $init;
  
  private $dbcon;
  private $isOpen;

  public function __construct($row = NULL)
  {
  	$this->dbcon = new LlticDbConnection();
  	$this->isOpen = true;
  	if($row == NULL)
  	{
    	$this->init = False;
  	}
  	else
  	{
		$this->set($row);
  	}
  }
  
  public function __destruct()
  {
  	$this->dbcon->close();
  }
  
  public function set(array $row)
  {
    $this->id = $row['id'];
    $this->firstName = $row['firstName'];
    $this->lastName = $row['lastName'];
    $this->hireDate = $row['hireDate'];
    $this->country = $row['country'];
    $this->salary = $row['salary'];
    $this->phone = $row['phone'];
    $this->userID = $row['userID'];
    $this->init = True;
  }

  public function __toString()
  {
	print $this->id . " : " . $this->firstName . " : "
			. $this->lastName . " : " . $this->hireDate . " : "
			. $this->country . " : " . $this->salary . " : "
			. $this->phone . " : " . $this->userID . " <br/>";
  }
  
  public function open()
  {
  	if(!$this->isOpen)
  	{
  		$this->dbcon = new LlticDbConnection();
  		$this->isOpen = true;
  	}
  }
  
  public function close()
  {
  	if($this->isOpen)
  	{
  		$this->dbcon->close();
  		$this->isOpen = false;
  	}
  }
  
  public function read($empID)
  {
  	$sql = "SELECT * FROM `employees` WHERE `id`='" . $empID . "'";
  	if($this->isOpen)
  	{
  		$result = $this->dbcon->qry($sql);
  		if($result->num_rows == 1)
  		{
  			$row = $result->fetch_assoc();
  			return new Employee($row);
  		}
  		else
  		{
  			return '';
  		}
  	}
  	else
  	{
  		return '';
  	}
  }
  
  public function write($fname,$lname,$hireDate,$salary,$country,$phone,$userID)
  {
  	$sql = "REPLACE INTO `employees` (`firstName`,`lastName`,`hireDate`,`salary`,`country`,`phone`,`userID`) VALUES('"
  		. $fname . "','" . $lname ."','" . $hireDate . "','" . $salary . "','" . $country ."','". $phone . "','" . $userID . "')";
  	if($this->isOpen)
  	{
  		$result = $this->dbcon->qry($sql);
  		
  	}
  }
  
  public function edit($eid,$fname,$lname,$hireDate,$salary,$country,$phone,$userID)
  {
  	$sql = "REPLACE INTO `employees` (`id`,`firstName`,`lastName`,`hireDate`,`salary`,`country`,`phone`,`userID`) VALUES('"
  	. $eid. "','" . $fname . "','" . $lname ."','" . $hireDate . "','" . $salary . "','" . $country ."','". $phone . "','" . $userID . "')";
  	if($this->isOpen)
  	{
  		$result = $this->dbcon->qry($sql);
  	
  	}
  }
  public function getAllEmployees()
  {
  	$sql = "SELECT * FROM `employees`";
  	if($this->isOpen)
  	{
  		$result = $this->dbcon->qry($sql);
  		$returnEmp = array();
  		while($row = $result->fetch_assoc())
  		{
  			array_push($returnEmp,new Employee($row));
  		}
  		return $returnEmp;
  	}
  }
  
  public function getNameByUserId($uid)
  {
  	$sql = "SELECT `firstName`,`lastName` FROM `employees` WHERE `userID`='" . $uid . "'";
  	if($this->isOpen)
  	{
  		$result = $this->dbcon->qry($sql);
  		if($result->num_rows == 0)
  		{
  			return '';
  		}
  		else
  		{
  			$row = $result->fetch_assoc();
  			return $row;
  		}
  	}
  }
  
}
?>

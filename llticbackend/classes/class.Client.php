<?php
require_once ('classes/class.LlticDbConnection.php');

class Client
{
	public $id;
	public $firstName;
	public $lastName;
	public $phone;
	public $company;
	public $country;
	public $consultDate;
	public $consultID;
	public $userID;
	
	private $dbcon;
	private $dbOpen;
	
	public function __construct($row = NULL)
	{
		$this->dbcon = new LlticDbConnection();
		$this->dbOpen = true;
		if($row)
		{
			$this->set($row);
		}
	}
	
	public function __destruct()
	{
		$this->dbcon->close();
	}
	
	public function __toString()
	{
		return json_encode($this);
	}
	
	public function set($row)
	{
		$this->id =$row['id'];
		$this->firstName = $row['firstName'];
		$this->lastName = $row['lastName'];
		$this->phone = $row['phone'];
		$this->company = $row['company'];
		$this->country = $row['country'];
		$this->consultDate = $row['consult_date'];
		$this->consultID = $row['consultID'];
		$this->userID = $row['userID'];	
	}
	
	public function open()
	{
		if(!$this->dbOpen)
		{
			$this->dbcon = new LlticDbConnection();
		}
	}
	
	public function close()
	{
		if($this->dbOpen)
		{
			$this->dbcon->close();
			$this->dbOpen = false;
		}
	}
	
	public function read($cID)
	{
		if($this->dbOpen)
		{
			$sql = "SELECT * FROM `clients` WHERE `id`='" . $cID . "'";
			$return = $this->dbcon->qry($sql);
			if($return->num_rows == 0)
			{
				return '';
			}
			else
			{
				$row = $return->fetch_assoc();
				return new Client($row);
			}
		}
		else
		{
			return '';
		}
	}
	
	public function write($fname,$lname,$phone,$company,$country,$userID)
	{
		if($this->dbOpen)
		{
			$sql = "INSERT INTO `clients`" 
					. "(`firstName`,`lastName`,`phone`,`company`,`country`,`userID`)" 
					. " VALUES('" . $fname . "','" . $lname . "','" . $phone . "','"
					. $country . "','" . $userID . "')";
			$result = $this->dbcon->qry($sql);
		}
		else
		{
			return false;
		}
	}
	
	public function edit($cid,$fname,$lname,$phone,$company,$country,$userID)
	{
		if($this->dbOpen)
		{
			$sql = "REPLACE INTO `clients` "
					. "(`id`,`firstName`,`lastName`,`phone`,`country`,`userID`)"
			  		. " VALUES('" . $fname . "','" . $lname . "','" . $phone . "','"
					. $country . "','" . $userID . "')";
			
			$result = $this->dbcon->qry($sql);
		}
		else
		{
			return false;
		}
	}
	
	public function getNameById($uid)
	{
		$sql = "SELECT `firstName`,`lastName` FROM `clients` WHERE `userID`='" . $uid . "'";
		if($this->dbOpen)
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
		else
		{
			return '';
		}
	}
	
	public function getAllClients()
	{
		$sql = "SELECT * FROM `clients`";
		if($this->dbOpen)
		{
			$result = $this->dbcon->qry($sql);
			$returnClient = array();
			while($row = $result->fetch_assoc())
			{
				array_push($returnClient,new Client($row));
			}
			return $returnClient;
		}
		else
		{
			return '';
		}
	}
}
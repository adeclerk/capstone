<?php
require_once ('classes/class.LlticDbConnection.php');
require_once ('classes/class.Client.php');
require_once ('classes/class.Employee.php');

class User
{
	public $uid;
	public $uname;
	public $password;
	public $email;
	public $level;
	public $fullname;
	
	private $db;
	private $dbOpen;
	
	public function __construct($row = NULL)
	{
		$this->db = new LlticDbConnection();
		$this->dbOpen = true;
		if($row)
		{
			$this->uid = $row['id'];
			$this->uname = $row['username'];
			$this->password = $row['password'];
			$this->email = $row['email'];
			$this->level = $row['userlevel'];
			$this->fullname = $this->getNameByUserId($row['id']);
		}
	}
	
	public function __destruct()
	{
		if($this->dbOpen)
		{
			$this->db->__destruct();
		}
	}
	
	public function __toString()
	{
		return ($this->uid . " : " . $this->uname . " : " . $this->password . " : " . $this->email . " : " . $this->level);
	}
	public function open()
	{
		if($this->dbOpen)
		{
			return true;
		}
		else
		{
			$this->db = new LlticDbConnection();
		}
	}
	
	public function close()
	{
		if($this->dbOpen)
		{
			$this->db->close();
			$this->dbOpen = false;
		}
	}
	
	public function read($uid)
	{
		if($this->dbOpen)
		{
			$sql = "SELECT * FROM `users` WHERE `id`='". $uid . "'";
			$result = $this->db->qry($sql);
			if($result->num_rows == 0)
			{
				return '';
			}
			else 
			{
				$row = $result->fetch_assoc();
				return new User($row);
			}
		}
		else
		{
			return '';
		}
	}
	
	public function write($uname,$pass,$email,$userLevel)
	{
		$sql = "REPLACE INTO `users` (`username`,`password`,`email`,`userLevel`) VALUES('"
		. $uname . "','" .$pass . "','" . $email . "','" .$userLevel . "')";
		if($this->dbOpen)
		{
			$this->db->qry($sql);
			return $this->db->getConnection()->affected_rows;
		}
		
	}
	
	public function getIdByUsername($uname)
	{
		$sql = "SELECT `id` FROM `users` WHERE `username`='" .$uname . "'";
		if($this->dbOpen)
		{
			$result = $this->db->qry($sql);
			if($result->num_rows == 0)
			{
				return '';
			}
			$row = $result->fetch_assoc();
			return $row['id'];
		}
	}
	
	public static function hashPass($pass)
	{
		return md5("ewokllticsalt:$pass");
	}
	
	public function getNameByUserId($uid)
	{
		// check employee table
		$sql = "SELECT `firstName`,`lastName` FROM `employees` WHERE `userID`='" . $uid . "'";
		if($this->dbOpen)
		{
			$result = $this->db->qry($sql);
			if($result->num_rows > 0 )
			{
				$row = $result->fetch_assoc();
				return $row;
			}
			else
			{
				// check client table 
				$sql = "SELECT `firstName`,`lastName` FROM `clients` WHERE `userID`='" . $uid . "'";
				$result = $this->db->qry($sql);
				if($result->num_rows > 0)
				{
					$row = $result->fetch_assoc();
					return $row;
				}
				else
				{
					return '';
				}
			}
		}
		else
		{
			return '';
		}
	}
	
	public function getAllUsers()
	{
		$sql = "SELECT * FROM `users`";
		$users = array();
		if($this->dbOpen)
		{
			$result = $this->db->qry($sql);
			while($row = $result->fetch_assoc())
			{
				array_push($users,new User($row));
			}
			return $users;
		}
		else
		{
			return '';
		}
	}
}

?>
<?php
require_once ('classes/class.LlticDbConnection.php');

class User
{
	public $uid;
	public $uname;
	public $password;
	public $email;
	public $level;
	
	private $db;
	private $dbOpen;
	
	public function __construct($row = NULL)
	{
		$this->db = new LlticDbConnection();
		$this->dbOpen = true;
		if($row)
		{
			$this->uid = $row['uid'];
			$this->uname = $row['username'];
			$this->password = $row['password'];
			$this->email = $row['email'];
			$this->level = $row['userlevel'];
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
	
	public function write($uid,$uname,$pass,$email,$userLevel)
	{
		$sql = "REPLACE INTO `users` (`id`,`username`,`password`,`email`,`userLevel`) VALUES('"
		. $uid . "','" . $uname . "','" .$pass . "','" . $email . "','" .$userLevel . "')";
		if($this->dbOpen)
		{
			$this->db->qry($sql);
			return $this->db->getConnection()->affected_rows;
		}
		
	}
	
	public function getIdByUsername($uname)
	{
		$sql = "SELECT `id` FROM `users` WHERE username='" .$uname . "'";
		if($this->dbOpen)
		{
			$result = $this->db->qry($sql);
			if($result->num_rows == 0)
			{
				return '';
			}
			$row = $result->fetch_assoc();
			return $row['username'];
		}
	}
	
	public static function hashPass($pass)
	{
		return md5("ewokllticsalt:$pass");
	}
}

?>
<?php
require_once ('class.LlticDbConnection.php');
class Message
{
	private $db;
	
	public $id;
	public $sId;
	public $rId;
	public $sub;
	public $content;
	public $timestamp;
	public $isRead;
	
	private function getNameFromId($userId)
	{
		$sql = "SELECT employees.firstName, employees.lastName, users.username FROM employees JOIN users ON employees.userID = users.id WHERE userLevel='2'";
		$ret = $this->db->qry($sql);
		if(!$ret)
		{
			$sql = "SELECT employees.firstName, employees.lastName, users.username FROM employees JOIN users ON employees.userID = users.id WHERE userLevel='1'";
			$ret = $this->db->qry($sql);
			if(!$ret)
			{
				$sql = "SELECT employees.firstName, employees.lastName, users.username FROM employees JOIN users ON employees.userID = users.id WHERE userLevel='0'";
				$ret = $this->db->qry($sql);
				if(!$ret)
				{
					print "ERROR";
					exit();
				}
				else
				{
					$row = $ret->fetch_assoc();
					$string = $row['firstName'] ." " . $row['lastName'];
				}
			}
			else
			{
				$row = $ret->fetch_assoc();
				$string = $row['firstName'] ." " . $row['lastName'];
			}
		}
		else 
		{
			$row = $ret->fetch_assoc();
			$string = $row['firstName'] ." " . $row['lastName'];
		}
		return  $string;
	}
	
	public function __construct()
	{
		$this->db = new LlticDbConnection();
	}
	
	public function __destruct()
	{
		$this->db->__destruct();
	}
	
	public function set($row)
	{
		$this->id = $row['id'];
		$this->sId = $row['sId'];
		$this->rId = $row['rId'];
		$this->sub = $row['subject'];
		$this->content = $row['content'];
		$this->timestamp = $row['timestamp'];
		$this->isRead = $row['isRead'];	
	}
	
}
?>
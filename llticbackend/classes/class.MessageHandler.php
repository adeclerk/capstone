<?php
require_once ('class.LlticDbConnection.php');
require_once ('class.Message.php');

class MessageHandler
{
	private $db;
	
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
	
	public function fetchMessages($userId)
	{
	
	}
	
	public function fetchUnreadMessages($userId)
	{
	
	}
	
	public function sendMessage($recipId,$subj,$content)
	{
	
	}
}
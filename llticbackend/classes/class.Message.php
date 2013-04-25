<?php
require_once ('classes/class.LlticDbConnection.php');
class Message
{
	private $dbcon;
	private $isOpen = true;
	public $id;
	public $sId;
	public $rId;
	public $sub;
	public $content;
	public $timestamp;
	public $isRead;
	
	public function __construct($row = NULL)
	{
		
		if($row)
		{
			$this->id = $row['id'];
			$this->sId = $row['sendID'];
			$this->rId = $row['recID'];
			$this->sub = $row['subject'];
			$this->content = $row['content'];
			$this->timestamp = $row['timestamp'];
			$this->isRead = $row['isRead'];
		}
		
		$this->dbcon = new LlticDbConnection();
	}
	
	public function __destruct()
	{
		$this->dbcon->__destruct();
	}
	
	public function set($row)
	{
		$this->id = $row['id'];
		$this->sId = $row['sendID'];
		$this->rId = $row['recID'];
		$this->sub = $row['subject'];
		$this->content = $row['content'];
		$this->timestamp = $row['timestamp'];
		$this->isRead = $row['isRead'];	
	}
	
	public function open()
	{
		if($this->isOpen)
		{
			return;
		}
		else
		{
			$this->dbcon = new LlticDbConnection();
		}
	}
	
	public function close()
	{
		$this->dbcon->close();
		$this->isOpen = false;
	}
	
	public function read($mid)
	{
		$sql = "SELECT * FROM `messages` WHERE `id`='" . $mid . "'";
		if($this->isOpen)
		{
			$result = $this->dbcon->qry($sql);
			$row = $result->fetch_assoc();
			return new Message($row);
		}
	}
	
	public function write($sid,$rid,$subj,$content)
	{
		$sql = "INSERT INTO `messages` (`sendID`,`recID`,`subject`,`content`) VALUES('" . $sid . "','" . $rid . "','" 
		.$subj . "','" . $content . "')";
		if($this->isOpen)
		{
			$this->dbcon->qry($sql);
		}
	}
	public function getAllUnread($rid)
	{
		$sql = "SELECT * FROM `messages` WHERE `recID`='" .$rid . "'";
		if($this->isOpen)
		{
			$result = $this->dbcon->qry($sql);
			$messageArray = array();
			while($row = $result->fetch_assoc())
			{
				array_push($messageArray,new Message($row));
			}
			return $messageArray;
			
		}
	}
	
	
}
?>
<?php
require_once ('classes/class.LlticDbConnection.php');
require_once ('classes/class.User.php');
class Message
{
	private $dbcon;
	private $isOpen = true;
	public $id;
	public $sId;
	public $sender;
	public $recip;
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
			$tmp = new User();
			$tmpSend = $tmp->getNameByUserId($row['sendID']);
			$this->sender = $tmpSend['firstName'] . " " . $tmpSend['lastName'];
			$tmpRecip = $tmp->getNameByUserId($row['recID']);
			$this->recip = $tmpRecip['firstName'] . " " . $tmpRecip['lastName'];
		}
		
		$this->dbcon = new LlticDbConnection();
	}
	
	public function __destruct()
	{
		$this->dbcon->__destruct();
	}
	
	public function __toString()
	{
		return $this->id . " : " . $this->sender . " : " . $this->recip . " : " . $this->timestamp . " : "
				. $this->sub . " : " . $this->content . " : " . $this->isRead . "<br/>";
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
		$tmp = new User();
		$this->sender = $tmp->getNameByUserId($row['sendID']);
		$this->recip = $tmp->getNameByUserId($row['recID']);
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
		$sql = "INSERT INTO `messages` (`sendID`,`recID`,`subject`,`content`,`isRead`) VALUES('" . $sid . "','" . $rid . "','" 
		.$subj . "','" . $content . "','0')";
		if($this->isOpen)
		{
			$this->dbcon->qry($sql);
		}
	}
	
	public function getAllUnread($rid)
	{
		$sql = "SELECT * FROM `messages` WHERE `recID`='" .$rid . "' AND `isRead`=0";
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
	
	public function getAll($rid)
	{
		$sql = "SELECT * FROM `messages` WHERE `recID`=" .$rid . "";
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
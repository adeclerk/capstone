<?php

class Message
{

	
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
			$this->sId = $row['sId'];
			$this->rId = $row['rId'];
			$this->sub = $row['subject'];
			$this->content = $row['content'];
			$this->timestamp = $row['timestamp'];
			$this->isRead = $row['isRead'];
		}
	}
	
	public function __destruct()
	{
	
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
<?php
require_once 'Controller.php';
require_once 'classes/class.Template.php';
require_once 'classes/class.Message.php';

class PortalMessages implements Controller
{
	private $view;
	private $messageTable;
	public function __construct()
	{
		$this->view = new Template('views/view.portal.window.php');
		$this->view->windowname = "inbox";
		$this->view->windowtitle = "Inbox";
		$this->view->windowcontent = new Template('views/view.portal.messages.php');
		$this->messageTable = new Message();
	}
	
	public function __destruct()
	{
		
	}
	
	public function invoke()
	{
		$this->view->messages = $this->messageTable->getAllUnread(3);
		return $this->view;
	}
}
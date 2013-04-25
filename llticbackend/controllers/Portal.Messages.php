<?php
require_once 'Controller.php';
require_once 'classes/class.Template.php';
require_once 'classes/class.Message.php';
require_once 'classes/class.Session.php';
require_once 'classes/class.User.php';
class PortalMessages implements Controller
{
	private $view;
	private $messageTable;
	private $session;
	public function __construct()
	{
		$this->session = new Session();
		$this->view = new Template('views/view.portal.window.php');
		$this->view->windowname = "inbox";
		$this->view->windowtitle = "Inbox";
		$this->messageTable = new Message();
	}
	
	public function __destruct()
	{
		$this->session->__destruct();
	}
	
	public function invoke()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->view->windowcontent = new Template('views/view.portal.messages.compose.php');
		}
		else
		{
			$this->view->windowcontent = new Template('views/view.portal.messages.php');
			$this->view->windowcontent->composeTab = new Template('views/view.portal.messages.compose.php');
			$userTable = new User();
			$userArray = $userTable->getAllUsers();
			$usernameArray = array();
			foreach($userArray as $user)
			{
				array_push($usernameArray,$user->username);
			}
			$this->view->windowcontent->composeTab->username = $usernameArray;
			$this->view->windowcontent->messages = $this->messageTable->getAllUnread(3);
		}
		return $this->view;
	}
}
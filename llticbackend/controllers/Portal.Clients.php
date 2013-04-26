<?php
require_once 'classes/class.Client.php';
require_once 'classes/class.Template.php';
require_once 'classes/class.User.php';

class PortalClients
{
	
	
	private $view;
	private $clientTable;
	private $userTable;
	public function __construct()
	{
		$this->view = new Template('views/view.portal.window.php');	
		$this->clientTable = new Client();
		$this->userTable = new User();
	}
	
	public function __destruct()
	{
		
	}
	
	public function invoke()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			if($_POST['addclient'])
			{
		
			}
			else
			{
				$this->clientTable->edit($_POST['eid'], $_POST['firstName'],$_POST['lastName'],$_POST['phone'], $_POST['company'], $_POST['country'], $_POST['userID']);
			}
		}
		$this->view->windowcontent = new Template('views/view.portal.clients.php');
		$this->view->windowname = "clients";
		$this->view->windowtitle = "Clients";
		$this->view->windowcontent->clients = $this->clientTable->getAllClients();
		return $this->view;
	}
}
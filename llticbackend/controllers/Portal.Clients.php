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
		$this->view->windowcontent = new Template('views/view.portal.clients.php');
		$this->view->windowname = "clients";
		$this->view->windowtitle = "Clients";
		$this->view->windowcontent->clients = $this->clientTable->getAllClients();
		return $this->view;
	}
}
<?php
require_once ('Controller.php');
require_once 'classes/class.Session.php';
require_once 'classes/class.Template.php';
require 'controllers/Portal.Messages.php';
require 'controllers/Portal.AdminEmployee.php';

class AdminMain implements Controller
{

	private $view; 
	private $session;
	
	public function __construct()
	{
		$this->session = new Session();
		$this->view = new Template('views/view.portal.admin.main.php');
	}
	
	public function __destruct()
	{
		$this->session->close();
	}
	
	public function invoke()
	{
		
		if($_SESSION['userlevel'] == "2")
		{
			$userWindow = new Template('views/view.portal.window.php');
			$userWindow->windowname = "user";
			$userWindow->windowtitle = "User";
			$userWindow->windowcontent = new Template('views/view.portal.window.user.php', array(
										'username' => $_SESSION['user']));
			
		//	$inboxWindow = new PortalMessages();
			$contr = new AdminEmployee();
			$this->view->content = array($contr->invoke(),$userWindow);
	
			$this->view->render();
		}
		else
		{
			$this->view->content = array(
									new Template('views/view.portal.error.php', array(
											'error' =>'User not authorized to view this page')));

			$this->view->render();
		}
		
		
	}
}
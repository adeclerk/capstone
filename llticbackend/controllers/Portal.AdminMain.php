<?php
require_once ('Controller.php');
require_once 'classes/class.Session.php';
require_once 'classes/class.Template.php';
require 'controllers/Portal.AdminEmployee.php';

class AdminMain implements Controller
{

	private $view; 
	private $session;
	
	public function __construct()
	{
		$this->session = new Session();
		$this->view = new Template('views/view.portal.admin.main.php');
		$this->view->content = array();
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
			$contr = new AdminEmployee();
			array_push($this->view->content,$contr->invoke());
			array_push($this->view->content,$userWindow);
			$this->view->render();
		}
		else
		{
			$this->view->content = new Template('views/view.portal.error.php');
			$this->view->content->error = 'User not authorized to view this page';
			$this->view->render();
		}
		
		
	}
}
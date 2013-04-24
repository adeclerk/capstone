<?php
require_once ('Controller.php');
include 'classes/class.Session.php';
include 'classes/class.Template.php';

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
		$this->session->__destruct();
	}
	
	public function invoke()
	{
		
		if($_SESSION['userlevel'] == 2)
		{
			$this->view->render();
		}
		else
		{
			$this->view->content = new Template('views/view.portal.error.php');
			$this->view->content->error = 'User not authorized to view this page');
			$this->view->render();
		}
		
	}
}
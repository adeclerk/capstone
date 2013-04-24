<?php
require_once ('Controller.php');
require_once ('classes/class.Session.php');
require_once ('classes/class.Template.php');

class AdminMain implements Controller
{

	private $view; 
	private $session;
	
	public function __construct()
	{
		$this->view = new Template('../views/view.portal.admin.main.php');
		$this->session = new Session();
	}
	
	public function __destruct()
	{
		$this->session->__destruct();
	}
	
	public function invoke()
	{
		if($_SESSION['userlevel'] == 2)
		{
			//$this->view->render();
		}
		else
		{
			$this->view->content = new Template('../views/view.portal.error.php', array(
												'error' => 'User not authorized to view this page'));
			$this->view->render();
		}
	}
}
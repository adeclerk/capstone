<?php
require_once 'controllers/Controller.php';
require_once 'classes/class.Template.php';
require_once 'classes/class.Employee.php';

class AdminEmployee implements Controller
{
	private $view;
	private $employeeTable;
	public function __construct()
	{
		//$this->view = new Template('views/view.portal.admin.employees.php');
		$this->view = new Template('views/view.portal.window.php');
		$this->employeeTable = new Employee();
	}
	
	public function __destruct()
	{
		
	}
	
	public function invoke()
	{
		if($_SERVER['REQUEST_METHOD'] == POST)
		{
			if($_POST['addemployee'])
			{
				$this->employeeTable->write($_POST['firstName'],
											$_POST['lastName'],
											$_POST['hireDate'],
											$_POST['salary'],
											$_POST['country'],
											$_POST['phone'],
											$_POST['uid']);
			}
			else
			{
			$this->employeeTable->edit($_POST['eid'],$_POST['firstName'], $_POST['lastName'], $_POST['hireDate'], $_POST['salary'], $_POST['country'], $_POST['phone'], $_POST['uid']);
			}
		}
		$this->view->windowcontent = new Template('views/view.portal.admin.employees.php');
		$this->view->windowname = "employees";
		$this->view->windowtitle = "Employees";
		$this->view->windowcontent->employees = $this->employeeTable->getAllEmployees();
		return $this->view;
	}
}

?>
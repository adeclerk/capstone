<?php
require_once 'controllers/Controller.php';
require_once 'classes/class.Template.php';
require_once 'classes/class.Employee.php';
require_once 'classes/class.User.php';

class AdminEmployee implements Controller
{
	private $view;
	private $employeeTable;
	private $userTable;
	public function __construct()
	{
		//$this->view = new Template('views/view.portal.admin.employees.php');
		$this->view = new Template('views/view.portal.window.php');
		$this->employeeTable = new Employee();
		$this->userTable = new User();
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
				$this->addEmployee();
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
	
	private function addEmployee()
	{
		$this->userTable->write( $_POST['username'],
								User::hashPass($_POST['password1']),
								$_POST['email'],
								$_POST['userLevel']
								);
		$user = $this->userTable->getIdByUsername($_POST['username']);
		$this->employeeTable->write($_POST['firstName'],
				$_POST['lastName'],
				$_POST['hireDate'],
				$_POST['salary'],
				$_POST['country'],
				$_POST['phone'],
				$user);
	}
}

?>
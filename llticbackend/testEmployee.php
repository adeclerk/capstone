<?php
require 'classes/class.Employee.php';

$emp = new Employee();

$tEmp = $emp->getAllEmployees();
$name = $emp->getNameByUserId(2);
print $name['firstname'];
foreach($tEmp as $employee)
{
	print $employee;
}


?>
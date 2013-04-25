<?php
require 'classes/class.Employee.php';

$emp = new Employee();

$tEmp = $emp->getAllEmployees();

foreach($tEmp as $employee)
	print $employee;

$name = $emp->getNameByUserId(3);
print $name;

?>
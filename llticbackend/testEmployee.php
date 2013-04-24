<?php
require 'classes/class.Employee.php';

$emp = new Employee();

$tEmp = $emp->getAllEmployees();
print $tEmp;

?>
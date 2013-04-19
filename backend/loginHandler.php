<?php
include 'LlticDbConnection.inc.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST')
  {
    $employeeData = new EmployeeTable;
    $userFound = $employeeData->hasUser($_POST['username']);
    if($userFound == False)
      {
	print "Login error: Invalid Username.";
	exit();
      }

    // check if password is valid
    $user = $employeeData->findByUsername($_POST['username']);

    if($user->getPassword() == md5("ewokllticsalt:".$_POST['password']))
      {
      print "LOGIN SUCCESSFUL";
      }
    else
      {
	print "Login error: Invalid Password.";
	exit();
      }
    
  }
?>
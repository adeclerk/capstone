<?php

include 'Session.inc.php';

$session = new Session;
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
      $_SESSION['username'] = $user->getUsername();
      $_SESSION['isAdmin'] = $user->isAdmin();
      }
    else
      {
	print "Login error: Invalid Password.";
	exit();
      }
    
  }
?>
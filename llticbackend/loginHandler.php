<?php
require ('Session.inc.php');
require_once('LlticDbConnection.inc.php');
include 'userin.php';
$session = new Session();
error_reporting(E_ALL);

function loguserin($username,$pass)
{
	$db = new LlticDbConnection();
	$userFound = $db->users->findUser($username);
	if(!$userFound)
	{
		print "Login Error, user not found";
		return false;
	}
	
	if($userFound->getPassword() != UserRecord::hashPass($pass))
	{
		print "Login error, password incorrect";
		return false;
	}
	$_SESSION['userRecord']= $userFound;
	$_SESSION['user'] = $username;
	//$_SESSION['pass'] = UserRecord::hashPass($pass);
	$_SESSION['userLevel'] = $userFound->getUserLevel();
	return true;
	
}
if ($_SERVER['REQUEST_METHOD'] === 'POST')
  {
	if(loguserin($_POST['username'],$_POST['password']))
	{
		if($_SESSION['userLevel'] == 2)
		{
			showUserLoggedIn();
		}
		print S_SESSION['userRecord'];
	}
	else
	{
		echo "Failed to login user.";
	}
  }
?>
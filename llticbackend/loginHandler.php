<?php
require ('Session.inc.php');
require_once('LlticDbConnection.inc.php');
include 'userin.php';
require_once('class.Login.php');
$session = new Session();
error_reporting(E_ALL);

/*function loguserin($username,$pass)
{
	$db = new LlticDbConnection();
	$userFound = $db->users->findUser($username);
	$db->close();
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
	//$_SESSION['user'] = $userFound->getUsername();
	
	$_SESSION['userLevel'] = $userFound->getUserLevel();
	//$_SESSION['pass'] = UserRecord::hashPass($pass);

	return true;
	
}
*/
if ($_SERVER['REQUEST_METHOD'] === 'POST')
  {
	/*if(loguserin($_POST['username'],$_POST['password']))
	{
		$db = new LlticDbConnection();
		$user = $db->users->findUser($_SESSION['user']);
		if($_SESSION['userLevel'] == 2)
		{
			//showUserLoggedIn();
			print $_SESSION['user'];
			print $session->getId();
		}
	
	}
	*/
  	$login = new Login($session);
  	if($login->loginUser($_POST['username'],$_POST['password']))
  	{
  		print "SUCCESS";
  	}
	else
	{
		echo "Failed to login user.";
	}
  }
?>
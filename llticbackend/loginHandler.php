<?php
//require_once('Autoloader.php');

require_once('classes/class.UserSession.php');

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
	$login = new UserSession($session,$_POST['username'],$_POST['password']);
  	if($login->autheticate())
  	{
  		switch($login->getUserRecord()->getUserLevel())
  		{
  			case 0:
  				break;
  			case 1:
  				break;
  			case 2:
  				header("Location: http://". $_SERVER['SERVER_NAME'] . "/admin");
  				break;
  		}
  	}
	else
	{
		echo "Failed to login user.";
	}
  }
?>
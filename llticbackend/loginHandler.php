<?php
//require_once('Autoloader.php');

require_once('classes/class.UserSession.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST')
  {

	$login = new UserSession(NULL,$_POST['username'],$_POST['password']);
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
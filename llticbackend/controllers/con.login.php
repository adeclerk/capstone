<?php
require_once('../classes/class.UserSession.php');
$session = new Session();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
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
				header("Location: http://". $_SERVER['SERVER_NAME'] . "/portal/admin");
				break;
		}
	}
	else
	{
		echo "Failed to login user.";
	}
}

?>
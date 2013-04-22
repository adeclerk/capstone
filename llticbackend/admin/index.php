<?php
require_once('../classes/class.UserSession.php');
require_once('../classes/class.UserRecord.php');
require_once('../classes/class.Template.php');

$session = new UserSession();
if($session->isAuthenticated())
{
	if($session->getAuthLevel() != 2)
	{
		print "ERROR: You do not have permission to view this page";
	}
	else 
	{
		
		$main = new Template('adminMainView.php',array(
				'title' => 'LLTIC: Admin Main View',
				'user' => $session->getUser()) );
		$main->render();
	
	}
}
?>
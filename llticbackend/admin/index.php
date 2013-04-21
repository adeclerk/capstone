<?php
require_once('../UserSession.inc.php');
require_once('../User.inc.php');
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
				'loggednInUser' => $session->getUser()) );
		$main->render();
	}
}
?>
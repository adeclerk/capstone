<?php
require_once('../userin.php');
require_once('../Session.inc.php');
require_once('../classes/class.Template.php');

$session = new Session();
if(userLoggedIn())
{
	if(getUserLoggedInLevel() != 2)
	{
		print "ERROR: You do not have permission to view this page";
	}
	else 
	{
		$main = new Template('adminMainView.php',array(
				'title' => 'Employee Main Page',
				'heading' => 'Employee ' . getUserLoggedIn()));
		$main->render();
	}
}
?>
<?php
require_once('../userin.php');
require_once('../Session.inc.php');

$session = new Session();
if(userLoggedIn())
{
	if(getUserLoggedInLevel() != 2)
	{
		print "ERROR: You do not have permission to view this page";
	}
	else 
	{
		showUserLoggedIn();
	}
}
?>
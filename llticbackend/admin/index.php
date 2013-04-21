<?php
require_once('../userin.php');

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
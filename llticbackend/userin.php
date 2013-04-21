<?php

function showUserLoggedIn()
{
	print $_SESSION['user'];
}

function userLoggedIn()
{
	if($_SESSION['user'])
		return true;
	else
		return false;
}

function getUserLoggedIn()
{
	if(userLoggedIn())
		return $_SESSION['user'];
	else
		return '';
}

function getUserLoggedInLevel()
{
	if(userLoggedIn())
		return $_SESSION['userLevel'];
	else
		return '';
}
?>
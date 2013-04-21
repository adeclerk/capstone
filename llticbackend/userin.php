<?php

function showUserLoggedIn()
{
	print $_SESSION['user'];
}

require_once('Session.inc.php');
$session = new Session();
print $_SESSION['user'];
?>
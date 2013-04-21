<?php

function showUserLoggedIn()
{
	print $_SESSION['user'];
}

require_once('Session.inc.php');
print $_SESSION['user'];
?>
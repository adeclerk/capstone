<?php 
require ('controllers/PortalLogin.php');
require_once ('classes/class.Session.php');
$session = new Session();
$controller = new PortalLogin($session,$_POST['username'],$_POST['password']);
try
{
	$controller->invoke();
}
catch(Exception $e)
{
	print $e->getMessage();
}
?>
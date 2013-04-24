<?php 
require ('controllers/PortalLogin.php');
require_oncer('classes/class.Session.php');
$session = new Session();
$controller = new PortalLogin($_POST['username'],$_POST['password']);
try
{
	$controller->invoke();
}
catch(Exception $e)
{
	print $e->getMessage();
}
?>
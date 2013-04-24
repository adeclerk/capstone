<?php 
require ('controllers/PortalLogin.php');

$controller = new PortalLogin();
try
{
	$controller->invoke();
}
catch(Exception $e)
{
	print $e->getMessage();
}
?>
<?php 
require ('controllers/PortalLogin.php');

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
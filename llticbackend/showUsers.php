<?php
require ('LlticDbConnection.inc.php');


$database = new LlticDbConnection();
	//$result = $database->users->getAllUsers();

	//$index = 0;
	$user = $database->users->getUser();
	
		print $user->getId() . " : " . $user->getUsername() . " : " . $user->getPassword() . " : " . $user->getAdmin() . " <br />";
	

?>
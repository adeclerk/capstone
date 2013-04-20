<?php
require ('LlticDbConnection.inc.php');


$database = new LlticDbConnection();
	$result = $database->users->getAllUsers();

	$index = 0;
	while($result[$index])
	{
		print $result[$index]->getId() . " : " . $result[$index]->getUsername() . " : " . $result[$index]->getPassword() . " : " . $result[$index]->getAdmin() . " <br />";
		
	}

?>
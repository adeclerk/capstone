<?php
require ('LlticDbConnection.inc.php');


$database = new LlticDbConnection();
	$result = $database->users->getAllUsers();

	print $result[0]->id . " : " .$result[0]->username;

?>
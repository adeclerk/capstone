<?php
require ('LlticDbConnection.inc.php');


$database = new LlticDbConnection();
	$result = $database->users->getAllUsers();

	print $result->id . " : " .$result->username;

?>
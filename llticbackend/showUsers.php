<?php
require ('LlticDbConnection.inc.php');


$database = new LlticDbConnection();
	$result = $database->users->getAllUsers();
	$row = $result->fetch_assoc();
	print $row['id'] . " <br/> " . $row['username'];

?>